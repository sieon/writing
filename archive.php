<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <div class="content-area">

            <header class="jumbotron bg-white border mb-3 p-4 l-shadow">
				<?php
				lean_the_archive_title( '<h1>', '</h1>' );
				lean_the_archive_description( '<div class="text-muted">', '</div>' );
				?>
            </header>
            <?php if ( have_posts() ) :
	            /* Start the Loop */
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/post/content', get_post_format() );
                endwhile; ?>

                <div class="pagination">
                    <?php lean_pagination();?>
                </div>

			<?php else :
                get_template_part( 'template-parts/post/content', 'none' );
			endif; wp_reset_postdata(); ?>

        </div>

		<?php get_sidebar();?>

    </div>
</div>

<?php get_footer(); ?>
