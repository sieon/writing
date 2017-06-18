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

<article class="entry">
  <header class="entry-header">
    <?php if($external) : ?>
        <a href="<?php echo $link_url[0]; ?>" target="_blank" rel="nofollow"><?php the_title(); ?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
    <?php else : ?>
        <a href="<?php echo $link_url[0]; ?>" target="_self"><?php the_title(); ?></a>
    <?php endif; ?>
    <span class="ml-2 entry-meta"><?php the_time(); ?></span>
    <?php //edit_post_link( '编辑', '<span class="edit-link float-right">', '</span>' ); ?>
  </header>
  <div class="entry-excerpt">
    <?php the_excerpt(); ?>
  </div>
</article>
