  </main>
  <!-- 复用的底部 -->
  <footer class="footer mt-3">
    <div class="container">
      <p class="copyright">&copy; 2012-2017 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a></p>
    </div>
  </footer>

  <?php wp_footer(); ?>
  <script type="text/javascript">
    $(".sidebar").pin({
      containerSelector: ".container",
      minWidth: 980
    })
  </script>
</body>
</html>
