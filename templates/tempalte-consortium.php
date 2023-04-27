<?php

/* Template Name: Consortium */

get_header();

$pre_title = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$text = get_field('text');

?>

<section class="section-consortium section-consortium--white">

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
				<div class="section-consortium-divInfoCima">
                    <p><span><?php echo $description; ?></span></p>
                    <?php echo $text; ?>
				</div>
			</div>
		</div>

        <?php $itens = get_field('itens'); ?>
        <?php if($itens){ ?>
            <div class="row">
                <div class="offset-lg-4 col-lg-8">
                    <?php foreach($itens as $key => $consortium){ ?>
                        <div class="section-consortium-tabela" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="section-consortium-tabela-content">
                                    <h5 class="section-consortium-tabela-name"><?php echo $consortium['pre_title']; ?></h5>
                                    <h4 class="section-consortium-tabela-title"><?php echo $consortium['title']; ?></h4>
                                    <p><?php echo $consortium['description']; ?></p>
                                    <div class="list__social">
                                        <?php if($consortium['facebook']){ ?>
                                            <a href="<?php echo $consortium['facebook']; ?>" title="facebook" class="icon-facebook" target="_blank"></a>
                                        <?php } ?>
                                        <?php if($consortium['linkedin']){ ?>
                                            <a href="<?php echo $consortium['linkedin']; ?>" title="linkedin" class="icon-linkedin" target="_blank"></a>
                                        <?php } ?>
                                        <?php if($consortium['twitter']){ ?>
                                            <a href="<?php echo $consortium['twitter']; ?>" title="twitter" class="icon-twitter" target="_blank"></a>
                                        <?php } ?>
                                        <?php if($consortium['youtube']){ ?>
                                            <a href="<?php echo $consortium['youtube']; ?>" title="youtube" class="icon-youtube" target="_blank"></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="section-consortium-tabela-button">
                                    <button type="button" class="d-none d-lg-block" data-toggle="modal" data-target="#consortiumModal-<?php echo $key; ?>">view</button>
                                    <button type="button" class="d-block d-lg-none icon-arrow" data-toggle="modal" data-target="#consortiumModal-<?php echo $key; ?>"></button>
                                </div>
                            </div>
                        </div>

                        <!-- POP UP CONSORTIUM -->

                        <div class="modal fade modal-consortium" id="consortiumModal-<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="consortiumModal-<?php echo $key; ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close icon-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="div-social">
                                            <div class="div-social-scroll">
                                                <?php if($consortium['img_consortium']['url']){ ?>
                                                    <img src="<?php echo $consortium['img_consortium']['url']; ?>">
                                                <?php } ?>
                                                <?php if($consortium['persons']){ ?>
                                                    <?php foreach($consortium['persons'] as $person){ ?>
                                                        <div class="div-social-person">
                                                            <p><?php echo $person['name']; ?></p>
                                                            <p><?php echo $person['description']; ?></p>
                                                            <?php if($person['email']){ ?>
                                                            <a href="mailto:<?php echo $person['email']; ?>"><span class="icon-mail"></span></a>
                                                            <?php } ?>
                                                            <?php if($person['linkedin']){ ?>
                                                            <a href="<?php echo $person['linkedin']; ?>"><span class="icon-linkedin"></span></a>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                                <div class="div-social__social d-none d-lg-flex">
                                                <?php if($consortium['facebook']){ ?>
                                                    <a href="<?php echo $consortium['facebook']; ?>" title="facebook" class="icon-facebook" target="_blank"></a>
                                                <?php } ?>
                                                <?php if($consortium['linkedin']){ ?>
                                                    <a href="<?php echo $consortium['linkedin']; ?>" title="linkedin" class="icon-linkedin" target="_blank"></a>
                                                <?php } ?>
                                                <?php if($consortium['twitter']){ ?>
                                                    <a href="<?php echo $consortium['twitter']; ?>" title="twitter" class="icon-twitter" target="_blank"></a>
                                                <?php } ?>
                                                <?php if($consortium['youtube']){ ?>
                                                    <a href="<?php echo $consortium['youtube']; ?>" title="youtube" class="icon-youtube" target="_blank"></a>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div-info">
                                            <div class="div-info-scroll">
                                            <p class="div-info-name"><?php echo $consortium['pre_title']; ?></p>
                                            <p class="div-info-title"><?php echo $consortium['title']; ?></p>
                                            <div class="div-info-text"><?php echo $consortium['text']; ?></div>
                                            </div>
                                            <?php if($consortium['website']){ ?>
                                                <a class="btn-type" href="<?php echo $consortium['website']; ?>" title="visit website" target="_blank">
                                                    visit website<span class="icon-arrow"></span>
                                                    <svg class="btn-type-background">
                                                        <use xlink:href="#btn-line"></use>
                                                    </svg>
                                                </a>
                                            <?php } ?>
                                            <div class="div-social__social d-flex d-lg-none">
                                                <?php if($consortium['facebook']){ ?>
                                                    <a href="<?php echo $consortium['facebook']; ?>" title="facebook" class="icon-facebook" target="_blank"></a>
                                                <?php } ?>
                                                <?php if($consortium['linkedin']){ ?>
                                                    <a href="<?php echo $consortium['linkedin']; ?>" title="linkedin" class="icon-linkedin" target="_blank"></a>
                                                <?php } ?>
                                                <?php if($consortium['twitter']){ ?>
                                                    <a href="<?php echo $consortium['twitter']; ?>" title="twitter" class="icon-twitter" target="_blank"></a>
                                                <?php } ?>
                                                <?php if($consortium['youtube']){ ?>
                                                    <a href="<?php echo $consortium['youtube']; ?>" title="youtube" class="icon-youtube" target="_blank"></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                </div>
            </div>
        <?php } ?>
	</div>

	
</section>

<?php
get_footer();