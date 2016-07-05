<?php

use MagazineVibe\Modules\Header\Lib\HeaderFactory;

if(!function_exists('magazinevibe_edge_get_header')) {
    /**
     * Loads header HTML based on header type option. Sets all necessary parameters for header
     * and defines magazinevibe_edge_header_type_parameters filter
     */
    function magazinevibe_edge_get_header() {

        //will be read from options
        $header_type     = 'header-type3';
        $header_behavior = magazinevibe_edge_options()->getOptionValue('header_behaviour');
        $header_type_class = '';

        if(magazinevibe_edge_get_meta_field_intersect('header_type') == 'header-type-two') {
            $header_type_class = 'edgtf-header-type-two';
        }

        $enable_border_bottom = magazinevibe_edge_get_meta_field_intersect('enable_header_border_bottom');
        $border_bottom_color = magazinevibe_edge_get_meta_field_intersect('header_border_bottom_color');

        $header_area_styles = '';

        if($border_bottom_color !== '' && $enable_border_bottom !== 'no') {
            $header_area_styles = 'border-color:'.$border_bottom_color.';';
        }

        if($enable_border_bottom === 'no') {
            $header_area_styles = 'border-bottom: 0;';   
        }

        extract(magazinevibe_edge_get_page_options());

        if(HeaderFactory::getInstance()->validHeaderObject()) {
            $parameters = array(
                'header_type_two_is_set' => magazinevibe_edge_get_meta_field_intersect('header_type') == 'header-type-two' ? true : false,
                'header_type_class'  => $header_type_class,
                'hide_logo'          => magazinevibe_edge_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
                'show_sticky'        => in_array($header_behavior, array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up'
                )) ? true : false,
                'show_fixed_wrapper' => in_array($header_behavior, array('fixed-on-scroll')) ? true : false,
                'menu_area_background_color_header_type3' => $menu_area_background_color_header_type3,
                'logo_area_background_color_header_type3' => $logo_area_background_color_header_type3,
                'header_area_styles' => $header_area_styles
            );

            $parameters = apply_filters('magazinevibe_edge_header_type_parameters', $parameters, $header_type);

            HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
        }
    }
}

if(!function_exists('magazinevibe_edge_get_header_top')) {
    /**
     * Loads header top HTML and sets parameters for it
     */
    function magazinevibe_edge_get_header_top() {

        $params = array(
            'column_widths'      => '50-50',
            'show_header_top'    => magazinevibe_edge_options()->getOptionValue('top_bar') == 'yes' ? true : false,
            'top_bar_in_grid'    => magazinevibe_edge_options()->getOptionValue('top_bar_in_grid') == 'yes' ? true : false
        );

        $params = apply_filters('magazinevibe_edge_header_top_params', $params);

        magazinevibe_edge_get_module_template_part('templates/parts/header-top', 'header', '', $params);
    }
}

if(!function_exists('magazinevibe_edge_get_logo')) {
    /**
     * Loads logo HTML
     *
     * @param $slug
     */
    function magazinevibe_edge_get_logo($slug = '') {

        $slug = $slug !== '' ? $slug : 'header-type3';

        if($slug == 'sticky'){
            $logo_image = magazinevibe_edge_options()->getOptionValue('logo_image_sticky');
        }else{
            $logo_image = magazinevibe_edge_get_meta_field_intersect('logo_image');
        }

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = magazinevibe_edge_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens
        }

        $params = array(
            'logo_image'  => $logo_image,
            'logo_styles' => $logo_styles
        );

        magazinevibe_edge_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
    }
}

if(!function_exists('magazinevibe_edge_get_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function magazinevibe_edge_get_main_menu($additional_class = 'edgtf-default-nav') {
        magazinevibe_edge_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if(!function_exists('magazinevibe_edge_get_sticky_menu')) {
    /**
     * Loads sticky menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function magazinevibe_edge_get_sticky_menu($additional_class = 'edgtf-default-nav') {
        magazinevibe_edge_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if(!function_exists('magazinevibe_edge_get_sticky_header')) {
    /**
     * Loads sticky header behavior HTML
     */
    function magazinevibe_edge_get_sticky_header() {

        $parameters = array(
            'hide_logo'             => magazinevibe_edge_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
            'sticky_header_in_grid' => magazinevibe_edge_options()->getOptionValue('sticky_header_in_grid') == 'yes' ? true : false
        );

        magazinevibe_edge_get_module_template_part('templates/behaviors/sticky-header', 'header', '', $parameters);
    }
}

if(!function_exists('magazinevibe_edge_get_mobile_header')) {
    /**
     * Loads mobile header HTML only if responsiveness is enabled
     */
    function magazinevibe_edge_get_mobile_header() {
        if(magazinevibe_edge_is_responsive_on()) {
            $header_type = 'header-type3';

            $mobile_menu_title = magazinevibe_edge_options()->getOptionValue('mobile_menu_title');

            //this could be read from theme options
            $mobile_header_type = 'mobile-header';

            $parameters = array(
                'show_logo'              => magazinevibe_edge_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
                'enable_mobile_menu_icon' => magazinevibe_edge_options()->getOptionValue('enable_mobile_menu_icon') == 'yes' ? true : false,
                'menu_opener_icon'       => magazinevibe_edge_icon_collections()->getMobileMenuIcon(magazinevibe_edge_options()->getOptionValue('mobile_icon_pack'), true),
                'show_navigation_opener' => has_nav_menu('main-navigation'),
                'mobile_menu_title' => $mobile_menu_title,
                'mobile_menu_title_class' => magazinevibe_edge_options()->getOptionValue('enable_mobile_menu_icon') == 'yes' ? '' : 'edgtf-default-mobile-icon'
            );

            magazinevibe_edge_get_module_template_part('templates/types/'.$mobile_header_type, 'header', $header_type, $parameters);
        }
    }
}

if(!function_exists('magazinevibe_edge_get_mobile_logo')) {
    /**
     * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
     *
     * @param string $slug
     */
    function magazinevibe_edge_get_mobile_logo($slug = '') {

        $slug = $slug !== '' ? $slug : 'header-type3';

        //check if mobile logo has been set and use that, else use normal logo
        if(magazinevibe_edge_options()->getOptionValue('logo_image_mobile') !== '') {
            $logo_image = magazinevibe_edge_options()->getOptionValue('logo_image_mobile');
        } else {
            $logo_image = magazinevibe_edge_options()->getOptionValue('logo_image');
        }

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = magazinevibe_edge_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px'; //divided with 2 because of retina screens
        }

        //set parameters for logo
        $parameters = array(
            'logo_image'      => $logo_image,
            'logo_dimensions' => $logo_dimensions,
            'logo_height'     => $logo_height,
            'logo_styles'     => $logo_styles
        );

        magazinevibe_edge_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
    }
}

if(!function_exists('magazinevibe_edge_get_mobile_nav')) {
    /**
     * Loads mobile navigation HTML
     */
    function magazinevibe_edge_get_mobile_nav() {

        $slug = 'header-type3';

        magazinevibe_edge_get_module_template_part('templates/parts/mobile-navigation', 'header', $slug);
    }
}

if(!function_exists('magazinevibe_edge_get_page_options')) {
    /**
     * Gets options from page
     */
    function magazinevibe_edge_get_page_options() {
        $id = magazinevibe_edge_get_page_id();
        $page_options = array();
        
        $menu_area_background_color_header_type3 = '';
        $menu_area_background_transparency_header_type3 = '';
        $menuAreaStyle = array();

        $logo_area_background_color_header_type3 = '';
        $logo_area_background_transparency_header_type3 = '';
        $logoAreaStyle = array();

        if(get_post_meta($id, 'edgtf_menu_area_background_color_header_standard_meta', true) != '') {
            $menu_area_background_color_header_type3 = get_post_meta($id, 'edgtf_menu_area_background_color_header_standard_meta', true);
            $menu_area_background_transparency_header_type3 = 1;
        }

        if(get_post_meta($id, 'edgtf_menu_area_background_transparency_header_standard_meta', true) != '') {
            $menu_area_background_transparency_header_type3 = get_post_meta($id, 'edgtf_menu_area_background_transparency_header_standard_meta', true);
        }

        if(magazinevibe_edge_rgba_color($menu_area_background_color_header_type3, $menu_area_background_transparency_header_type3) !== null) {
            $menuAreaStyle[] = 'background-color:'.magazinevibe_edge_rgba_color($menu_area_background_color_header_type3, $menu_area_background_transparency_header_type3);
        }

        $menuAreaStyle = implode(';', $menuAreaStyle);

        $page_options['menu_area_background_color_header_type3'] = $menuAreaStyle;


        if(get_post_meta($id, 'edgtf_logo_area_background_color_header_type3_meta', true) != '') {
            $logo_area_background_color_header_type3 = get_post_meta($id, 'edgtf_logo_area_background_color_header_type3_meta', true);
            $logo_area_background_transparency_header_type3 = 1;
        }

        if(get_post_meta($id, 'edgtf_logo_area_background_transparency_header_type3_meta', true) != '') {
            $logo_area_background_transparency_header_type3 = get_post_meta($id, 'edgtf_logo_area_background_transparency_header_type3_meta', true);
        }

        if(magazinevibe_edge_rgba_color($logo_area_background_color_header_type3, $logo_area_background_transparency_header_type3) !== null) {
            $logoAreaStyle[] = 'background-color:'.magazinevibe_edge_rgba_color($logo_area_background_color_header_type3, $logo_area_background_transparency_header_type3);
        }

        $logoAreaStyle = implode(';', $logoAreaStyle);

        $page_options['logo_area_background_color_header_type3'] = $logoAreaStyle;

        return $page_options;
    }
}