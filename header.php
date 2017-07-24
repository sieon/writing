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
    <nav class="navbar navbar-expand-lg navbar-shadow <?php
    switch (get_theme_mod( 'style-colors')) {
      case 'style-white':
        echo 'navbar-light bg-white';
        break;

        case 'style-light':
          echo 'navbar-light bg-light';
          break;

          case 'style-dark':
            echo 'navbar-dark bg-dark';
            break;

            case 'style-danger':
              echo 'navbar-dark bg-danger';
              break;

              case 'style-warning':
                echo 'navbar-dark bg-warning';
                break;

                case 'style-info':
                  echo 'navbar-dark bg-info';
                  break;

      case 'style-primary':
        echo 'navbar-dark bg-primary';
        break;

      case 'style-success':
        echo 'navbar-dark bg-success';
        break;

      default:
        echo 'navbar-light bg-white';
        break;
    } ?> fixed-top" id="primary-navbar" role="navigation">
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
                'container_class' => 'mr-auto',
                'container_id'    => '',
                'menu_class'      => 'navbar-nav mr-auto',
                'fallback_cb'     => '',
                'menu_id'         => 'main-nav',
                'walker'          => new WP_Bootstrap_Navwalker(),
              )
            );
            ?>

            <form class="form-inline" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <input class="form-control mr-sm-2" type="text" placeholder="输入后按Enter" aria-label="Search" name="s">
            </form>
          </div>

      </div>
    </nav>
  </header><!-- ./header -->

  <main class="site-content">
  <!-- 上面是复用的头部 -->

  <!-- <div class="header-bg">

  </div> -->
