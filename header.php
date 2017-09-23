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
    <nav class="navbar navbar-expand-lg navbar-shadow <?php echo get_theme_mod( 'style-colors' ); ?> navbar-bg fixed-top" id="primary-navbar" role="navigation">
      <div class="container">


          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

            <?php if ( get_theme_mod( 'custom_logo') ) {
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
              echo '<img src="' . $image[0] . '" alt=">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';
            } else {
              echo esc_attr( get_bloginfo( 'name', 'display' ) );
            } ?>

          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div id="navbarNavDropdown" class="collapse navbar-collapse">
            <?php wp_nav_menu(
              array(
                'theme_location'  => 'primary',
                'depth'           => '2',
                  'container'       => 'div',
                  'container_class' => 'mr-auto',
                  'container_id'    => '',
                  'menu_class'      => 'navbar-nav mr-auto',
                  'menu_id'         => 'main-nav',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker())
            );
            ?>
            <form class="form-inline" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <input class="form-control mr-sm-2" type="text" placeholder="搜索..." aria-label="搜索" name="s">
            </form>
          </div>

      </div>
    </nav>
  </header><!-- ./header -->

  <main class="site-content">
  <!-- 上面是复用的头部 -->

  <!-- <div class="header-bg">

  </div> -->
