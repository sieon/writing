<?php
/**
 * 搜索结果页面
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>



<div id="primary" class="container mt-5">
	<div class="row">

		<div class="main-content col-lg-8 offset-md-2">
			<h1 class="mb-3"><?php printf( esc_html__( '“%s”的搜索结果：', 'lean' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/posts', 'list' ); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>

	</div><!-- #row-->
</div><!-- #container -->
<?php get_footer(); ?>
