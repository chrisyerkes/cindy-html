<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header id="MainHeader" class="fixed-top">
		<nav class="navbar navbar-expand-md main-menu">
			<div class="container">
				<a class="navbar-brand" href="<?php bloginfo('url'); ?>">Cindy Lau</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php wp_nav_menu(array(
						'theme_location' => 'top',
						'menu_class' => 'navbar-nav ms-auto mb-2 mb-md-0',
						'container' => '',
						'after' => ''
					)); ?>
					<?php block_template_part('social-nav-icons'); ?>
				</div>
			</div>
		</nav>
	</header>