<?php get_header(); ?>
<div class="container mt-5">
  <div class="site-main">
    <div class="row">
      <main class="col-lg-8">
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
        if ( $the_query->have_posts() ) :?>
          <div class="posts-list">
            <?php  while ( $the_query->have_posts() ) : $the_query->the_post();
              /* 显示内容 */
              get_template_part( 'template-parts/posts0', get_post_format() );
            endwhile; ?>
          </div>
          <div class="pagination pt-2 mt-2">
            <?php lean_pagination();?>
          </div>
        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;wp_reset_postdata();
        ?>
      </main><!--/.col-8-->
      <?php get_sidebar();?>
    </div><!--/.row-->
  </div>
</div>
<?php get_footer(); ?>
