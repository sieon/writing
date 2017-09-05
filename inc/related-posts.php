<?php

function related_posts( $post_num = 6 ) {
	global $post;
    echo '<div class="bg-white w-100 mb-4 px-4 pt-4 pb-1 border rounded l-shadow"><h4 class="h6 mb-3">你可能喜欢：</h3><div class="row">';
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

					<div class="col-lg-4">
						<article class="mb-3">

							<?php
							// $categories = get_the_category();
							// if ( ! empty( $categories ) ) {
							// 	echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="btn btn-success btn-sm mb-3">' . esc_html( $categories[0]->name ) . '</a>';
							// } ?>

							<?php the_title( sprintf( '<p class="line-h-1-8 line-clamp-2 text-overflow-ellipsis mb-2"><a class="l-link-v9" href="%s">', esc_url( get_permalink() ) ), '</a></p>' ); ?>

							<small class="l-link-v6">
								<span class="oi oi-clock align-middle g-mr-5"></span> <?php the_time('Y-m-d'); ?>
							</small>

						</article>
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
					<div class="col-lg-4">
						<article class="mb-3">

							<?php the_title( sprintf( '<p class="line-h-1-8 line-clamp-2 text-overflow-ellipsis"><a class="l-link-v9" href="%s">', esc_url( get_permalink() ) ), '</a></p>' ); ?>

							<small class="l-link-v6">
								<i class="oi oi-clock align-middle g-mr-5"></i> <?php the_time('Y-m-d'); ?>
							</small>

						</article>
					</div>
            <?php $i++;
        }
		wp_reset_query();
    }
    if ( $i  == 0 )  echo '<div class="col-12">没有相关文章!</div>';
    echo '</div></div>';
}
