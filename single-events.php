<?php

get_header();

$file = get_field('file');
$gallery = get_field('gallery');

$event_type = 'UPCOMING EVENT';
$today = date('ymd');
$event_date = date('ymd', strtotime(get_field('date_custom_post')));
if($today > $event_date){
    $event_type = 'PAST EVENT';
}


?>

<section class="section-news section-policyBriefsDetail section-newsArticlesDetail section-eventDetail section-newsletters section-events--white">
	<div class="container">
		<div class="row">

			<div class="col-12 offset-lg-1 col-lg-10">
                <?php if($gallery){?>
					<div id="carouselExampleControls" class="carousel slide dialogues-carousel" data-ride="carousel">
						<div class="carousel-inner">
							<?php foreach($gallery as $key => $photo){ ?>
								<div class="carousel-item <?php echo ($key == 0 ? 'active' : ''); ?>">
									<img class="d-block w-100" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['title']; ?>">
								</div>
							<?php } ?>
						</div>
						<div class="d-flex justify-content-between">
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="icon-arrow" aria-hidden="true"></span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="icon-arrow" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="col-12 offset-lg-2 col-lg-8">
                <h3><?php echo $event_type; ?> <span>•</span> <?php echo get_field('date_custom_post'); ?></h3>
				<h2><?php echo $post->post_title; ?></h2>
	
				
			</div>
			<div class="col-12 offset-lg-2 col-lg-8">
                <div class="div-text">
					<?php echo get_field('text'); ?>
				</div>

                <?php if($file){ ?>
                    <div class="d-flex justify-content-center d-lg-block">
                        <a class="btn-type" href="<?php echo $file['url']; ?>" target="_blank" title="download">
                            download
                            <span class="icon icon-icon-download"></span>
                            <svg class="btn-type-background">
                                <use xlink:href="#btn-line"></use>
                            </svg>
                        </a>
                    </div>
                <?php } ?>

			</div>

			<div class="col-12 offset-lg-1 col-lg-7">
				<div class="div-share">
					<p class="div-share-title">found this interesting?</p>
					<div>
						<p class="div-share-info ">share this page</p>
						<div class="icon-share">
							<div class="div-share-icons justify-content-center">
								<a href="" title="linkedin"><span class="icon-linkedin"></span></a>
								<a href="" title="twitter"><span class="icon-twitter"></span></a>
								<a href="" title="facebook"><span class="icon-facebook"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		
	</div>


	
</section>

<?php
get_footer();