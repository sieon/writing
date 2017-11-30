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

    <?php if ( 'post' == get_post_type() ) : ?>

      <div class="entry-meta card-text small">
        <?php understrap_posted_on(); ?>
      </div><!-- .entry-meta -->

    <?php endif; ?>

  </header><!-- .entry-header -->

</article><!-- #post-## -->
