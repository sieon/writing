<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lean
 */
?>





<div class="no-results not-found container mt-4">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( wp_kses( __( '准备好写文章了吗? <a href="%1$s">点击这里开始吧</a>.', 'lean' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>
		<p class="alert alert-warning"><?php esc_html_e( '没有结果，请尝试其他关键词。', 'lean' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lean' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>
