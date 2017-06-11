<div id="myCarousel" class="carousel slide mb-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php
    $args = array(
      'posts_per_page' => '3',
      'post_type' => 'slides',
      'caller_get_posts' => 1,
      'ignore_sticky_posts' =>1,
      'tax_query' => array(
        array(
          'taxonomy'=> 'slides-category',
          'field' => 'slug',
          'terms'=>'home-main-slides-1'
        )
      )
    );
    $slider = get_posts( $args ); ?>
    <?php $count = 0; ?>
    <?php foreach($slider as $slide): ?>
    <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
      <a href="<?php echo get_post_meta($slide->ID, "lean_slide_url", $single = true); ?>">
      <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" class="img-fluid" />
      <div class="container">
        <div class="carousel-caption d-none d-md-block">
          <h3><?php echo $slide->post_title; ?><h3>
          <p><?php echo $slide->post_content; ?></p>
        </div>
      </div>
      </a>
    </div>
    <?php $count++; ?>
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">上一个</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">下一个</span>
  </a>
</div>
