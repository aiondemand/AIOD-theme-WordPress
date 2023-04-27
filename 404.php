<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ai4europe
 */

get_header();
?>

<section class="section-error section-error--white">
	<div class="container">
		<div class="row">
			<div class="col-12 offset-lg-2 col-lg-8">
				<div class="section-error-div1">
				
					<div class="section-error-div">
						<p><?php echo get_field('title_404', 'option'); ?></p>
						<h3>404</h3>
						<a href="<?php echo get_field('button_url_404', 'option'); ?>" class="btn-type">
							<svg class="btn-type-background">
								<use xlink:href="#btn-line"></use>
							</svg>
							<?php echo get_field('button_name_404', 'option'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</section>

<?php
get_footer();
