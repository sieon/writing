<?php
/**
 * Comment layout.
 *
 * @package understrap
 */

// Comments form.
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );

/**
 * Creates the comments form.
 *
 * @param string $fields Form fields.
 *
 * @return array
 */
function bootstrap3_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html5     = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$fields    = array(
		'author' => '<div class="form-group comment-form-author"><label for="author">' . __( 'Name',
				'understrap' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '></div>',
		'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email',
				'understrap' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '></div>',
		'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website',
				'understrap' ) . '</label> ' .
		            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"></div>',
	);

	return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );

/**
 * Builds the form.
 *
 * @param string $args Arguments for form's fields.
 *
 * @return mixed
 */
function bootstrap3_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
    <label for="comment">' . _x( 'Comment', 'noun', 'understrap' ) . ( ' <span class="required">*</span>' ) . '</label>
    <textarea class="form-control" id="comment" name="comment" aria-required="true" cols="45" rows="8"></textarea>
    </div>';
	$args['class_submit']  = 'btn btn-secondary'; // since WP 4.1.
	return $args;
}

function lean_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li class="media" id="comment-<?php comment_ID(); ?>">
    <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
    <div class="media-body">
      <div class="d-flex align-items-start mb-2">
        <div class="d-block">
          <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
          <div class="comment-meta commentmetadata small text-muted mt-1"><?php echo get_comment_time('Y-m-d H:i'); ?></div>
        </div>
        <div class="ml-auto">
          <?php edit_comment_link( __( 'Edit Comment', 'understrap' ), '', '' ); ?>
          <?php //comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth'])))
					comment_reply_link( array_merge($args, array(
    'reply_text' => __('<i class="fa fa-edit ml-3"></i> 回复', 'understrap'),
    'depth'      => $depth,
    'max_depth'  => $args['max_depth']
    )
)); ?>
        </div>
      </div>
      <div class="comment_text">
        <?php if ($comment->comment_approved == '0') : ?>
          <em>你的评论正在审核，稍后会显示出来！</em><br />
        <?php endif; ?>
        <?php comment_text(); ?>
      </div>
    </div>
  </li>
<?php }

// 评论添加@，by Ludou
function lean_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '<a class="text-muted" href="#comment-' . $comment->comment_parent . '">@'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}
add_filter( 'comment_text' , 'lean_comment_add_at', 20, 2);
