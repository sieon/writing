<?php get_header(); ?>



<div class="container mt-4">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <main class="main-content">

          <header class="jumbotron <?php
          switch (get_theme_mod( 'style-colors')) {
            case 'style-white':
              echo 'bg-light';
              break;

              case 'style-light':
                echo 'text-white bg-dark';
                break;

                case 'style-dark':
                  echo 'text-white bg-dark';
                  break;

                  case 'style-danger':
                    echo 'text-white bg-danger';
                    break;

                    case 'style-warning':
                      echo 'text-white bg-warning';
                      break;

                      case 'style-info':
                        echo 'text-white bg-info';
                        break;

            case 'style-primary':
              echo 'bg-white';
              break;

            case 'style-success':
              echo 'text-white bg-success';
              break;

            default:
              echo 'text-white bg-light';
              break;
          } ?> rounded-0 mb-3 pb-5 pt-5">
            <div class="">
              <p class="tag-tip"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;标签</p>
              <?php
              lean_the_archive_title( '<div class="single-header-title"><h1 class="d-inline">', '</h1>&nbsp;<span>相关的文章</span></div>' );
              lean_the_archive_description( '<div class="text-muted mt-2 mb-3">', '</div>' );
              ?>
            </div>
          </header>

          <?php if ( have_posts() ) : ?>
          <div class="posts">
            <?php while ( have_posts() ) : the_post();?>
              <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
            <?php endwhile; ?>
          </div>
            <div class="pagination p-3">
              <?php lean_pagination();?>
            </div>

      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      wp_reset_postdata(); ?>
        </main>

      </div><!-- ./ col-lg-8 -->

      <?php get_sidebar();?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
