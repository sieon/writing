<!-- Timeline Box -->
<div class="col-md-6 g-orientation-left g-pl-60 g-pl-40--md g-mt-60--md g-mb-60 g-mb-0--md">
  <div class="u-timeline-v1__icon g-color-gray-light-v5 g-mr-13 g-mr-minus-8--md">
    <i class="fa fa-circle"></i>
  </div>

  <div class="g-pos-rel">
    <!-- Timeline Arrow -->
    <div class="u-triangle-inclusive-v1--right g-top-30 g-z-index-2">
      <div class="u-triangle-inclusive-v1--right__front g-brd-white-right"></div>
      <div class="u-triangle-inclusive-v1--right__back g-brd-gray-light-v4-right"></div>
    </div>
    <!-- End Timeline Arrow -->

    <!-- Timeline Content -->
    <article class="u-timeline-v1 g-pa-3">

      <div class="g-py-25 g-px-20">

        <?php the_title( sprintf( '<h2 class="h5 g-font-weight-300 g-mb-15"><a class="u-link-v5 g-color-main g-color-primary--hover text-primary" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <div class="g-mb-30">
          <?php the_content(); ?>
        </div>

      </div>
    </article>
    <!-- End Timeline Content -->
  </div>
</div>
<!-- End Timeline Box -->
