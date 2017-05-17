<!doctype html>
<html itemscope itemtype="http://schema.org/Article" <?php language_attributes(); ?> class="no-js">
<head>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <?php wp_head(); ?>
	
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/favicon.png">
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Designership</a>
			<nav>
				<?php
				if ( has_nav_menu('primary-menu') ) {
					wp_nav_menu(array(
						'theme_location' => 'primary-menu',
						'container'      => '',
						'items_wrap'     => '<ul id="primary-menu" class="%2$s">%3$s</ul>',
					));
				}
				?>
				<a href="https://join.slack.com/thedesignership/shared_invite/MTc2MjczNzM1MDg5LTE0OTM2MzE4MzAtNDc4Y2E0ZTE2Mg" target="_blank"  class="button primary small"><img src="<?php echo get_template_directory_uri() ?>/img/slack-icon.svg" alt="slack">Join Slack Channel</a>
			</nav>
		</div>
	</header>
