<div id="homeMainCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner rounded" role="listbox">
    <?php $slider = get_posts(array('post_type' => 'slide', 'orderby' => 'menu_order', 'order' => 'DESC', 'posts_per_page' => 2)); ?>
    <?php $count = 0; ?>
    <?php foreach($slider as $slide): ?>
    <div class="carousel-item rounded <?php echo ($count == 0) ? 'active' : ''; ?>" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>);height:370px;background-size:cover;">
      <!-- <a href="<?php //echo get_post_meta($slide->ID, "lean_slide_url", $single = true); ?>"> -->
        <div class="carousel-caption d-none d-md-block g-right-0 g-left-0 g-bottom-0">
          <h3><?php echo $slide->post_title; ?></h3>
        </div>
      <!-- </a> -->
    </div>
    <?php $count++; ?>
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#homeMainCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#homeMainCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
