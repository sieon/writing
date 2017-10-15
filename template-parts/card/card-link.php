<?php
/**
 * link
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

<article class="card l-shadow">
  <div class="card-body">
    <h2 class="card-title mb-3">
      <?php if($external) : ?>
        <a href="<?php echo $link_url[0]; ?>" target="_blank" rel="nofollow"><?php the_title(); ?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
      <?php else : ?>
        <a href="<?php echo $link_url[0]; ?>" target="_self"><?php the_title(); ?></a>
      <?php endif; ?>
    </h2>
    <p class="card-text">
      <?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
    </p>
  </div>
</article>
