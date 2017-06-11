<?php

class Lean_Most_Comments_Posts_List extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'lean_most_comments_posts_list', // Base ID
			__('lean-热评文章', 'lean'), // Name
			array(
				'description' => __( '显示评论数从高到低的文章列表，小工具“标题”是必填项。', 'lean' ),
				'classname' => 'widget_most_comments_posts_list'
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget( $args, $instance ) {
		//display settings
		extract( $args );
		$title   = apply_filters( 'widget_title', $instance['title'] );
		$num     = empty( $instance['num'] )     ? '6'    : $instance['num'];

		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$the_args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $num,
			'ignore_sticky_posts'	=> true,
			'orderby'				      => 'comment_count',
			'order'					      => 'dsc'
		);
		$orderNum= 1;
		$the_query = new WP_Query($the_args);
		?>
			<ul class="list-unstyled">
		<?php
		if($the_query->have_posts()):while($the_query->have_posts()): $the_query->the_post();
		?>
				<li class="entry media">
					<?php if(has_post_thumbnail()) : ?>
						<div class="img-box d-flex mr-2">
							<a class="post-thumbnail" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
						  </a>
						</div>

					<?php else: ?>
						<div class="img-box d-flex mr-2">
							<a class="post-thumbnail" href="<?php the_permalink(); ?>">
						    <img src="<?php echo THEME_URI;?>/assets/img/placeholder.png" />
						  </a>
						</div>
					<?php endif; ?>


					<div class="media-body">
						<?php
						switch($orderNum){
							case '1': ?>
							<h4 class="entry-title mt-0 mb-1"><span class="badge badge-danger"><?php echo($orderNum++); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<?php	break;
							case '2': ?>
							<h4 class="entry-title mt-0 mb-1"><span class="badge badge-warning"><?php echo($orderNum++); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<?php	break;
							case '3': ?>
							<h4 class="entry-title mt-0 mb-1"><span class="badge badge-success"><?php echo($orderNum++); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<?php	break;
							default: ?>
							<h4 class="entry-title mt-0 mb-1"><span class="badge badge-info"><?php echo($orderNum++); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<?php } ?>
						<small class="text-weakest"><?php the_time();//echo wp_trim_words( get_the_excerpt(), 50, '...' ); ?></small>
					</div>
				</li>
		<?php
			endwhile;endif;wp_reset_query();
		?>
			</ul>
		<!-- END .rightnow-content -->
		<?php
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'exclude' => '' ) );
		$title    = esc_attr( $instance['title'] );
		$num      = isset($instance['num'])     ? $instance['num']                 : '6'    ;
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( '标题：', 'lean' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( '文章数量：', 'lean' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo $num; ?>" /></p>

	<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['num']       = strip_tags( $new_instance['num'] );
		return $instance;
	}

}

/*  Register widget
/* ------------------------------------ */
if ( ! function_exists( 'lean_register_widget_posts_list' ) ) {

	function lean_register_widget_posts_list() {
		register_widget( 'Lean_Most_Comments_Posts_List' );
	}

}
add_action( 'widgets_init', 'lean_register_widget_posts_list' );
?>
