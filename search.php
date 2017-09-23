<?php
/**
 * 搜索结果页面
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="container mt-4">
	<div class="site-main">
		<div class="row justify-content-center">
			<main class="content-area">

				<h1 class="page-title mb-3"><?php printf( esc_html__( '“%s”的搜索结果：', 'lean' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

				<div class="posts">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
				</div>

			</main>
		</div><!-- #row-->
	</div>
</div><!-- #container -->
<?php get_footer(); ?>
