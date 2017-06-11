<?php

function lean_get_avatar( $id_or_email, $size = 96, $default = '', $alt = '', $args = null ) {
    $defaults = array(
        // get_avatar_data() args.
        'size'          => 96,
        'height'        => null,
        'width'         => null,
        'default'       => get_option( 'avatar_default', 'mystery' ),
        'force_default' => false,
        'rating'        => get_option( 'avatar_rating' ),
        'scheme'        => null,
        'alt'           => '',
        'class'         => null,
        'force_display' => false,
        'extra_attr'    => '',
    );

    if ( empty( $args ) ) {
        $args = array();
    }

    $args['size']    = (int) $size;
    $args['default'] = $default;
    $args['alt']     = $alt;

    $args = wp_parse_args( $args, $defaults );

    if ( empty( $args['height'] ) ) {
        $args['height'] = $args['size'];
    }
    if ( empty( $args['width'] ) ) {
        $args['width'] = $args['size'];
    }

    if ( is_object( $id_or_email ) && isset( $id_or_email->comment_ID ) ) {
        $id_or_email = get_comment( $id_or_email );
    }

    /**
     * Filters whether to retrieve the avatar URL early.
     *
     * Passing a non-null value will effectively short-circuit get_avatar(), passing
     * the value through the {@see 'get_avatar'} filter and returning early.
     *
     * @since 4.2.0
     *
     * @param string $avatar      HTML for the user's avatar. Default null.
     * @param mixed  $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
     *                            user email, WP_User object, WP_Post object, or WP_Comment object.
     * @param array  $args        Arguments passed to get_avatar_url(), after processing.
     */
    $avatar = apply_filters( 'pre_get_avatar', null, $id_or_email, $args );

    if ( ! is_null( $avatar ) ) {
        /** This filter is documented in wp-includes/pluggable.php */
        return apply_filters( 'get_avatar', $avatar, $id_or_email, $args['size'], $args['default'], $args['alt'], $args );
    }

    if ( ! $args['force_display'] && ! get_option( 'show_avatars' ) ) {
        return false;
    }

    $url2x = get_avatar_url( $id_or_email, array_merge( $args, array( 'size' => $args['size'] * 2 ) ) );

    $args = get_avatar_data( $id_or_email, $args );

    $url = $args['url'];

    if ( ! $url || is_wp_error( $url ) ) {
        return false;
    }

    $class = array( 'avatar', 'avatar-' . (int) $args['size'], 'photo', 'd-flex', 'mr-3' );

    if ( ! $args['found_avatar'] || $args['force_default'] ) {
        $class[] = 'avatar-default';
    }

    if ( $args['class'] ) {
        if ( is_array( $args['class'] ) ) {
            $class = array_merge( $class, $args['class'] );
        } else {
            $class[] = $args['class'];
        }
    }

    $avatar = sprintf(
        "<img alt='%s' src='%s' srcset='%s' class='%s' height='%d' width='%d' %s/>",
        esc_attr( $args['alt'] ),
        esc_url( $url ),
        esc_attr( "$url2x 2x" ),
        esc_attr( join( ' ', $class ) ),
        (int) $args['height'],
        (int) $args['width'],
        $args['extra_attr']
    );

    /**
     * Filters the avatar to retrieve.
     *
     * @since 2.5.0
     * @since 4.2.0 The `$args` parameter was added.
     *
     * @param string $avatar      &lt;img&gt; tag for the user's avatar.
     * @param mixed  $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
     *                            user email, WP_User object, WP_Post object, or WP_Comment object.
     * @param int    $size        Square avatar width and height in pixels to retrieve.
     * @param string $alt         Alternative text to use in the avatar image tag.
     *                                       Default empty.
     * @param array  $args        Arguments passed to get_avatar_data(), after processing.
     */
    return apply_filters( 'get_avatar', $avatar, $id_or_email, $args['size'], $args['default'], $args['alt'], $args );
}
