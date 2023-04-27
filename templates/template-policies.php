<?php

/* Template Name: Policies */

get_header();

?>

<section class="section-privacyPolicy section-privacyPolicy--white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <!-- <h3>online resources</h3> -->
                <h2><?php echo $post->post_title; ?></h2>
            </div>
            <div class="offset-2 col-10 offset-lg-0 col-lg-7">
                <div class="section-privacyPolicy-divInfoCima">
                    <p><?php echo get_field('introduction'); ?></p>
                </div>
                <div class="section-privacyPolicy-info">
                    <?php if(get_field('note_text')){ ?>
                        <div class="note">
                            <p><?php echo get_field('note_title'); ?></p>
                            <p><?php echo get_field('note_text'); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php $text_blocks = get_field('text_blocks'); ?>
            <div class="col-12 offset-md-2 offset-lg-5 col-md-10 col-lg-7">
                <div class="section-privacyPolicy-info">
                    <?php if($text_blocks){ ?>
                        <?php foreach($text_blocks as $key => $item){ ?>
                            <div>
                                <p class="question">
                                    <span>0<?php echo $key+1; ?></span><?php echo $item['title']; ?>
                                </p>
                                <div class="answer">
                                    <?php echo $item['text']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();