<?php
/*
	文章小工具
*/

class LeanPostsList extends WP_Widget {

/*  Constructor
/* ------------------------------------ */
	function __construct() {
		parent::__construct(
      'leanpostslist',
      __('Lean-文章', 'lean'),
      array(
        'description' => __('显示最近某个发表的某个分类的文章。', 'lean'),
        'classname' => 'card widget widget-lean-posts'
      )
    );
	}

  public function lean_get_defaults() {
    return array(
      'title'       => '',
      // Posts
      //'posts_category'  => 1,
      //'posts_excerpt'  => 0,
      'posts_date'    => 1,
      'posts_num'     => '4',
      'posts_cat_id'    => '0',
      'posts_orderby'   => 'date',
      'posts_time'    => '0',
			'posts_style'     => '2',
    );
  }


  /*  Widget
  /* ------------------------------------ */
	public function widget($args, $instance) {
		extract( $args );

    $defaults = $this -> lean_get_defaults();

    $instance = wp_parse_args( (array) $instance, $defaults );

		$title = apply_filters('widget_title',$instance['title']);
    $title = empty( $title ) ? '' : $title;
		$output = $before_widget."\n";
		if( $title || ! empty( $before_title) )
			$output .= $before_title.$title.$after_title;
		ob_start();

?>

	<?php
		$posts = new WP_Query( array(
			'post_type'				=> array( 'post' ),
			'showposts'				=> $instance['posts_num'],
			'cat'					=> $instance['posts_cat_id'],
			'ignore_sticky_posts'	=> true,
			'orderby'				=> $instance['posts_orderby'],
			'order'					=> 'dsc',
			'date_query' => array(
				array(
					'after' => $instance['posts_time'],
				),
			)
		) );
	?>

	<?php if( $instance['posts_style'] == 1 ){ ?>

		<div class="card-body">
			<div class="card-columns">
				<?php while ($posts->have_posts()): $posts->the_post();
					get_template_part( 'loop-templates/widgets-posts/posts', 'style1' );
				endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

	<?php } elseif( $instance['posts_style'] == 2 ) { ?>

		<div class="card-body">
			<?php while ($posts->have_posts()): $posts->the_post();
				get_template_part( 'loop-templates/widgets-posts/posts', 'style2' );
			endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>

	<?php } elseif( $instance['posts_style'] == 3 ) { ?>
			<div class="card-body">
				<div class="row">
			<?php while ($posts->have_posts()): $posts->the_post();
				get_template_part( 'loop-templates/widgets-posts/posts', 'style3' );
			endwhile; ?>
			<?php wp_reset_postdata(); ?>
			</div>
		</div>

	<?php } elseif( $instance['posts_style'] == 4 ) { ?>
		<ul class="list-unstyled">
			<?php while ($posts->have_posts()): $posts->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					<?php if($instance['posts_date']) { ?><small class="text-muted"><?php the_time('j M, Y'); ?></small><?php } ?>
				</li><!--./li-->
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul><!--./ul-->
	<?php } ?>

<?php
		$output .= ob_get_clean();
		$output .= $after_widget."\n";
		echo $output;
	}

/*  Widget update
/* ------------------------------------ */
	public function update($new,$old) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
	// Posts
		//$instance['posts_category'] = $new['posts_category']?1:0;
    //$instance['posts_excerpt'] = $new['posts_excerpt']?1:0;
		$instance['posts_date'] = $new['posts_date']?1:0;
		$instance['posts_num'] = strip_tags($new['posts_num']);
		$instance['posts_cat_id'] = strip_tags($new['posts_cat_id']);
		$instance['posts_orderby'] = strip_tags($new['posts_orderby']);
		$instance['posts_time'] = strip_tags($new['posts_time']);
		$instance['posts_style'] = strip_tags($new['posts_style']);
		return $instance;
	}

/*  Widget form
/* ------------------------------------ */
	public function form($instance) {
		// Default widget settings
		$defaults = $this -> lean_get_defaults();
		$instance = wp_parse_args( (array) $instance, $defaults );
?>

	<style>
	.widget .widget-inside .alx-options-posts .postform { width: 100%; }
	.widget .widget-inside .alx-options-posts p { margin: 3px 0; }
	.widget .widget-inside .alx-options-posts hr { margin: 20px 0 10px; }
	.widget .widget-inside .alx-options-posts h4 { margin-bottom: 10px; }
	</style>

	<div class="alx-options-posts">
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">标题：</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance["title"] ); ?>" />
		</p>

		<h4>文章列表</h4>

		<p>
			<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_style") ); ?>">列表类型</label>
			<input style="width:20%;" id="<?php echo esc_attr( $this->get_field_id("posts_style") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_style") ); ?>" type="text" value="<?php echo absint($instance["posts_style"]); ?>" size='3' />
		</p>

		<p>
			<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>">显示几篇</label>
			<input style="width:20%;" id="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_num") ); ?>" type="text" value="<?php echo absint($instance["posts_num"]); ?>" size='3' />
		</p>

		<p>
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_cat_id") ); ?>">分类：</label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("posts_cat_id"), 'selected' => $instance["posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true ) ); ?>
		</p>
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_orderby") ); ?>">顺序：</label>
			<select style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id("posts_orderby") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_orderby") ); ?>">
			  <option value="date"<?php selected( $instance["posts_orderby"], "date" ); ?>>最近时间</option>
			  <option value="comment_count"<?php selected( $instance["posts_orderby"], "comment_count" ); ?>>最多评论</option>
			  <option value="rand"<?php selected( $instance["posts_orderby"], "rand" ); ?>>随机</option>
			</select>
		</p>
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_time") ); ?>">时间：</label>
			<select style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id("posts_time") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_time") ); ?>">
			  <option value="0"<?php selected( $instance["posts_time"], "0" ); ?>>所有</option>
			  <option value="1 year ago"<?php selected( $instance["posts_time"], "1 year ago" ); ?>>今年</option>
			  <option value="1 month ago"<?php selected( $instance["posts_time"], "1 month ago" ); ?>>本月</option>
			  <option value="1 week ago"<?php selected( $instance["posts_time"], "1 week ago" ); ?>>本周</option>
			  <option value="1 day ago"<?php selected( $instance["posts_time"], "1 day ago" ); ?>>过去24小时</option>
			</select>
		</p>

	</div>
<?php

}

}

/*  Register widget
/* ------------------------------------ */
if ( ! function_exists( 'lean_register_widget_posts' ) ) {

	function lean_register_widget_posts() {
		register_widget( 'LeanPostsList' );
	}

}
add_action( 'widgets_init', 'lean_register_widget_posts' );
