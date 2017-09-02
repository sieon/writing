  </main>
  <!-- 复用的底部 -->
  <footer class="footer mt-3">

    <div class="footer-b bg-light l-link-v3">
      <div class="container">
        <div class="footer-b-body py-4">
          <small>
            <?php wp_nav_menu(
              array(
                'theme_location'  => 'footer-nav',
                'container_class' => 'mb-2',
                'container_id'    => '',
                'menu_class'      => 'nav ml--3',
                'fallback_cb'     => '',
                'menu_id'         => 'main-nav',
                'walker'          => new WP_Bootstrap_Navwalker(),
              )
            );
            ?>
            <p class="copyright mb-0">&copy; 2012-2017 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a>. Design by <a href="http://qingzhuti.com/" target="_blank">qingzhuti.com</a>.</p>
          </small>
        </div>
      </div>
    </div>

  </footer>

  <?php wp_footer(); ?>
</body>
</html>
