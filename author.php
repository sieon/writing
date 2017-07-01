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

<div class="profile-header text-center" <?php if ( get_theme_mod( 'author_bg') ) { echo 'style="background-image:url(' . esc_url( get_theme_mod( 'author_bg' ) ) . ');'; } else { echo ''; } ?>>
  <div class="contaniner">
    <div class="phc">
      <?php echo get_avatar( get_the_author_meta( $curauth->ID ), 80 ); ?>

      <?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>

      <h1 class="author-name mt-2"><?php echo esc_html( $curauth->nickname ); ?></h1>

      <?php if ( ! empty( $curauth->user_description ) ) : ?>
        <p class="mt-1"><?php echo esc_html( $curauth->user_description ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div><!-- .profile-header -->

<div class="container mt-3">
	<main>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'paged'=> $paged,
      'tax_query' => array(
        array(
          'taxonomy' => 'post_format',
          'field' => 'slug',
          'terms' => array(
              //'post-format-aside',
              //'post-format-audio',
              //'post-format-chat',
              //'post-format-gallery',
              //'post-format-image',
              'post-format-link',
              //'post-format-quote',
              'post-format-status',
              //'post-format-video'
          ),
          'operator' => 'NOT IN'
        )
      )
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) : ?>

      <div class="posts-card">
        <div class="row">
          <?php  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php get_template_part( 'template-parts/posts-card', get_post_format() ); ?>
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
