<?php
/**
 * Template Name: 全宽页面模板
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="jumbotron rounded-0 bg-dark border-0 text-white mb-20">
    <div class="container">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>

<div class="container">
  <main class="w-100">
      <div class="w-100 bg-white border rounded mb-4 p-4 l-shadow">
        <div class="entry-content clearfix">
          <?php the_content(); ?>
        </div>
      </div>
  		<?php
  		// If comments are open or we have at least one comment, load up the comment template
  		if ( comments_open() || get_comments_number() ) :
  			comments_template();
  		endif;
  		?>
	 <?php endwhile; ?>
  </main>
</div><!-- .container -->

<?php get_footer(); ?>
