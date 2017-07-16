<?php get_header();?>

  <div class="container mt-4">
    <div class="site-main">
      <div class="row">
        <div class="col-lg-8">
           <main class="main-content">
             <div class="card">
               <?php while ( have_posts() ) : the_post(); ?>
               <header class="single-header">
                 <div class="single-header-body">
                   <?php the_title('<h1 class="single-header-title mt-2 mb-4">', '</h1>'); ?>
                   <p class="entry-meta">
                     <?php lean_entry_meta(); ?>
                   </p>
                 </div>
               </header>

               <div class="card-block">

                 <?php // 显示标签
                 $posttags = get_the_tags();
                 if ( $posttags ) {
                   echo '<div class="post-tags mt-2">';
                   foreach( $posttags as $tag ) {
                     echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-secondary btn-sm mr-3 mb-2">' . $tag->name . '</a>';
                   }
                   echo '</div>';
                 } ?>


                 <?php
                 // 显示页面内容
                 get_template_part( 'template-parts/formats/format', get_post_format() ); ?>
               </div>
             </div>

               <?php //上一篇、下一篇
               if ( get_theme_mod( 'post-nav')==yes ) {
                 lean_the_post_navigation();
               } ?>

               <?php //相关文章
               if ( get_theme_mod( 'related_posts')==yes ) {
                 if ( !has_post_format( 'link' )&&!has_post_format( 'status' ) ) { related_posts(); }
               } ?>

               <?php // 加载评论
               if ( comments_open() || get_comments_number() ) :
                 comments_template();
               endif;
               ?>
               <?php endwhile; // end of the loop. ?>

           </main>
        </div>

        <?php get_sidebar();?>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
<?php get_footer();?>
