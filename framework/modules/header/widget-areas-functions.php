<?php

if(!function_exists('magazinevibe_edge_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function magazinevibe_edge_register_top_header_areas() {
        $top_bar_enabled = magazinevibe_edge_options()->getOptionValue('top_bar');

        if($top_bar_enabled == 'yes') {
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'magazinevibe'),
                'id'            => 'edgtf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'magazinevibe'),
                'id'            => 'edgtf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
        }
    }

    add_action('widgets_init', 'magazinevibe_edge_register_top_header_areas');
}

if(!function_exists('magazinevibe_edge_header_type3_widget_areas')) {
    /**
     * Registers widget areas for header type 3
     */
    function magazinevibe_edge_header_type3_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Right From Main Menu', 'magazinevibe'),
            'id'            => 'edgtf-right-from-main-menu',
            'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-main-menu-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'magazinevibe')
        ));
    }

    add_action('widgets_init', 'magazinevibe_edge_header_type3_widget_areas');
}

if(!function_exists('magazinevibe_edge_header_type3_widget_areas_for_header_type_two')) {
    /**
     * Registers widget areas for header type 3
     */
    function magazinevibe_edge_header_type3_widget_areas_for_header_type_two() {
        register_sidebar(array(
            'name'          => esc_html__('Right From Logo Area', 'magazinevibe'),
            'id'            => 'edgtf-right-from-logo-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-logo-area-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the logo image only for Header Type 2 layout', 'magazinevibe')
        ));
    }

    add_action('widgets_init', 'magazinevibe_edge_header_type3_widget_areas_for_header_type_two');
}

if(!function_exists('magazinevibe_edge_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function magazinevibe_edge_register_mobile_header_areas() {
        if(magazinevibe_edge_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'magazinevibe'),
                'id'            => 'edgtf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'magazinevibe')
            ));
        }
    }

    add_action('widgets_init', 'magazinevibe_edge_register_mobile_header_areas');
}

if(!function_exists('magazinevibe_edge_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function magazinevibe_edge_register_sticky_header_areas() {
        if(in_array(magazinevibe_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'magazinevibe'),
                'id'            => 'edgtf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'magazinevibe')
            ));
        }
    }

    add_action('widgets_init', 'magazinevibe_edge_register_sticky_header_areas');
}