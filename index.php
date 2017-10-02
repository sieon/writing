<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">

        <div class="content-area">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/post/content', get_post_format() );
                endwhile; ?>

                <div class="pagination">
                    <?php lean_pagination();?>
                </div>

            <?php else :
                get_template_part( 'template-parts/post/content', 'none' );
            endif;wp_reset_postdata(); ?>

        </div><!-- .content-area -->

		<?php get_sidebar();?>

    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
