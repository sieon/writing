<div class="sidebar col-lg-4 hidden-md-down">
  <aside class="widget-search mb-3">
    <form class="form-inline my-2 my-lg-0 float-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
      <input class="form-control mr-sm-2" type="text" placeholder="输入关键字" name="s">
      <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">搜索</button>
    </form>
  </aside>
  <?php if ( !dynamic_sidebar('sidebar-1') ) { _e('','lean'); } ?>
</div>
