<?php
/**
 * Creates the main header
 *
 * @return void
 * @author
 **/
if (!function_exists('lean_create_nav_header')) {
    function lean_create_nav_header()
    {
        global $post, $wp_query;
        $is_portfolio = false;
        $is_service = false;
        $is_staff = false;
        $is_blog = false;
        if (!is_null($post)) {
            $is_portfolio = $post->post_type === 'lean_portfolio_image';
            $is_service = $post->post_type === 'lean_service';
            $is_staff = $post->post_type === 'lean_staff';
            $is_blog = lean_query_is_blog();
        }

        // check for page overrides
        if (is_page() || $is_blog || $is_portfolio || $is_staff || $is_service || $wp_query->is_404) {
            // if we are on the blog page make sure you use the blog page id for transparancy option
            $page_id = $is_blog ? get_option('page_for_posts') : $post->ID;

            // are we showing the top nav?
            if (get_post_meta($page_id, THEME_SHORT . '_site_top_nav', true) === 'hide') {
                return;
            }
        }

        global $lean_theme;

        if ($lean_theme->get_option('header_top_bar') === 'on') {
            include(locate_template('partials/header/top-bar.php'));
        }


        // get the primary menu
        $menu_slug = null;
        $locations = get_nav_menu_locations();
        if (isset($locations['primary'])) {
            $primary_menu = wp_get_nav_menu_object($locations['primary']);
            if (false !== $primary_menu) {
                echo lean_shortcode_menu( array(
                    'menu_slug'              => $primary_menu->slug,
                    'header_style'           => $lean_theme->get_option('header_style'),
                    'header_sticky'          => $lean_theme->get_option('header_sticky'),
                    'header_sticky_mobile'   => $lean_theme->get_option('header_sticky_mobile'),
                    'header_capitalization'  => $lean_theme->get_option('header_capitalization'),
                    'container_class'        => $lean_theme->get_option('header_container')
                ));
            }
        }
    }
}
