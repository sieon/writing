<?php
/**
 *
 * @package lean
 */
?>

<?php
    $post_content = get_the_content();
    $link_url = wp_extract_urls($post_content);

    $url_host = parse_url($link_url[0], PHP_URL_HOST);
    $base_url_host = parse_url(home_url(), PHP_URL_HOST);

    $external = true;

    if($url_host == $base_url_host || empty($url_host)) {
        $external = false;
    }
?>

<article class="card l-shadow-v28">
  <div class="card-body">

    <?php if( is_single() ): ?>

    <?php the_title( '<h1 class="card-title mb-4">' ,'</h1>' ); ?>

    <div class="entry-content">

      <?php
      if ( get_theme_mod( 'post-tags')==top ) {
        $posttags = get_the_tags();
        if ( $posttags ) {
          echo '<div class="post-tags mb-3">';
          foreach( $posttags as $tag ) {
            echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-secondary btn-sm mr-3 mb-2">' . $tag->name . '</a>';
          }
          echo '</div>';
        }
      }
      ?>

      <p>
        <?php if($external) : ?>
            <a href="<?php echo $link_url[0]; ?>" target="_blank" rel="nofollow"><?php the_title(); ?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
        <?php else : ?>
            <a href="<?php echo $link_url[0]; ?>" target="_self"><?php the_title(); ?></a>
        <?php endif; ?>
      </p>

      <?php
      if ( get_theme_mod( 'post-tags')==bottom ) {
        $posttags = get_the_tags();
        if ( $posttags ) {
          echo '<div class="post-tags mt-4 mb-3">';
          foreach( $posttags as $tag ) {
            echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-secondary btn-sm mr-2 mb-2">' . $tag->name . '</a>';
          }
          echo '</div>';
        }
      } ?>

    </div>

  <?php else: ?>
    <h2 class="card-title h5 line-clamp-2 text-overflow-ellipsis mb-3">
      <?php if($external) : ?>
        <a href="<?php echo $link_url[0]; ?>" target="_blank" rel="nofollow"><?php the_title(); ?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
      <?php else : ?>
        <a href="<?php echo $link_url[0]; ?>" target="_self"><?php the_title(); ?></a>
      <?php endif; ?>
    </h2>

    <?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
      <p class="card-text line-clamp-2 text-overflow-ellipsis entry-excerpt hidden-sm-down">
        <?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
      </p>
      <?php } else {
        echo '';
      } ?>
    <?php endif; // end is_single ?>
  </div>
</article>
