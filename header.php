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

		<header id="masthead" class="site-header">

			<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<?php bloginfo('name'); ?>
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="main-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container' => false,
								'menu_class' => '',
								'fallback_cb' => '__return_false',
								'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
								'depth' => 2,
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							)
						);
						?>
						<form class="d-flex" role="search">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Search</button>
						</form>
					</div>

				</div>
			</nav><!-- .navbar -->

		</header><!-- #masthead -->

		<div id="content" class="site-content">