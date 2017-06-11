<?php

/**
 * 为日历增加样式
 */
add_filter('get_calendar','calendar_class_add');
function calendar_class_add($content){
	return preg_replace("/<table(.*)>/i","<table class='table' $1>",$content);
}

function lean_wp_tag_cloud( $args = '' ) {
    $defaults = array(
        'smallest' => 1, 'largest' => 1, 'unit' => 'rem', 'number' => 45,
        'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
        'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'post_type' => '', 'echo' => true
    );
    $args = wp_parse_args( $args, $defaults );

    $tags = get_terms( $args['taxonomy'], array_merge( $args, array( 'orderby' => 'count', 'order' => 'DESC' ) ) ); // Always query top tags

    if ( empty( $tags ) || is_wp_error( $tags ) )
        return;

    foreach ( $tags as $key => $tag ) {
        if ( 'edit' == $args['link'] )
            $link = get_edit_term_link( $tag->term_id, $tag->taxonomy, $args['post_type'] );
        else
            $link = get_term_link( intval($tag->term_id), $tag->taxonomy );
        if ( is_wp_error( $link ) )
            return;

        $tags[ $key ]->link = $link;
        $tags[ $key ]->id = $tag->term_id;
    }

    $return = wp_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args

    /**
     * Filters the tag cloud output.
     *
     * @since 2.3.0
     *
     * @param string $return HTML output of the tag cloud.
     * @param array  $args   An array of tag cloud arguments.
     */
    $return = apply_filters( 'wp_tag_cloud', $return, $args );

    if ( 'array' == $args['format'] || empty($args['echo']) )
        return $return;

    echo $return;
}
