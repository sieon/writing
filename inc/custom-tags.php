<?php
/**
 * Filter the excerpt length to 30 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function lean_excerpt_length( $length ) {
    return 90;
}
add_filter( 'excerpt_length', 'lean_excerpt_length');
