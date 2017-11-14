<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header text-center mb-3">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'understrap' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p class="mb-4 text-center text-muted"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
							'understrap' ); ?></p>

							<div class="d-flex justify-content-center">
								<div class="w-50">
									<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
										<!-- <label class="assistive-text" for="s"><?php //esc_html_e( 'Search', 'understrap' ); ?></label> -->
										<div class="input-group">
											<input class="field form-control form-lg" id="s" name="s" type="text"
												placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>">
											<span class="input-group-btn">
												<input class="submit btn btn-primary btn-lg" id="searchsubmit" name="submit" type="submit"
												value="<?php esc_attr_e( 'Search', 'understrap' ); ?>">
										</span>
										</div>
									</form>
								</div>
							</div>

							<div class="card-group mt-4">

								<?php
								$args = array(
									'before_widget' => '<div class="card widget %s">',
									'after_widget' => '</div>',
									'before_title' => '<h2 class="card-title h5">',
									'after_title' => '</h2>'
								);
								$instance = array(
									'title' => '最新发表',
									'text' => 'Text'
								);
								the_widget( 'WP_Widget_Recent_Posts',$instance,$args ); ?>



									<?php if ( understrap_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

										<div class="widget card widget_categories">

											<h2 class="card-title h5"><?php esc_html_e( 'Most Used Categories', 'understrap' ); ?></h2>

											<ul>
												<?php
												wp_list_categories( array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												) );
												?>
											</ul>

										</div><!-- .widget -->

									<?php endif; ?>



									<?php

									/* translators: %1$s: smiley */
									$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'understrap' ), convert_smilies( ':)' ) ) . '</p>';

									$args = array(
										'before_widget' => '<div class="card widget">',
								    'after_widget' => '</div></div>',
								    'before_title' => '<h2 class="card-title h5" style="border-bottom:1px solid #ddd;">',
								    'after_title' => '</h2><div class="card-body">'.$archive_content
									);

									the_widget( 'WP_Widget_Archives', 'dropdown=1', $args );
									?>

									<?php
									$args = array(
										'before_widget' => '<div class="widget card %s">',
										'after_widget' => '</div>',
										'before_title' => '<h2 class="card-title h5">',
										'after_title' => '</h2>'
									);
									$instance = array(
										'title' => '标签云',
										'text' => 'Text'
									);
									the_widget( 'WP_Widget_Tag_Cloud',$instance,$args ); ?>


							</div>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
