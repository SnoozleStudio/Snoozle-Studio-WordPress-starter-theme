<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">

		<header id="masthead" class="site-header fixed-top">
			<div class="container-fluid site-header__wrapper">
				<div class="d-flex flex-wrap align-items-center justify-content-between px-5 py-4 site-header__nav">

					<?php
					// Get the image URL
					$ss_brand_image_url = get_theme_mod('ss_brand_image_setting');

					// Get the alt text
					$ss_brand_alt_text = get_theme_mod('ss_brand_alt_text_setting');
					?>
					<a href="<?php echo esc_url(home_url('/')); ?>"
						class="site-header__brand d-flex flex-column align-items-center text-decoration-none">
						<?php if ($ss_brand_image_url) { ?>
							<img class="site-header__brand--img" src="<?php echo esc_url($ss_brand_image_url); ?>"
								alt="<?php echo esc_attr($ss_brand_alt_text); ?>">
							<div class="site-header__brand--light"></div>
						<?php } else { ?>
							<?php echo esc_html(get_bloginfo('name')); ?>
							<span class="tagline">
								<?php echo esc_html(get_bloginfo('description')); ?>
							</span>
						<?php } ?>
					</a>

					<div class="site-header__menu d-flex justify-content-end">
						<button class="site-header__btn btn btn-link text-white text-decoration-none" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent"
							aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
							<span>
								<?php echo esc_html_e('Menu', 'ss'); ?>
							</span>
							<span class="site-header__btn--hide">
								<?php echo esc_html_e('Close', 'ss'); ?>
							</span>
						</button>



						<!-- Button trigger modal -->
						<button type="button" class="btn btn-outline-light rounded-pill" data-bs-toggle="modal"
							data-bs-target="#contactsModal">
							<?php esc_html_e('Contacts', 'ss'); ?>
						</button>

					</div>
				</div>

				<div class="site-header__collapse collapse" id="navbarToggleExternalContent">
					<div class="w-100 py-5">
						<div class="site-header__content">
							<div class="d-flex justify-content-between">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'main-menu',
										'container' => false,
										'walker' => new Main_Vadini_Nav_Walker()
									)
								);
								?>

								<div class="site-header__contacts">




									<?php
									// Retrieve the value of the telephone number setting
									$ss_telephone_number = get_theme_mod('ss_contacts_telephone_setting', '');
									$ss_mobile_phone_number = get_theme_mod('ss_contacts_mobile_phone_setting', '');
									$ss_email_address = get_theme_mod('ss_contacts_email_setting', '');
									?>

									<?php
									// Check if the telephone number value is not empty before displaying it
									if (!empty($ss_telephone_number) || !empty($ss_mobile_phone_number) || !empty($ss_email_address)) {
										?>



										<div class="site-header__contacts-type">
											<div class="site-header__contacts-type-info">
												<?php esc_html_e('Contacts', 'ss'); ?>
											</div>
											<div class="site-header__contacts-type-data">


												<?php if (!empty($ss_telephone_number)) { ?>
													<?php $href_telephone_number = str_replace(' ', '', $ss_telephone_number); ?>
													<div>
														<span>
															<?php esc_html_e('Telephone', 'ss'); ?>
														</span>
														<a href="tel:<?php echo esc_attr($href_telephone_number); ?>">
															<?php echo esc_html($ss_telephone_number); ?>
														</a>
													</div>
												<?php } ?>

												<?php if (!empty($ss_mobile_phone_number)) { ?>
													<?php $href_mobile_number = str_replace(' ', '', $ss_mobile_phone_number); ?>
													<div>
														<span>
															<?php esc_html_e('Mobile', 'ss'); ?>
														</span>
														<a href="tel:<?php echo esc_attr($href_mobile_number); ?>">
															<?php echo esc_html($ss_mobile_phone_number); ?>
														</a>
													</div>
												<?php } ?>

												<?php if (!empty($ss_email_address)) { ?>
													<div>
														<span>
															<?php esc_html_e('Email', 'ss'); ?>
														</span>
														<a href="mailto:<?php echo antispambot($ss_email_address); ?>">
															<?php echo esc_html($ss_email_address); ?>
														</a>
													</div>
												<?php } ?>


											</div>
										</div>
									<?php } ?>





									<?php
									// Get the address
									$ss_contacts_address = get_theme_mod('ss_contacts_address_setting', '');
									?>
									<?php if (!empty($ss_contacts_address)) { ?>
										<div class="site-header__contacts-type">
											<div class="site-header__contacts-type-info">
												<?php esc_html_e('Address', 'ss'); ?>
											</div>
											<div>
												<?php echo wpautop($ss_contacts_address); ?>
											</div>
										</div>
									<?php } ?>


									<?php
									// Retrieve the value of the "Working Hours" setting
									$ss_working_hours = get_theme_mod('ss_contacts_working_hours_setting', '');
									?>

									<?php
									// Check if the working hours value is not empty before displaying it
									if (!empty($ss_working_hours)) {
										?>
										<div class="site-header__contacts-type">
											<div class="site-header__contacts-type-info">
												<?php esc_html_e('Hours', 'ss'); ?>
											</div>
											<div>
												<?php echo wpautop($ss_working_hours); ?>
											</div>
										</div>
									<?php } ?>
								</div>





							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="site-header__bg"></div>
		</header><!-- #masthead -->



		<!-- Modal -->
		<div class="contacts-modal modal fade" id="contactsModal" tabindex="-1" aria-labelledby="contactsModalLabel"
			aria-hidden="true">
			<div class="contacts-modal-dialog modal-dialog modal-dialog-centered">
				<div class="modal-content rounded-5 position-relative overflow-hidden bg-transparent" data-bs-theme="dark">
					<?php
					// Get the image URL
					$ss_contacts_image_url = get_theme_mod('ss_contacts_image_setting');

					// Get the alt text
					$ss_contacts_image_alt_text = get_theme_mod('ss_contacts_image_alt_text_setting');
					?>

					<?php if ($ss_contacts_image_url) { ?>
						<img class="position-absolute top-50 start-50 translate-middle z-n1 w-100 h-100 object-fit-cover"
							src="<?php echo esc_url($ss_contacts_image_url); ?>"
							alt="<?php echo esc_attr($ss_contacts_image_alt_text); ?>">
					<?php } ?>

					<div class="row">
						<div class="col-3"></div>
						<div class="col-9 ss-bg-blur">
							<div class="modal-header border-0">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<h1 class="modal-title text-white display-1 mb-5" id="contactsModalLabel">
									<?php esc_html_e('Contacts', 'ss'); ?>
								</h1>
								...
							</div>
							<div class="modal-footer border-0">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>




		<div id="content" class="site-content">