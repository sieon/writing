<?php

function related_posts( $post_num = 6 ) {
	global $post;
    echo '<div class="related-posts card"><div class="card-body"><h4 class="card-title mb-3">你可能喜欢：</h4><div class="row">';
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
            <div class="card border-0">
							<?php if(has_post_thumbnail()) : ?>
	              <a class="entry-img" href="<?php the_permalink(); ?>">
	                <?php the_post_thumbnail('medium', ['class' => 'card-img']); ?>
	              </a>

							<?php else: ?>
								<a class="entry-img" href="<?php the_permalink(); ?>">
									<?php if ( get_theme_mod( 'placeholder') ) {
			              echo '<img src="' . esc_url( get_theme_mod( 'placeholder' ) ) . '" alt="图片占位符" class="card-img-top">';
			            } else {
			              echo '<img src="' . THEME_URI . '/assets/img/placeholder.png" alt="图片占位符" class="card-img-top">';
			            } ?>
							  </a>
							<?php endif; ?>

              <p class="card-text text-link-color mt-2 line-clamp-2 text-overflow-ellipsis">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
              </p>
            </div>
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
            <div class="card border-0">
							<?php if(has_post_thumbnail()) : ?>
	              <a class="entry-img" href="<?php the_permalink(); ?>">
	                <?php the_post_thumbnail('medium', ['class' => 'card-img']); ?>
	              </a>

							<?php else: ?>
								<a class="entry-img" href="<?php the_permalink(); ?>">

									<?php if ( get_theme_mod( 'placeholder') ) {
			              echo '<img src="' . esc_url( get_theme_mod( 'placeholder' ) ) . '" alt="图片占位符" class="card-img-top">';
			            } else {
			              echo '<img src="' . THEME_URI . '/assets/img/placeholder.png" alt="图片占位符" class="card-img-top">';
			            } ?>

							  </a>
							<?php endif; ?>
              <p class="card-text text-link-color mt-2 line-clamp-2 text-overflow-ellipsis">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</p>
            </div>
          </div>
            <?php $i++;
        }
		wp_reset_query();
    }
    if ( $i  == 0 )  echo '<div class="col-12"><p>没有相关文章!</p></div>';
    echo '</div></div></div>';
}
