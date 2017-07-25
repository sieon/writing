<?php get_header();?>

<header class="jumbotron <?php
switch (get_theme_mod( 'style-colors')) {
  case 'style-white':
    echo 'bg-white';
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
  <div class="container">
    <?php
    lean_the_archive_title( '<h1>', '</h1>' );
    lean_the_archive_description( '<div>', '</div>' );
    ?>
  </div>
</header>

  <div class="container mt-4">
    <div class="site-main">
      <div class="row">
        <div class="col-lg-8">
           <main class="main-content">

               <?php while ( have_posts() ) : the_post(); ?>

                 <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                 <?php
                 //上一篇、下一篇
                 if ( get_theme_mod( 'post-nav')==yes ) {
                   lean_the_post_navigation();
                 } ?>

               <?php //相关文章
               if ( get_theme_mod( 'related_posts')==yes ) {
                related_posts();
               } ?>

               <?php // 加载评论
               if ( comments_open() || get_comments_number() ) :
                 comments_template();
               endif;
               ?>
               <?php endwhile; // end of the loop. ?>

           </main>
        </div>

        <?php get_sidebar();?>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
<?php get_footer();?>
