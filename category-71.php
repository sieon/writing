<?php get_header(); ?>



<div class="container mt-4">
  <div class="main-content">

    <div class="card">
      <div class="card-body">
        <!-- Timeline #01 -->
        <section class="g-pb-100">
          <div class="container">
            <?php
            lean_the_archive_title( '<h1 class="h4 text-center mb-5">', '</h1>' );
            lean_the_archive_description( '<div>', '</div>' );
            ?>

            <div class="row u-timeline-v1-wrap g-mx-minus-15">
              <!-- Timeline Box -->
              <div class="col-md-6 g-orientation-right g-pl-60 g-pl-15--md g-pr-40--md g-mb-60 g-mb-0--md">
                <div class="u-timeline-v1__icon g-color-gray-light-v5 g-ml-13 g-ml-minus-10--md">
                  <i class="fa fa-circle"></i>
                </div>

                <div class="g-pos-rel">
                  <!-- Timeline Arrow -->
                  <div class="hidden-sm-down u-triangle-inclusive-v1--left g-top-30 g-z-index-2">
                    <div class="u-triangle-inclusive-v1--left__front g-brd-white-left g-brd-white-right"></div>
                    <div class="u-triangle-inclusive-v1--left__back g-brd-gray-light-v4-left g-brd-gray-light-v4-right"></div>
                  </div>

                  <div class="hidden-md-up u-triangle-inclusive-v1--right g-top-30 g-z-index-2">
                    <div class="u-triangle-inclusive-v1--right__front g-brd-white-right"></div>
                    <div class="u-triangle-inclusive-v1--right__back g-brd-gray-light-v4-right"></div>
                  </div>
                  <!-- End Timeline Arrow -->

                  <!-- Timeline Content -->
                  <article class="u-timeline-v1 g-pa-5">

                    <div class="g-py-25 g-px-20">
                      <h3 class="h5 g-font-weight-300 g-mb-15">
                        <a class="u-link-v5 g-color-main g-color-primary--hover text-primary" href="#">Most Popular Business Topics</a>
                      </h3>

                      <div class="g-mb-30">
                        <p>Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at. Sed viverra cursus nibh.</p>
                      </div>

                      <hr class="g-brd-gray-light-v4">

                      <div class="media g-font-size-12 small text-link-color-muted">
                        <?php
                        /**
                         * Filter the author bio avatar size.
                         *
                         * @since Twenty Fifteen 1.0
                         *
                         * @param int $size The avatar height and width size in pixels.
                         */
                        $author_bio_avatar_size = apply_filters( 'lean_author_bio_avatar_size', 30 );

                        echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'',false, array('class'=>'d-flex mr-3 rounded-circle') );
                        ?>
                        <div class="media-body align-self-center text-uppercase">
                          <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">John Coolman</a>
                        </div>

                        <div class="align-self-center">
                          <a class="u-link-v5 g-color-main g-color-primary--hover g-mr-10" href="#">
                            <i class="fa fa-comments g-mr-2"></i> 16
                          </a>
                          <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">
                            <i class="fa fa-eye g-mr-2"></i> 129
                          </a>
                        </div>
                      </div>
                    </div>
                  </article>
                  <!-- End Timeline Content -->
                </div>
              </div>
              <!-- End Timeline Box -->

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
                  <article class="u-timeline-v1 g-pa-5">

                    <div class="g-py-25 g-px-20">
                      <h3 class="h5 g-font-weight-300 g-mb-15">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Trends of Digital Marketing in 2017</a>
                      </h3>

                      <div class="g-mb-30">
                        <p>Spen been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                      </div>

                      <hr class="g-brd-gray-light-v4">

                      <div class="media g-font-size-12 small text-link-color-muted">
                        <?php
                        /**
                         * Filter the author bio avatar size.
                         *
                         * @since Twenty Fifteen 1.0
                         *
                         * @param int $size The avatar height and width size in pixels.
                         */
                        $author_bio_avatar_size = apply_filters( 'lean_author_bio_avatar_size', 30 );

                        echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'',false, array('class'=>'d-flex mr-3 rounded-circle') );
                        ?>
                        <div class="media-body align-self-center text-uppercase">
                          <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Kate William</a>
                        </div>

                        <div class="align-self-center">
                          <a class="u-link-v5 g-color-main g-color-primary--hover g-mr-10" href="#">
                            <i class="fa fa-comments g-mr-2"></i> 21
                          </a>
                          <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">
                            <i class="fa fa-eye g-mr-2"></i> 178
                          </a>
                        </div>
                      </div>
                    </div>
                  </article>
                  <!-- End Timeline Content -->
                </div>
              </div>
              <!-- End Timeline Box -->


            </div>
          </div>
        </section>
        <!-- End Timeline #01 -->
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
