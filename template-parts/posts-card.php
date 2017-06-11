
<article class="card">
  <?php if(has_post_thumbnail()) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	    <?php
	      // Post thumbnail.
	      the_post_thumbnail('medium', ['class' => 'img-fluid']);
	    ?>
	  </a>
  <?php else: ?>
    <a class="post-thumbnail" href="<?php the_permalink(); ?>">
	    <img src="<?php echo THEME_URI;?>/assets/img/placeholder.png" class="img-fluid"/>
	  </a>
  <?php endif; ?>

	<?php the_title( sprintf( '<p class="card-text mt-2"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>

  <p class="card-text entry-footer">
    <?php echo the_time(); ?>
  </p>
</article>
