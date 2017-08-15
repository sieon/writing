  </main>
  <!-- 复用的底部 -->
  <footer class="footer mt-3">

    <?php if ( is_active_sidebar( 'sidebar-3' ) ) :?>

      <div class="footer-t bg-gray600 border-top-1 pt-5 pb-4">
        <div class="container">
          <div class="widget-deck">
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
          </div>
        </div>
      </div>

    <?php endif; ?>

    <div class="footer-b bg-gray700 text-link-color-muted py-4">
      <div class="container">
        <p class="copyright mb-0">&copy; 2012-2017 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a>. Design by <a href="http://qingzhuti.com/" target="_blank">qingzhuti.com</a>.</p>
      </div>
    </div>

  </footer>

  <?php wp_footer(); ?>
</body>
</html>
