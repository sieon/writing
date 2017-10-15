<?php
/**
 * 作者页面模板
 *
 * 学习更多: https://codex.wordpress.org/Author_Templates
 *
 * @package writing
 */

get_header();
?>

<div <?php if ( get_theme_mod( 'author_bg') ) { echo 'class="profile-header" style="background-image:url(' . esc_url( get_theme_mod( 'author_bg' ) ) . ');"'; } else { echo 'class="profile-header bg-dark"'; } ?>>
  <div class="container">
    <div class="container-inner">
      <?php echo get_avatar( get_the_author_meta( $curauth->ID ), 80 ); ?>

      <?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
      <!-- <img class="rounded-circle media-object" src="../assets/img/avatar-dhg.png"> -->
      <h3 class="profile-header-user"><?php echo esc_html( $curauth->nickname ); ?></h3>
      <?php if ( ! empty( $curauth->user_description ) ) : ?>
      <p class="profile-header-bio">
        <?php echo esc_html( $curauth->user_description ); ?>
      </p>
      <?php endif; ?>
    </div>
  </div>

  <nav class="profile-header-nav">
    <ul class="nav nav-tabs justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="#">他发表的文章</a>
      </li>
    </ul>
  </nav>
</div>

<div class="container mt-4">
  <?php if ( have_posts() ) : ?>
  <div class="posts-card">
    <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-lg-3">
          <?php get_template_part( 'template-parts/card/card', get_post_format() ); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <div class="pagination pt-2 mt-2">
    <?php lean_pagination();?>
  </div>
  <?php else : ?>
    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
  <?php endif; ?>
</div><!-- Container end -->

<?php get_footer(); ?>
