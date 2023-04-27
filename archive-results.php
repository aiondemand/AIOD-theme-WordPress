<?php

get_header();

$terms = get_terms( array(
    'taxonomy' => 'cat_results',
    'hide_empty' => true,
) );


?>

<section class="section-events section-events--white">
	
    <div class="d-none d-lg-block section__social">
        <div class="d-none d-lg-flex section__social__div">
        <?php if(get_field('facebook', 'option')){ ?>
            <a href="<?php echo get_field('facebook', 'option'); ?>" title="facebook" class="icon-facebook" target="_blank"></a>
        <?php } ?>
        <?php if(get_field('linkedin', 'option')){ ?>
            <a href="<?php echo get_field('linkedin', 'option'); ?>" title="linkedin" class ="icon-linkedin" target="_blank"></a>
        <?php } ?>
        <?php if(get_field('twitter', 'option')){ ?>
            <a href="<?php echo get_field('twitter', 'option'); ?>" title="twitter" class="icon-twitter" target="_blank"></a>
        <?php } ?>
        <?php if(get_field('youtube', 'option')){ ?>
            <a href="<?php echo get_field('youtube', 'option'); ?>" title="youtube" class="icon-youtube" target="_blank"></a>
        <?php } ?>
        </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<h2><?php echo get_field('title_results', 'option'); ?></h2>
			</div>
			<div class="offset-2 col-10 offset-lg-0 col-lg-8">
				<div class="section-events-divInfoCima">
                    <?php echo get_field('description_results', 'option'); ?>
					<div class="no-events">
						<p><b>No events added yet.</b></p>
						<p>Stay tuned as we get ready for events!</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="offset-2 col-10 offset-md-0 col-md-6 col-lg-4">
				<div class="dialogues-filters">
					<nav class="nav flex-column">
                        <?php foreach($terms as $term){ ?>
						    <a class="nav-link <?php echo (!empty($_GET['cat']) && $_GET['cat'] == $term->slug ? 'active' : ''); ?>" href="<?php echo get_post_type_archive_link('results'); ?>?cat=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                        <?php } ?>
					</nav>
				</div>
			</div>

            <?php if($wp_query->posts){ ?>
                <?php foreach($wp_query->posts as $item){ 
                    
                    $cat = wp_get_post_terms($item->ID, 'cat_results')[0]->name;
                   
                    $author_organization = get_field('author_organization', $item->ID); 
                    $date_to_show = date('M, Y', strtotime(get_field('date_custom_post', $item->ID)));
                    
                    ?>
                    <article class="col-12 col-md-6 col-lg-4 div-card-dialogues">
                        <div class="card card-dialogues">
                            <div class="card-body">
                                <div class="card-text"><p><?php echo $cat; ?></p></div>
                                <div class="d-flex flex-column justify-content-between div-flexHeight">
                                    <div>
                                        <div class="card-dialogues-info">
                                            <p class="card-dialogues-type"><?php echo $date_to_show; ?></p>
                                            <p><?php echo $author_organization; ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="card-title"><?php echo $item->post_title; ?></h5>
                                    </div>
                                </div>
                                <a href="<?php echo get_permalink($item->ID); ?>" class="icon-arrow"></a>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            <?php } ?>

            <?php if($wp_query->max_num_pages > 1){ ?>
                <div class="d-flex justify-content-center">
                    <nav class="navigation pagination" aria-label="Posts">
                        <h2 class="screen-reader-text">Posts navigation</h2>
                        <div class="nav-links">
                            <?php if(!empty($_GET['page']) && $_GET['page'] != 1){?>
                                <a class="prev page-numbers" href="<?php echo get_post_type_archive_link('results') . (!empty($_GET['cat']) ? '?cat=' . $_GET['cat'] . '&' : '?'); ?>?page=<?php echo ($_GET['page'] - 1); ?>"><span class="icon icon-arrow"></span></a>
                            <?php } ?>
                            <?php for ($x = 1; $x <= $wp_query->max_num_pages; $x++) { ?>
                                <a class="page-numbers <?php echo (!empty($_GET['page']) && $_GET['page'] == $x ? 'current' : ''); ?>" href="<?php echo get_post_type_archive_link('results') . (!empty($_GET['cat']) ? '?cat=' . $_GET['type'] . '&' : '?'); ?>page=<?php echo $x; ?>"><?php echo $x; ?></a>
                            <?php } ?>
                            <?php if(empty($_GET['page']) || (!empty($_GET['page']) && $_GET['page'] != $wp_query->max_num_pages)){?>
                                <a class="next page-numbers" href="<?php echo get_post_type_archive_link('results') . (!empty($_GET['cat']) ? '?cat=' . $_GET['cat'] . '&' : '?'); ?>page=<?php echo (!empty($_GET['page']) ? $_GET['page'] + 1 : 2); ?>"><span class="icon icon-arrow"></span></a>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
            <?php } ?>

		</div>
	</div>


	
</section>

<?php
get_footer();