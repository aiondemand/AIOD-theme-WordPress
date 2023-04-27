<?php

/* Template Name: Homepage */

get_header();

?>

<section class="section-homepage section-homepage--home">

	<div class="d-block d-lg-none section__social">
        <div class="d-flex section__social__div">
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

	<div class="ubAnim_fixContainer">
        
        <?php $main_banner = get_field('main_banner'); ?>
		<div class="section-homepage-hero">
			<div class="section-homepage-hero-fixed">
				<div class="project-name">
					<div class="project-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/circle-blue-ai4europe.svg" alt="A14Europe Supporting AIoD" />
					</div>
					<div class="project-label">
						<p><?php echo $main_banner['subtitle']; ?><span><?php echo $main_banner['title']; ?></span></p>
					</div>
				</div>
			</div>
			<div class="section-homepage-hero-body ubAnim_scrollUpDiv">
				<div class="video-trigger">
					<img class="section-homepage-imgBanner ubAnim_scaleUpImg" src="<?php echo get_template_directory_uri(); ?>/assets/img/back-view-businessman-walking-with-bike-park.png" alt="project-overview"/>
					<div class="section-homepage-imgBanner-overlay ubAnim_fadeIn1"></div>
                    <?php if($main_banner['video_id']){ ?>
                        <div class="video-label">
                            <span class="icon-video">
                                <img class="ubAnim_fadeIn2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-play.svg" alt="play"/>
                            </span>
                            <span class="label ubAnim_fadeIn3">
                                watch full video
                            </span>
                        </div>
                        <button type="button" class="video-trigger-button" data-toggle="modal" data-target="#homeModalVideo"></button>
                    <?php } ?>
				</div>
			</div>
		</div>

        <?php if($main_banner['video_id']){ ?>
            <div class="modal fade modal-video" id="homeModalVideo" tabindex="-1" role="dialog" aria-hidden="true" data-videocode="<iframe width='560' height='315' src='https://www.youtube.com/embed/<?php echo get_field('video_id'); ?>' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close icon-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="modal-video-content">
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

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

		<div class="d-none d-lg-block section__scroll">
	        <div class="d-none d-lg-flex section__scroll__div">
	        	<span class="scroll__icon">
	        		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/scroll.svg" alt="scroll" />
	        	</span>
	        </div>
	    </div>

	</div>

    <?php 
    $intro_block = get_field('intro_block');
    $activities_block = get_field('activities_block');
    ?>
    <?php if($intro_block['show_block'] || $activities_block['show_block']){ ?>
        <div class="section-homepage section-homepage-info2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <h2><?php echo $intro_block['title']; ?></h2>
                    </div>
                    <div class="offset-2 col-10 offset-lg-0 col-lg-8">
                        <div class="section-homepage-divInfoCima">
                            <?php echo $intro_block['text']; ?>    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 offset-lg-1 col-lg-10">
                        <img class="section-homepage-imgBanner" src="<?php echo $intro_block['image']['url']; ?>" alt="<?php echo $intro_block['image']['title']; ?>"/>
                    </div>
                </div>

                <?php if($activities_block['show_block'] && $activities_block['text_blocks']){ ?>
                    <div class="row">
                        <div class="col-12 offset-lg-2 col-lg-8">
                            <div class="section-homepage-title">
                                <h2><?php echo $activities_block['title']; ?></h2>
                            </div>
                        </div>
                        <?php foreach($activities_block['text_blocks'] as $key => $item){ ?>
                            <div class="<?php echo ($key % 2 == 0 ? 'col-12 col-lg-6' : 'col-12 offset-lg-6 col-lg-6'); ?>">
                                <div class="section-homepage-<?php echo ($key % 2 == 0 ? 'divInfo' : 'divInfoRight'); ?>">
                                    <div data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                                        <h3><?php echo $item['title']; ?></h3>
                                        <?php echo $item['text']; ?>    
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($activities_block['call_to_action_button_url']){ ?>
                            <div class="col-12 offset-lg-6 col-lg-6">
                                <div class="section-homepage-divInfoRight no-bottom-border">
                                    <div data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                                        <a class="btn-type" href="<?php echo $activities_block['call_to_action_button_url']; ?>"  title="<?php echo $activities_block['call_to_action_button_name']; ?>">
                                            <?php echo $activities_block['call_to_action_button_name']; ?>
                                            <svg class="btn-type-background">
                                                <use xlink:href="#btn-line"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <?php $content_block = get_field('content_block'); ?>
    <?php if($content_block['show_block']){ ?>
        <div class="section-homepage-info">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/circle-blue-ai4europe.svg" alt="AI4Europe" class="circle-icon-large">
                    </div>
                    <div class="offset-2 col-10 offset-lg-0 col-lg-8">
                        <div class="section-homepage-divInfoCima">
                            <h3><?php echo $content_block['title']; ?></h3>
                            <?php echo $content_block['description']; ?>
                        </div>
                    </div>
                </div>

                <?php if($content_block['text_blocks']){ ?>
                    <div class="row">
                        <div class="offset-lg-4 col-lg-8">
                            <?php foreach($content_block['text_blocks'] as $item){ ?>
                                <div class="section-homepage-tabela" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                                    <p class="section-homepage-tabela-title"><?php echo $item['title']; ?></p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <?php echo $item['text']; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <?php $news_block = get_field('news_block'); ?>
    <?php if($news_block['show_block']){ ?>
        <div class="section-homepage-carossel">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-md-4">
                        <div class="section-homepage-carossel-divLeft">
                            <p><?php echo $news_block['title']; ?></p>
                            <?php if($news_block['buttons']){ ?>
                                <?php foreach($news_block['buttons'] as $item){ ?>
                                    <a class="btn white btn-type d-none d-md-block" href="<?php echo $item['button_url']; ?>">
                                        <?php echo $item['button_name']; ?>
                                        <svg class="btn-type-background">
                                            <use xlink:href="#btn-line"></use>
                                        </svg>
                                </a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    $args = array(
                        'post_type' => 'news',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                    );
                    $query_news = new WP_Query( $args );
                    ?>

                    <div class="col-12 col-md-8">
                        <div class="section-homepage-carossel-divRight">
                            <div class="carousel-homepage">
                                <?php foreach($query_news->posts as $key => $item){ ?>
                                    <div>
                                        <article class="div-card-dialogues">
                                            <div class="card card-dialogues">
                                                <div class="card-body">
                                                    <div class="card-text"><p>0<?php echo $key+1 ; ?></p></div>
                                                    <div class="d-flex flex-column justify-content-between div-flexHeight">
                                                        <div>
                                                            <p class="card-dialogues-type">news</p>
                                                            <h5 class="card-title"><?php echo $item->post_title;?></h5>
                                                        </div>
                                                        <div>
                                                            <div class="card-dialogues-info">
                                                                <?php if(get_field('date_custom_post', $item)){ ?>
                                                                    <p class="card-dialogues-type">date</p>
                                                                    <p><?php echo get_field('date_custom_post', $item); ?></p>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo get_permalink($item->ID); ?>" class="icon-arrow"></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php $call_to_action_block = get_field('call_to_action_block'); ?>
    <?php if($call_to_action_block['show_block']){ ?>
        <div class="section-homepage-contactUs">
            <div class="container">
                <div class="row">
                    <div class="col-12 offset-lg-2 col-lg-8">
                        <div class="section-eventDetail-question">
                            <p><?php echo $call_to_action_block['title']; ?></p>
                            <a class="btn-square" href="<?php echo $call_to_action_block['button_url']; ?>" title="<?php echo $call_to_action_block['button_name']; ?>"><?php echo $call_to_action_block['button_name']; ?> <span class="icon-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</section>

<?php
get_footer();