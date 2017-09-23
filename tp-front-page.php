<?php
/**
 * Template Name: 首页模板
 */
get_header(); ?>

<?php get_template_part( 'template-parts/content', 'carousel' ); ?>

<div class="container mt-4">
  <div class="row mt-4">
    <div class="col-6">
      <?php
      $args = array(
        'posts_per_page' => '10',
        'post_type' => 'post',
        'caller_get_posts' => 1,
        'tax_query' => array(
          array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array(
                //'post-format-aside',
                //'post-format-audio',
                //'post-format-chat',
                'post-format-gallery',
                //'post-format-image',
                //'post-format-link',
                //'post-format-quote',
                //'post-format-status',
                //'post-format-video'
            ),
            'operator' => 'NOT IN'
          )
        )
      );
      query_posts( $args );
      while ( have_posts() ) : the_post();
      /* 显示内容 */
        get_template_part( 'template-parts/content', get_post_format() );
      endwhile;wp_reset_postdata();
      ?>

    </div>
    <div class="col-6">
      <?php
      $args = array(
        'posts_per_page' => '10',
        'post_type' => 'post',
        'caller_get_posts' => 1,
        'tax_query' => array(
          array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array(
                //'post-format-aside',
                //'post-format-audio',
                //'post-format-chat',
                'post-format-gallery',
                //'post-format-image',
                //'post-format-link',
                //'post-format-quote',
                //'post-format-status',
                //'post-format-video'
            ),
            'operator' => 'NOT IN'
          )
        )
      );
      query_posts( $args );
      while ( have_posts() ) : the_post();
      /* 显示内容 */
        get_template_part( 'template-parts/content', get_post_format() );
      endwhile;wp_reset_postdata();
      ?>

    </div>
  </div>
</div><!--./container -->

<?php get_footer(); ?>
