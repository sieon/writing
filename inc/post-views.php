<?php
/**
 * 文章阅读量统计
 *
 * @version 1.0
 * @package Lean
 *
 */
function lean_set_post_views($postID) {
	if (!current_user_can('level_10')) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	      $count++;
	      update_post_meta($postID, $count_key, $count);
	    }
	}
}
function lean_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
 ?>
