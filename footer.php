<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ai4europe
 */

?>

<!-- Footer -->
<footer class="footer <?= defined( 'HOME' ) ? 'footer--home' : ''; ?> <?= defined( 'DARK' ) ? 'footer--dark' : ''; ?> <?= defined( 'WHITE' ) ? 'footer--white' : ''; ?>">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-7 d-none d-lg-block">
					<?php $menu_footer = array_chunk(wp_get_menu_array(6), 4); ?>
						<div class="row">
							<div class="col-12 col-lg-6">
								<ul class="footer-menu d-none d-lg-flex justify-content-lg-between">
									<?php foreach($menu_footer as $m_footer){ ?>
										<li class="footer-menu-li">
											<ul>
												<?php foreach($m_footer as $item){ ?>
													<li><a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></a></li>
												<?php } ?>
											</ul>
										</li>
									<?php } ?>
								</ul>
							</div>
							<!--<div class="col-12 col-lg-5">
								<ul class="footer-menu d-none d-lg-flex justify-content-lg-between">
									<li class="footer-menu-li">
										<ul>
											<a href="privacy-policy.php" title="Privacy Policy">privacy policy</a>
											<a href="cookies-policy.php" title="Cookies Policy">cookies policy</a>
										</ul>
									</li>
								</ul>
							</div>-->
						</div>
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="d-flex">
									<div class="div-ue">
										<div>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/bandeira_ue.svg" alt="UE" />
										</div>
									</div>
									<div class="div-aiod">
										<div>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/AIOD_logo.svg" alt="AIOD" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-5">
								<div class="div-infoP d-none d-lg-flex flex-lg-column ">
									<a class="d-none d-lg-block img-loba-grey" href="https://www.loba.com/en/" title="Developed by LOBA.cx"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/loba-grey.svg" alt="Developed by LOBA.cx" /></a>
									<a class="d-block d-lg-none img-loba-black" href="https://www.loba.com/en/" title="Developed by LOBA.cx"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/loba-black.svg" alt="Developed by LOBA.cx" /></a>
									<p>2023 AI4Europe PROJECT. All rights reserved</p>
								</div>
							</div>
						</div>
					</div>
					<!-- With newsletter popup -->
					<?php if(get_field('show_block')){ ?>
						<div class="col-12 col-lg-5">
							<div class="footer-newsletter has-newsletter">
								<h3><?php echo get_field('title', 'option'); ?></h3>
								<p><?php echo get_field('description', 'option'); ?></p>
								<span class="btn-type" id="triggerNewsletter" title="Subscribe newsletter">
									<span><?php echo get_field('button_name', 'option'); ?></span>
									<svg class="btn-type-background">
										<use xlink:href="#btn-line"></use>
									</svg>
								</span>
								<div class="footer-newsletter__social">
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

								<div class="footer-newsletter-popup" id="contentNewsletter">
									<div class="btn-close-newsletter">
										<button id="btn-close-newsletter" class="btn btn-default icon-close"></button>
									</div>
									<div class="row">
										<div class="col-11 col-md-4">
											<p class="title"><span><?php echo get_field('detail_title', 'option'); ?></span> <?php echo get_field('detail_subtitle', 'option'); ?><p>
										</div>
										<div class="col-12 col-md-8">
											
											<form id="newsletterForm" class="validate-form" method="POST">
												<input type="hidden" name="action" value="subscribe">
												
												<div class="section-newsletters-container-form">
													<div class="row">
														<div class="col-12 col-lg-10">
															<div class="form-group line-before">
																<label for="">first name</label>
																<input type="text" name="first-name" placeholder="" id="name" class="form-control" required data-msg="* required field">
																<div></div>
															</div>
														</div>
														<div class="col-12 col-lg-10">
															<div class="form-group line-before">
																<label for="">last name</label>
																<input type="text" name="last-name" placeholder="" id="last-name" class="form-control" required data-msg="* required field">
																<div></div>
															</div>
														</div>
														<div class="col-12 col-lg-10">
															<div class="form-group line-before">
																<label for="">organization</label>
																<input type="text" name="last-name" placeholder="" id="organzation" class="form-control">
																<div></div>
															</div>
														</div>
														<div class="col-12 col-lg-10">
															<div class="form-group line-before">
																<label for="">email</label>
																<input type="email" name="email" placeholder="" id="email" class="form-control" required data-msg="Please, enter a valid email address" data-msg-required="* required field">
																<div></div>
															</div>
														</div>
														<div class="col-12 col-lg-10">
															<div class="form-group">
																<input type="checkbox" name="check[]" id="check-1" value="" class="" required data-msg="* required field">
																<label for="" class="form-check-label"><?php echo get_field('acceptance_input', 'option'); ?></label>
															</div>
														</div>
													</div>

													<!-- if there is no rgpd pop up but a checkbox to accept the terms -->
													<button class="btn primary btn-type open-rgpd">
														<svg class="btn-type-background">
															<use xlink:href="#btn-line-cookies"></use>
														</svg>
														confirm subscription
													</button>

													<div class="rgpd">
														<h4 class="rgpd__title"><?php echo get_field('processing_data_title', 'option'); ?></h4>
														<!-- <p>I authorize Ai4Europe Project to store the data I have provided for the purpose of receiving information about the project through email. The information I am providing will be stored in accordance with data protection regulations.</p> -->
														<?php echo get_field('processing_data_text', 'option'); ?>
														<button class="btn btn-outline btn-type reject-rgpd">
															<svg class="btn-type-background">
																<use xlink:href="#btn-line"></use>
															</svg>
															Refuse
														</button>

														<!-- if there is no rgpd pop up but a checkbox to accept the terms -->
														<button id="btn-submit" class="btn btn-primary btn-type g-recaptcha" data-sitekey="<?php //echo $BO_RECAPTCHA_SITEKEY ?>" data-callback="recaptchaData" data-action="submit">
															<svg class="btn-type-background">
																<use xlink:href="#btn-line"></use>
															</svg>	
															Accept
														</button>
													</div>
												</div>

												<div class="col-12 offset-lg-4 col-lg-8 d-none">
													<div class="div-success">
														<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-check.svg" alt="check">
														<p>A confirmation email has been sent to validate your subscription. Confirm your spam folder. If you are already on the list, your information will be updated.</p>
													</div>
												</div>

											</form>

											<div class="div-success d-none">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-check.svg" alt="check">
												<p>A confirmation email has been sent to validate your subscription. Confirm your spam folder. If you are already on the list, your information will be updated.</p>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- No newsletter, just Contact Us link -->
					<div class="col-12 col-lg-5 d-none">
						<div class="footer-newsletter has-newsletter">
							<h3><?php echo get_field('title_cta', 'option'); ?></h3>
							<p><?php echo get_field('description_cta', 'option'); ?></p>
							<a class="btn-type" href="<?php echo get_field('button_url_cta', 'option'); ?>" title="<?php echo get_field('button_name_cta', 'option'); ?>">
								<span><?php echo get_field('button_name_cta', 'option'); ?></span>
								<svg class="btn-type-background">
									<use xlink:href="#btn-line"></use>
								</svg>
							</a>
							<div class="footer-newsletter__social">
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
					</div>

					<div class="col-12 d-lg-none">

						<div class="row">
							<div class="col-10 offset-1">
								<div class="footer-logo-sm">
									<div class="d-flex justify-content-start align-items-center footer-logo-aiod">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/AIOD_logo.svg" alt="AIOD" />
									</div>
									<div class="d-flex justify-content-end align-items-center footer-logo-loba">
										<a class="img-loba-grey" href="https://www.loba.com/en/" title="Developed by LOBA.cx"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/loba-grey.svg" alt="Developed by LOBA.cx" /></a>
									</div>
									<div class="d-flex justify-content-center align-items-center footer-logo-ue">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/bandeira_ue.svg" alt="UE" />
									</div>
								</div>
								<div class="d-flex justify-content-center footer-copyright">
									<p>2023 AI4Europe PROJECT. All rights reserved</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		<div class="modal fade modal-search" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					<div class="modal-body">
						<form id="search" action="search-results.php">
							<div class="form-group">
								<label for="">what are you looking for?</label>
								<div class="field">
									<input type="text" name="search" placeholder="Enter your keywords..." id="search" class="form-control" data-msg="search">
									<button class="btn btn-search">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search-2.svg" alt="Search">
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Cookies -->
		<div class="cookies-wrapper">
			<div class="cookies-box">
				<div class="container">
					<div class="btn-close">
						<button id="btn-close-cookies" class="btn btn-default btn-sm icon-close"></button>
					</div>
					<div class="cookies__title"><?php echo get_field('title_cookies', 'option'); ?></div>
					<div class="cookies-description">
						<p class="cookies-bar-message"><?php echo get_field('description_cookies', 'option'); ?></p>
						<div class="row">
							<div class="col-sm-6 col-sm-pull-6">
								<button id="accept-cookie" class="btn-type">
								<?php echo get_field('button_accept_cookies', 'option'); ?>
									<svg class="btn-type-background">
										<use xlink:href="#btn-line-cookies"></use>
									</svg>
								</button>
							</div>
							<div class="col-sm-6 col-sm-push-6 cookies-settings-link">
								<button class="btn-type">
								<?php echo get_field('button_preferences_cookies', 'option'); ?>
									<svg class="btn-type-background">
										<use xlink:href="#btn-line1-lg"></use>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="cookies-settings">
						<div class="row">
							<div class="col-sm-7">
								<div class="form-group">
									<input type="checkbox" name="cookie-radio" id="cookie-required" value="required" checked>
									<label for="cookie-required" class="form-check-label"><?php echo get_field('required_title_cookies', 'option'); ?></label>
									<div class="clearfix"></div>
									<small class="cookie-info"><?php echo get_field('required_text_cookies', 'option'); ?></small>
								</div>
								<div class="clearfix"></div>
								<div class="form-group">
									<input type="checkbox" name="cookie-radio" id="cookie-functional" value="functional">
									<label for="cookie-functional" class="form-check-label"><?php echo get_field('functional_title_cookies', 'option'); ?></label>
									<div class="clearfix"></div>
									<small class="cookie-info"><?php echo get_field('functional_text', 'option'); ?></small>
								</div>
								<div class="clearfix"></div>
								<div class="form-group">
									<input type="checkbox" name="cookie-radio" id="cookie-analytical" value="analytical">
									<label for="cookie-analytical" class="form-check-label"><?php echo get_field('advertising_title_cookies', 'option'); ?></label>
									<div class="clearfix"></div>
									<small class="cookie-info"><?php echo get_field('advertising_text_cookies', 'option'); ?></small>
								</div>
							</div>
							<div class="col-sm-5 cookies-message">
								<p data-id="cookie-required" style="display: block;">
									<b><?php echo get_field('required_title_cookies', 'option'); ?></b>
									<?php echo get_field('required_text_cookies', 'option'); ?>
								</p>
								<p data-id="cookie-functional">
									<b><?php echo get_field('functional_title_cookies', 'option'); ?></b>
									<?php echo get_field('functional_text', 'option'); ?>
								</p>
								<p data-id="cookie-analytical">
									<b><?php echo get_field('advertising_title_cookies', 'option'); ?></b>
									<?php echo get_field('advertising_text_cookies', 'option'); ?>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<button class="btn primary btn-type" id="submit-preferences">
									<?php echo get_field('button_confirm_cookies', 'option'); ?>
									<svg class="btn-type-background">
										<use xlink:href="#btn-line"></use>
									</svg>
								</button>
							</div>
							<div class="col-6 cookies-settings-cancel">
								<button class="btn btn-default btn-type">
									<?php echo get_field('button_cancel_cookies', 'option'); ?>
									<svg class="btn-type-background">
										<use xlink:href="#btn-line1"></use>
									</svg>
									</button>
							</div>
						</div>
					</div>
					<!-- <div class="cookies-policy-link">
						<a href="" rel="nofollow" class="cookies-bar-know-more" title="Política de Privacidade" target="_blank">Política de Privacidade</a>
					</div> -->
				</div>
			</div>
		</div>
		<!-- Cookies ends -->
		
		<script>
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		</script>

		<?php wp_footer(); ?>
		<!-- inject:js -->
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js" defer></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/third-party/ScrollMagic/scrollmagic/minified/ScrollMagic.min.js" defer></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/third-party/gsap/minified/gsap.min.js" defer></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/third-party/ScrollMagic/scrollmagic/minified/plugins/animation.gsap.min.js" defer></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/third-party/ScrollMagic/scrollmagic/minified/plugins/debug.addIndicators.min.js" defer></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ub-main.js" defer></script>
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/custom-ajax.js" defer></script>
		<!-- endinject -->

</body>
</html>
