<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>


<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<header class="page-header author-header card l-shadow-v0">

					<div class="card-body">

						<?php
						$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
							$author_name ) : get_userdata( intval( $author ) );
						?>

						<div class="media">

							<?php if ( ! empty( $curauth->ID ) ) : ?>
								<?php echo get_avatar( $curauth->ID ); ?>
							<?php endif; ?>

							<div class="media-body">

								<h1 class="h2"><?php echo esc_html( $curauth->nickname ); ?></h1>

								<ul class="list-unstyled mt-3 mb-0">
									<?php if ( ! empty( $curauth->user_url ) ) : ?>
										<li>
											<?php esc_html_e( 'Website', 'understrap' ); ?>
											<a class="ml-3" href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
										</li>
									<?php endif; ?>

									<?php if ( ! empty( $curauth->user_description ) ) : ?>
										<li class="mt-3">
											<?php esc_html_e( 'Profile', 'understrap' ); ?>
											<span class="ml-3"><?php echo esc_html( $curauth->user_description ); ?></span>
										</li>
									<?php endif; ?>
								</ul>

							</div>

						</div>

					</div>

				</header><!-- .page-header -->


				<div class="posts mt-4">

					<div class="card mb-4">
						<h3 class="card-body mb-0">他发表的文章</h2>
					</div>

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/content-card', get_post_format() );
							?>
						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<!-- End Loop -->

				</div>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
