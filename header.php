<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('pt-3-5'); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<nav id="navbarNavDropdown" class="collapse navbar-collapse">

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'navbar-nav mr-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new WP_Bootstrap_Navwalker(),
						)
					); ?>

				 <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
				 	<!-- <label class="assistive-text" for="s"><?php //esc_html_e( 'Search', 'understrap' ); ?></label> -->
				 	<div class="input-group">
				 		<input class="field form-control" id="s" name="s" type="text"
				 			placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>">
				 		<span class="input-group-btn">
				 			<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
				 			value="<?php esc_attr_e( 'Search', 'understrap' ); ?>">
				 	</span>
				 	</div>
				 </form>

				</nav>

			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
