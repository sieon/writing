<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header('front-page');

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="bg-dark text-white pt-6-5 pb-5" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);background-size: cover;">
	<div class="<?php echo esc_attr( $container ); ?>">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
