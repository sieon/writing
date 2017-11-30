<?php

function related_posts( $post_num = 6 ) {
	global $post;
    echo '<div class="w-100 mb-4"><h3 class="h5 d-inline-block py-2 l-title-v0 mb-3">你可能喜欢：</h3><div class="row gutter-20">';
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
					<div class="col-md-4">
						<article <?php post_class('card border-0'); ?> id="post-<?php the_ID(); ?>">

						  <div class="card-img">
						    <?php if( has_post_thumbnail() ) : ?>

						      <a href="<?php the_permalink(); ?>">
						        <figure class="img-grow">
						          <?php the_post_thumbnail( 'news-thumb-v1', ['class' => ''] ); ?>
						        </figure>
						      </a>

						    <?php else: // no thumbnail ?>

						      <a href="<?php the_permalink(); ?>">
						        <figure class="img-grow">
						          <img src="<?php echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="图片占位符">
						        </figure>
						      </a>
						    <?php endif; ?>
						  </div>

						  <header class="entry-header mb-3">

						    <?php the_title( sprintf( '<h3 class="entry-title fw-400 h6 l-h-2-4 line-clamp-2"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						    '</a></h3>' ); ?>

						  </header><!-- .entry-header -->

						</article><!-- #post-## -->

					</div>
					<?php $exclude_id .= ',' . $post->ID; $i ++;
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
					<div class="col-md-4">
						<article <?php post_class('card border-0'); ?> id="post-<?php the_ID(); ?>">

							<div class="card-img">
								<?php if( has_post_thumbnail() ) : ?>

									<a href="<?php the_permalink(); ?>">
										<figure class="img-grow">
											<?php the_post_thumbnail( 'news-thumb-v1', ['class' => ''] ); ?>
										</figure>
									</a>

								<?php else: // no thumbnail ?>

									<a href="<?php the_permalink(); ?>">
										<figure class="img-grow">
											<img src="<?php echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="图片占位符">
										</figure>
									</a>
								<?php endif; ?>
							</div>

							<header class="entry-header mb-3">

								<?php the_title( sprintf( '<h3 class="entry-title fw-400 h6 l-h-2-4 line-clamp-2"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
								'</a></h3>' ); ?>

							</header><!-- .entry-header -->

						</article><!-- #post-## -->
					</div>

					<?php $i++;
        }
		wp_reset_query();
    }
    if ( $i  == 0 )  echo '<div class="col-12">没有相关文章!</div>';
    echo '</div></div>';
}
