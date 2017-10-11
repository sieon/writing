<?php
/**
 * 图片模板
 * @package lean
 */
?>

<?php if(is_single()): ?>

	<div class="bg-white w-100 mb-4 p-4 border rounded l-shadow-v28">

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

		<div class="entry-content pt-3 clearfix">
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
    </div>

<?php else: // not single ?>

	<article class="bg-white mb-4 p-4 rounded border l-shadow">

		<?php
		if ( is_single() ) {
			the_title( '<h1 class="mb-4">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="l-link-v9 mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="l-link-v9 mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>

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

		<a class="entry-img mb-3" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
		</a>

		<a class="" href="<?php echo get_permalink(); ?>">阅读全文</a>
	</article>
<?php endif; // end is_single ?>
