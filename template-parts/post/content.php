<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>

<?php if(is_single()): ?>
  <article class="bg-white w-100 mb-4 p-4 border rounded l-shadow">
    <?php the_title( '<h1 class="mb-4">','</h1>' ); ?>

    <?php
    if ( 'post' === get_post_type() ) {
      echo '<div class="entry-meta l-link-v4"><ul class="list-inline">';
        if ( is_single() ) {
          writing_posted_on();
        } else {
          echo writing_time_link();
          //wiring_edit_link();
        };

      echo '<li class="list-inline-item"> &bull; </li>';

        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach( $categories as $category ) {
                $output .= '<li class="list-inline-item"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
            }
            echo trim( $output, $separator );
        }

      echo '</ul></div><!-- .entry-meta -->';

    }; ?>

		<div class="entry-content clearfix pt-3">
            <?php the_content(); ?>
		</div>

    <?php
    $posttags = get_the_tags();
    if ( $posttags ) {
      echo '<div class="post-tags mt-4 mb-3">';
      foreach( $posttags as $tag ) {
        echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-outline-dark btn-sm mr-2 mb-2">' . $tag->name . '</a>';
      }
      echo '</div>';
    }
    ?>
	</article>

<?php else: // not single ?>

  <?php if( has_post_thumbnail() ) : ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('w-100 bg-white mb-4 p-4 rounded border l-shadow'); ?>>
			<div class="row">
        <div class="col-4">
          <figure class="g-pos-rel mb-0">
            <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
            <a class="g-pos-abs l-link-v0" href="<?php echo get_permalink(); ?>"></a>
          </figure>
        </div>

				<div class="col-8">
          <?php the_title( sprintf( '<h2 class="l-link-v9 mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
          <?php
          if ( 'post' === get_post_type() ) {
            echo '<div class="entry-meta l-link-v4"><ul class="list-inline">';
              if ( is_single() ) {
                writing_posted_on();
              } else {
                echo writing_time_link();
                //wiring_edit_link();
              };

            echo '<li class="list-inline-item"> &bull; </li>';

              $categories = get_the_category();
              $separator = ' ';
              $output = '';
              if ( ! empty( $categories ) ) {
                  foreach( $categories as $category ) {
                      $output .= '<li class="list-inline-item"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
                  }
                  echo trim( $output, $separator );
              }

            echo '</ul></div><!-- .entry-meta -->';

          }; ?>
          <p class="l-color-v7 d-md-none d-lg-block mb-0">
            <?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
          </p>
        </div>
			</div><!-- .row -->
		</article>

	<?php else: ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('w-100 bg-white mb-4 p-4 rounded border l-shadow')?>>

			<?php the_title( sprintf( '<h2 class="l-link-v9 mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

      <?php
      if ( 'post' === get_post_type() ) {
        echo '<div class="entry-meta l-link-v4"><ul class="list-inline">';
          if ( is_single() ) {
            writing_posted_on();
          } else {
            echo writing_time_link();
            //wiring_edit_link();
          };

        echo '<li class="list-inline-item"> &bull; </li>';

          $categories = get_the_category();
          $separator = ' ';
          $output = '';
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                  $output .= '<li class="list-inline-item"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
              }
              echo trim( $output, $separator );
          }

        echo '</ul></div><!-- .entry-meta -->';

      }; ?>

			<p class="l-color-v7 mt-3 mb-0 d-md-none d-lg-block">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>

		</article>

	<?php endif; //end thumbnail ?>

<?php endif; // end is_single ?>
