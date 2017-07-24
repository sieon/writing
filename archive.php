<?php get_header(); ?>

<header class="jumbotron <?php
switch (get_theme_mod( 'style-colors')) {
  case 'style-white':
    echo 'text-white bg-dark';
    break;

    case 'style-faded':
      echo 'bg-light';
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
    echo 'text-white bg-dark';
    break;

  case 'style-success':
    echo 'text-white bg-success';
    break;

  default:
    echo 'text-white bg-dark';
    break;
} ?> rounded-0 mb-3">
  <div class="container">
    <?php
    lean_the_archive_title( '<h1>', '</h1>' );
    lean_the_archive_description( '<div>', '</div>' );
    ?>
  </div>
</header>

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-8">
      <div class="main-content">

            <?php if ( have_posts() ) : ?>
              <div class="posts">
                <?php while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', get_post_format() );
              endwhile; ?>
              </div>


        <div class="pagination">
          <?php lean_pagination();?>
        </div>

        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; wp_reset_postdata();?>
      </div>
    </div>

    <?php get_sidebar();?>

  </div>
</div>

<?php get_footer(); ?>
