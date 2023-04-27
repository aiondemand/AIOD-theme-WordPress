<?php

get_header();

$authors = get_field('authors');
$file = get_field('file'); 
$gallery = get_field('gallery');

?>

<section class="section-news section-newsDetails section-news--white">
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

			<div class="col-12 offset-lg-1 col-lg-2 d-none d-lg-block">
                <?php if($authors){?>
                    <h3>authors</h3>
                    <?php foreach($authors as $item){ ?>
                        <p class="p-organization"><?php echo $item['name']; ?></p>
                        <p class="p-organization-info"><?php echo $item['description']; ?></p>
                    <?php } ?>
                <?php } ?>
			</div>
			<div class="col-12 offset-lg-1 col-lg-7">
				<h3>NEWS <span>•</span> <?php echo get_field('date_custom_post'); ?></h3>
				<h2><?php echo $post->post_title; ?></h2>
	
				<div class="div-text">
					<?php echo get_field('text'); ?>
				</div>

                <?php if($authors){?>
				<div class="d-block d-lg-none">
					<h3>authors</h3>
					<?php foreach($authors as $item){ ?>
                        <p class="p-organization"><?php echo $item['name']; ?></p>
                        <p class="p-organization-info"><?php echo $item['description']; ?></p>
                    <?php } ?>
				</div>
                <?php } ?>

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
						<p class="div-share-info">share this page</p>
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