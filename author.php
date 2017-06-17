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

<div class="container mt-5">
  <div class="site-main">
    <div class="row">
  		<main class="col-lg-8 ">
  			<header class="media">
          <div class="d-flex mr-3">
            <?php if ( ! empty( $curauth->ID ) ) : ?>
              <?php echo get_avatar( $curauth->ID ,48); ?>
            <?php endif; ?>
          </div>

          <div class="media-body">
            <?php
            $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
              $author_name ) : get_userdata( intval( $author ) );
            ?>

            <h1><?php esc_html_e( '作者：', 'lean' ); ?><?php echo esc_html( $curauth->nickname ); ?></h1>

            <dl>
              <?php if ( ! empty( $curauth->user_url ) ) : ?>
                <dt><?php esc_html_e( '网站', 'lean' ); ?></dt>
                <dd>
                  <a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
                </dd>
              <?php endif; ?>

              <?php if ( ! empty( $curauth->user_description ) ) : ?>
                <dt><?php esc_html_e( '个人信息', 'lean' ); ?></dt>
                <dd><?php echo esc_html( $curauth->user_description ); ?></dd>
              <?php endif; ?>
            </dl>
          </div>
  			</header><!-- .page-header -->

        <h2>最近发表的文章</h2>
        <?php if ( have_posts() ) : ?>
        <?php  while ( have_posts() ) : the_post(); ?>
           <?php get_template_part( 'template-parts/posts', 'list' ); ?>
          <?php endwhile; ?>
          <div class="pagination pt-2 mt-2">
            <?php lean_pagination();?>
          </div>
          <?php else : ?>
       <?php get_template_part( 'template-parts/content', 'none' ); ?>
       <?php endif;     // Reset Post Data
         wp_reset_postdata();?>

  		</main><!-- #main -->

      <?php get_sidebar();?>
  	</div> <!-- .row -->
  </div><!-- .site-main -->
</div><!-- Container end -->

<?php get_footer(); ?>
