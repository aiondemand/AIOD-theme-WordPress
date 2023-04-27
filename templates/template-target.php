<?php

/* Template Name: Traget */

get_header();

$pre_title = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$text = get_field('text');

?>

<section class="section-targetGroups section-targetGroups--white">

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
				<div class="section-targetGroups-divInfoCima">
					<p><span><?php echo $description; ?></span></p>
                    <?php echo $text; ?>
                </div>
			</div>
		</div>

        <?php $itens = get_field('itens'); ?>
        <?php if($itens){ ?>
            <div class="row">
                <div class="offset-lg-4 col-lg-8">
                    <?php foreach($itens as $block){ ?>
                        <div class="section-targetGroups-tabela" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                            <p class="section-targetGroups-tabela-name"><?php echo $block['pre_title']; ?></p>
                            <p class="section-targetGroups-tabela-title"><?php echo $block['title']; ?></p>
                            <div class="d-flex justify-content-between align-items-end">
                            <?php echo $block['text']; ?>
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