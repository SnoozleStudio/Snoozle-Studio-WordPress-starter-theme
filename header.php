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

	<?php get_template_part('template-parts/background'); ?>

	<div id="page" class="site">

		<header id="masthead" class="site-header fixed-top">
			<div class="container site-header__wrapper">
				<div class="d-flex flex-wrap align-items-center justify-content-between py-3 site-header__nav">
					<div class="site-header__info">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-link text-dark text-decoration-none text-uppercase"
							data-bs-toggle="modal" data-bs-target="#exampleModal">
							<!-- <svg class="bi">
								<use
									xlink:href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dist/svg/sprite-default.svg#icon-search" />
							</svg> -->
							<?php esc_html_e('Search', 'ss'); ?>
						</button>
					</div>

					<?php
					// Get the image URL
					$image_url = get_theme_mod('ss_brand_image_setting');

					// Get the alt text
					$alt_text = get_theme_mod('ss_brand_alt_text_setting');
					?>
					<a href="<?php echo esc_url(home_url('/')); ?>" class="d-flex flex-column align-items-center text-decoration-none">
						<?php if ($image_url) { ?>
							<img class="site-header__brand" src="<?php echo esc_url($image_url); ?>"
								alt="<?php echo esc_attr($alt_text); ?>">
						<?php } else { ?>
							<?php echo esc_html(get_bloginfo('name')); ?>
							<span class="tagline">
								<?php echo esc_html(get_bloginfo('description')); ?>
							</span>
						<?php } ?>
					</a>

					<div class="site-header__menu d-flex justify-content-end">
						<button class="btn btn-link text-dark text-decoration-none text-uppercase" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent"
							aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
							<?php esc_html_e('Menu', 'ss'); ?>
						</button>
					</div>
				</div>

				<div class="collapse" id="navbarToggleExternalContent">
					<div class="p-2">
						<div class="px-1 py-5" style="font-size: 50px;">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="site-header__bg"></div>
		</header><!-- #masthead -->

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<?php echo get_search_form(); ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<div id="content" class="site-content">