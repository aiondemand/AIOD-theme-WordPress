<?php
/**
 * ai4europe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ai4europe
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ai4europe_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ai4europe, use a find and replace
		* to change 'ai4europe' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ai4europe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ai4europe' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ai4europe_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ai4europe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ai4europe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ai4europe_content_width', 640 );
}
add_action( 'after_setup_theme', 'ai4europe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ai4europe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ai4europe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ai4europe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ai4europe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ai4europe_scripts() {
	wp_enqueue_style( 'ai4europe-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ai4europe-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ai4europe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ai4europe_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom fields.
 */
require get_template_directory() . '/inc/custom-fields.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function proccess_events_query( $query ) {

	//echo '<pre>';print_r($query);exit;

	if($query->is_admin){
		return null;
	}

	
	if(!empty($query->query['post_type'])){

		if($query->query['post_type'] == 'events'){

			if(!empty($_GET['type'])){

				$meta_query = array();

				if($_GET['type'] == 'past'){

					$meta_query[] = array(
						'key'     => 'date_custom_post',
						'value'   => date('Ymd'),
						'compare' => '<',
					);    

				}

				if($_GET['type'] == 'upcoming'){

					$meta_query[] = array(
						'key'     => 'date_custom_post',
						'value'   => date('Ymd'),
						'compare' => '>=',
					);   

				}

				$query->set('meta_query',$meta_query);

			}
		}

		if($query->query['post_type'] == 'results'){

			if(!empty($_GET['cat'])){

				$tax_query[] = array(
					'taxonomy' => 'cat_results',
					'field'    => 'slug',
					'terms'    => $_GET['cat']
				);

				$query->set('tax_query',$tax_query);

			}

		}

		if(($query->query['post_type'] == 'events' || $query->query['post_type'] == 'news' || $query->query['post_type'] == 'results') && get_page_template_slug() != 'templates/template-home.php'){

			$query->set('posts_per_page', 10);
			if(!empty($_GET['page'])){
				$query->set('paged', $_GET['page']);
			}

		}

	}
	
}
add_action( 'pre_get_posts', 'proccess_events_query' );


//Get Menu Array
function wp_get_menu_array($current_menu) {
 
    $array_menu = wp_get_nav_menu_items($current_menu);
	
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }

    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['parent']    =   $m->menu_item_parent;
            $submenu[$m->ID]['url']  =   $m->url;
			$submenu[$m->ID]['subchildren'] = array();
        }
    }
	
	//asign children
	foreach($submenu as $key => $item){
		if($menu[$item['parent']]){
			$menu[$item['parent']]['children'][$key] = $item;
		}
	}

    return $menu;
     
}


if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Newsletter',
        'menu_title'    => 'Newsletter',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => '404',
        'menu_title'    => '404',
        'parent_slug'   => 'theme-general-settings',
    ));

	acf_add_options_sub_page(array(
        'page_title'    => 'Cookies',
        'menu_title'    => 'Cookies',
        'parent_slug'   => 'theme-general-settings',
    ));

	acf_add_options_sub_page(array(
        'page_title'    => 'Socials',
        'menu_title'    => 'Socials',
        'parent_slug'   => 'theme-general-settings',
    ));

	acf_add_options_sub_page(array(
		'page_title'     => 'Results Page Content',
		'menu_title'    => 'Results Page Content',
		'parent_slug'    => 'edit.php?post_type=results',
	));

	acf_add_options_sub_page(array(
		'page_title'     => 'News Page Content',
		'menu_title'    => 'News Page Content',
		'parent_slug'    => 'edit.php?post_type=news',
	));

	acf_add_options_sub_page(array(
		'page_title'     => 'Events Page Content',
		'menu_title'    => 'Events Page Content',
		'parent_slug'    => 'edit.php?post_type=events',
	));
    
}

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

//Disable REST API
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }

    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }

    return $result;
});

//Custom theme
function disable_customize() {
    global $pagenow;

    if ( $pagenow == 'customize.php' || $pagenow == 'widgets.php' || $pagenow == 'theme-editor.php' ) {
        wp_redirect( admin_url() );
        exit;
    }
}
add_action( 'admin_init', 'disable_customize' );

//svg suport
function add_svg_to_upload_mimes( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

add_action( 'admin_notices', 'my_theme_dependencies' );
function my_theme_dependencies() {
  if( ! function_exists('acf_add_local_field_group') )
    echo '<div class="error"><p>' . __( 'Warning: The theme needs ACF to function properly', 'ai4europe' ) . '</p></div>';
}