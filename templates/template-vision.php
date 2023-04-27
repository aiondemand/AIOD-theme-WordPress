<?php

/* Template Name: Vision */

get_header();

$pre_title = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');

?>

<section class="section-visionAndGoals section-visionAndGoals--white">

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
				<div class="section-visionAndGoals-divInfoCima">
					<?php echo $description; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 offset-lg-1 col-lg-10">
                <?php $image = get_field('image'); ?>
                <?php if($image['url']){ ?>
				    <img class="section-visionAndGoals-imgBanner" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"/>    
                <?php } ?>
			</div>
			<?php $text_repeater = get_field('text_repeater'); ?>
			<?php if($text_repeater){ ?>
				<?php foreach($text_repeater as $key => $item){ ?>
					<div class="<?php echo ($key % 2 == 0 ? 'col-12 col-lg-6' : 'col-12 offset-lg-6 col-lg-6'); ?>">
						<div class="section-homepage-<?php echo ($key % 2 == 0 ? 'divInfo' : 'divInfoRight'); ?>">
							<p data-aos="fade-up" data-aos-duration="3000" data-aos-once="true"><?php echo $item['text']; ?></p>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>

		<?php $gallery = get_field('gallery'); ?>
		<?php if($gallery){ ?>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-10 offset-1 col-lg-5 offset-sm-0">
					<div class="carousel-projectOverviewContainer">
						<div class="carousel-projectOverview">
							<?php foreach($gallery as $photo){ ?>
								<div>
									<div class="carousel-projectOverview-div">
										<img class="carousel-projectOverview-div-imgCarousel" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['title']; ?>" />
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-12 offset-lg-1 col-lg-6">
					<div class="section-visionAndGoals-divInfoRight divInfoRight2">
						<p data-aos="fade-up" data-aos-duration="3000"><?php echo get_field('gallery_description'); ?></p>
						<div class="carousel-projectOverview1">
							<?php foreach($gallery as $photo){ ?>
								<div>
									<div class="carousel-projectOverview-div">
										<p><?php echo $photo['caption']; ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</section>

<?php
get_footer();