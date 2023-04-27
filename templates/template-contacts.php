<?php

/* Template Name: Contacts */

get_header();

?>

<section class="section-contactUs section-contactUs--white">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<h3></h3>
				<h2><?php echo $post->post_title; ?></h2>
			</div>
			<div class="offset-2 col-10 offset-lg-0 col-lg-8">
				<div class="section-contactUs-divInfoCima">
					<?php echo get_field('text'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section-newsletters-container">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- RECAPTCHA -->
					<form id="contactUsForm" method="POST">
						<input type="hidden" name="action" value="contact_form">
						<div class="section-newsletters-container-form">
							<div class="row">
								<div class="col-10 offset-1 offset-lf-0 col-lg-6">
									<div class="row">
										<div class="col-12 col-lg-10">
											<div class="form-group line-before">
												<label for="">first name *</label>
												<input type="text" name="first-name" placeholder="" id="name" class="form-control" required data-msg="* required field">
												<div></div>
											</div>
										</div>
										<div class="col-12 col-lg-10">
											<div class="form-group line-before">
												<label for="">last name *</label>
												<input type="text" name="last-name" placeholder="" id="last-name" class="form-control" required data-msg="* required field">
												<div></div>
											</div>
										</div>
										<div class="col-12 col-lg-10">
											<div class="form-group line-before">
												<label for="">email *</label>
												<input type="email" name="email" placeholder="" id="email" class="form-control" required data-msg="Please, enter a valid email address" data-msg-required="* required field">
												<div></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-10 offset-1 offset-lf-0  col-lg-6">
									<div class="row">
										<div class="col-12 col-lg-10">
											<div class="form-group line-before">
												<label for="">your message *</label>
												<!-- <input type="text" name="organisation" placeholder="" id="organisation" class="form-control" required data-msg-required="* required field"> -->
												<textarea class="form-control" id="message" name="message" rows="3" required></textarea>
												<div></div>
											</div>
										</div>
										<div class="col-12 col-lg-10">
											<div class="p-info"><?php echo get_field('disclaimer'); ?></div>
										</div>
										<div class="col-12 col-lg-10">
											<div class="form-group">
												<input type="checkbox" name="check-privacy" id="check-1" value="check-privacy" required data-msg="* required field">
												<label for="" class="form-check-label"><?php echo get_field('agreement'); ?></label>
											</div>
										</div>
									</div>

									<!-- if there is no rgpd pop up but a checkbox to accept the terms -->
									<button class="btn primary btn-type open-rgpd">
										<svg class="btn-type-background">
											<use xlink:href="#btn-line-contact"></use>
										</svg>
										send contact
									</button>
								<div class="feedback-message"></div>
								</div>

								

							</div>
						</div>
					</form>

					
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();