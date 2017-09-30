<?php
/**
 * Template Name: 友情链接
 */
get_header(); ?>

<div class="container mt-4">

  <div class="row">

    <main class="content-area">

      <div class="bg-white border rounded l-shadow">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="px-4 pt-4 mb-4"><?php the_title(); ?></h1>

        <div class="entry-content">
          <?php wp_nav_menu(
            array(
              'theme_location'  => 'links',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'nav',
              'fallback_cb'     => '',
              'menu_id'         => 'f-links',
              'walker'          => new WP_Bootstrap_Navwalker(),
            )
          );
          ?>
        </div>
      </div>

      <?php
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
      ?>

      <?php endwhile; else: ?>

        <div class="jumbotron">
          <h1 class="container">oh,no!</h1>
        </div>

        <p>这个页面还没内容呢!</p>
      <?php endif; ?>

    </main>

    <div class="widget-area hidden-md-down">
      <?php if ( !dynamic_sidebar('sidebar-2') ) { _e('','lean'); } ?>
    </div>

  </div>

</div><!--.container -->

<?php get_footer(); ?>
