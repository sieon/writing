<?php

function related_posts( $post_num = 6 ) {
	global $post;
    echo '<div class="w-100 mb-4 p-4 border rounded l-shadow-v28"><h4 class="h6 mb-4">你可能喜欢：</h3><div class="row">';
    $exclude_id = $post->ID;
    $posttags = get_the_tags(); $i = 0;
    if ( $posttags ) {
        $tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
        $args = array(
          'post_status' => 'publish',
          'tag__in' => explode(',', $tags),
          'post__not_in' => explode(',', $exclude_id),
          'ignore_sticky_posts' => 1,
          'orderby' => 'comment_date',
          'posts_per_page' => $post_num,
					'tax_query' => array(
						array(
	            'taxonomy' => 'post_format',
	            'field' => 'slug',
	            'terms' => array(
	                'post-format-aside',
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
        query_posts($args);
        while( have_posts() ) { the_post(); ?>
					<div class="col-md-4 col-6">
						<?php get_template_part( 'template-parts/related', 'posts'); ?>
					</div>
            <?php
            $exclude_id .= ',' . $post->ID; $i ++;
        }
		wp_reset_query();
    }
    if ( $i < $post_num ) {
        $cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
        $args = array(
          'category__in' => explode(',', $cats),
          'post__not_in' => explode(',', $exclude_id),
          'ignore_sticky_posts' => 1,
          'orderby' => 'comment_date',
          'posts_per_page' => $post_num - $i,
					'tax_query' => array(
						array(
	            'taxonomy' => 'post_format',
	            'field' => 'slug',
	            'terms' => array(
	                'post-format-aside',
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
        query_posts($args);
        while( have_posts() ) { the_post(); ?>
          <div class="col-md-4 col-6">
						<?php get_template_part( 'template-parts/related', 'posts' ); ?>
          </div>
            <?php $i++;
        }
		wp_reset_query();
    }
    if ( $i  == 0 )  echo '<div class="col-12"><p>没有相关文章!</p></div>';
    echo '</div></div>';
}
