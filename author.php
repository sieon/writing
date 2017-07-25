<?php
/**
 * 作者页面模板
 *
 * 学习更多: https://codex.wordpress.org/Author_Templates
 *
 * @package lean
 */

get_header();
?>

<div class="profile-header" <?php if ( get_theme_mod( 'author_bg') ) { echo 'style="background-image:url(' . esc_url( get_theme_mod( 'author_bg' ) ) . ');"'; } else { echo ''; } ?>>
  <div class="container">
    <div class="profile-header-container">
      <?php echo get_avatar( get_the_author_meta( $curauth->ID ), 80 ); ?>

      <?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>

      <h1 class="profile-header-author mt-2"><?php echo esc_html( $curauth->nickname ); ?></h1>

      <?php if ( ! empty( $curauth->user_description ) ) : ?>
        <p class="profile-header-bio"><?php echo esc_html( $curauth->user_description ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div><!-- .profile-header -->

<div class="container mt-4">
	<main>
    <?php
    if ( have_posts() ) : ?>

      <div class="posts">
        <div class="row">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-4">
              <?php get_template_part( 'template-parts/content-card', get_post_format() ); ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

      <div class="pagination pt-2 mt-2">
        <?php lean_pagination();?>
      </div>

    <?php else : ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif;     // Reset Post Data
    wp_reset_postdata();?>

	</main><!-- #main -->
</div><!-- Container end -->

<?php get_footer(); ?>
