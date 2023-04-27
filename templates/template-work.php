<?php

/* Template Name: Work */

get_header();

$pre_title = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$text = get_field('text');
$image = get_field('image');

?>

<section class="section-workPlan section-workPlan--white">

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
                <?php if($pre_title){ ?>
                    <h3><?php echo $pre_title; ?></h3>
                <?php } ?>
                <?php if($title){ ?>
                    <h2><?php echo $title; ?></h2>
                <?php } ?>
            </div>
            <div class="col-12 col-lg-8">
                <div class="section-workPlan-divInfoCima">
                    <?php if($description){ ?>
                    <h3><?php echo $description; ?></h3>
                    <?php } ?>
                    
                    <?php echo $text; ?>
                </div>
            </div>
        </div>

        <?php if($image['url']){ ?>
        <div class="row">
            <div class="col-12 offset-lg-1 col-lg-10">
                <div class="video-trigger">
                    <img class="section-workPlan-imgBanner" src="<?php echo $image['url']; ?>" alt="project-overview"/>
                    <span class="icon-video">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-play.svg" alt="play"/>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php $text_block = get_field('text_block'); ?>
        <?php if($text_block['show_block']){ ?>
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-8">
                    <div class="section-workPlan-title">
                        <h2><?php $text_block['title']; ?></h2>
                        <p><span><?php $text_block['description']; ?></span></p>
                        <?php $text_block['text']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php $activities_block = get_field('activities_block'); ?>
        <?php if($activities_block['show_block'] && $activities_block['text_blocks']){ ?>
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-8">
                    <div class="section-workPlan-title">
                        <h2><?php echo $activities_block['title']; ?></h2>
                    </div>
                </div>
                <?php foreach($activities_block['text_blocks'] as $key => $item){ ?>
                    <div class="<?php echo ($key % 2 == 0 ? 'col-12 col-lg-6' : 'col-12 offset-lg-6 col-lg-6'); ?>">
                        <div class="section-workPlan-<?php echo ($key % 2 == 0 ? 'divInfo' : 'divInfoRight'); ?>">
                            <div data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                                <h3><?php echo $item['title']; ?></h3>
                                <?php echo $item['text']; ?>    
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($activities_block['call_to_action_button_url']){ ?>
                    <div class="col-12 offset-lg-6 col-lg-6">
                        <div class="section-workPlan-divInfoRight no-bottom-border">
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
</section>

<?php
get_footer();