<?php

if(!function_exists('magazinevibe_edge_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function magazinevibe_edge_header_class($classes) {
        $header_type = 'header-type3';

        $classes[] = 'edgtf-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_header_class');
}

if(!function_exists('magazinevibe_edge_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function magazinevibe_edge_header_behaviour_class($classes) {

        $classes[] = 'edgtf-'.magazinevibe_edge_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_header_behaviour_class');
}

if(!function_exists('magazinevibe_edge_menu_item_icon_position_class')) {
    /**
     * Function that adds menu item icon position class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added menu item icon position class
     */
    function magazinevibe_edge_menu_item_icon_position_class($classes) {

        if(magazinevibe_edge_options()->getOptionValue('menu_item_icon_position') == 'top'){
            $classes[] = 'edgtf-menu-with-large-icons';
        }

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_menu_item_icon_position_class');
}

if(!function_exists('magazinevibe_edge_mobile_header_class')) {
    function magazinevibe_edge_mobile_header_class($classes) {
        $classes[] = 'edgtf-default-mobile-header';

        $classes[] = 'edgtf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_mobile_header_class');
}

if(!function_exists('magazinevibe_edge_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     * @param array array of classes from main filter
     * @return array array of classes with added first level menu background color class
     */
    function magazinevibe_edge_header_class_first_level_bg_color($classes) {

        //check if first level hover background color is set
        if(magazinevibe_edge_options()->getOptionValue('menu_hover_background_color') !== ''){
            $classes[]= 'edgtf-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_header_class_first_level_bg_color');
}

if(!function_exists('magazinevibe_edge_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function magazinevibe_edge_menu_dropdown_appearance($classes) {

        if(magazinevibe_edge_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'edgtf-'.magazinevibe_edge_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_menu_dropdown_appearance');
}

if(!function_exists('magazinevibe_edge_header_global_js_var')) {
    function magazinevibe_edge_header_global_js_var($global_variables) {

        $global_variables['edgtfTopBarHeight'] = magazinevibe_edge_get_top_bar_height();
        $global_variables['edgtfStickyHeaderHeight'] = magazinevibe_edge_get_sticky_header_height();
        $global_variables['edgtfStickyHeaderTransparencyHeight'] = magazinevibe_edge_get_sticky_header_height_of_complete_transparency();

        return $global_variables;
    }

    add_filter('magazinevibe_edge_js_global_variables', 'magazinevibe_edge_header_global_js_var');
}

if(!function_exists('magazinevibe_edge_header_per_page_js_var')) {
    function magazinevibe_edge_header_per_page_js_var($perPageVars) {

        $perPageVars['edgtfStickyScrollAmount'] = magazinevibe_edge_get_sticky_scroll_amount();

        return $perPageVars;
    }

    add_filter('magazinevibe_edge_per_page_js_vars', 'magazinevibe_edge_header_per_page_js_var');
}

if(!function_exists('magazinevibe_edge_aps_custom_style_class')) {
    function magazinevibe_edge_aps_custom_style_class($classes) {

        if(magazinevibe_edge_options()->getOptionValue('aps_custom_style') !== ''){
            $classes[] = 'edgtf-'.magazinevibe_edge_options()->getOptionValue('aps_custom_style');
        }

        return $classes;
    }

    add_filter('body_class', 'magazinevibe_edge_aps_custom_style_class');
}