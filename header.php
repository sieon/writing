<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?> >
  <header class="header">
    <nav class="navbar navbar-expand-md navbar-light fixed-top" id="primary-navbar" role="navigation">
      <div class="container">
        <div class="text-center pb-2 pt-2">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

          <?php wp_nav_menu(
  					array(
  						'theme_location'  => 'primary',
  						'container_class' => 'collapse navbar-collapse',
  						'container_id'    => 'navbarNavDropdown',
  						'menu_class'      => 'navbar-nav',
  						'fallback_cb'     => '',
  						'menu_id'         => 'main-nav',
  						'walker'          => new WP_Bootstrap_Navwalker(),
  					)
  				);
          ?>

      </div>
    </nav>
  </header><!-- ./header -->

  <main class="site-content">
  <!-- 上面是复用的头部 -->

  <!-- <div class="header-bg">

  </div> -->
