<?php
/**
 * 如果内容找不到显示提示信息的模板
 */
?>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<div class="container mt-4 p-5">
		<p><?php printf( wp_kses( __( '准备好写文章了吗? <a href="%1$s">点击这里开始吧</a>.', 'lean' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	</div>

<?php elseif ( is_search() ) : ?>

	<div class="container mt-4">
		<div class="site-main">
	    <div class="main-content text-center">
				<div class="card l-shadow-v28">
					<h1 class="card-header"><?php esc_html_e( '没有结果，请尝试其他关键词。', 'lean' ); ?></h1>
					<div class="card-body pt-5 pb-5">
						<?php get_search_form(); ?>
					</div>
				</div>

			</div>
		</div>
	</div>

<?php else : ?>

	<div class="card l-shadow-v28">
		<div class="card-body">
			<p class="card-text"><?php esc_html_e( '似乎我们没能找到你要的东西。或许，你可以尝试搜索一下：', 'lean' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>

<?php endif; ?>
