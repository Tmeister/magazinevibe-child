<?php

if(!function_exists('magazinevibe_edge_title_classes')) {
    /**
     * Function that adds classes to title div.
     * All other functions are tied to it with add_filter function
     * @param array $classes array of classes
     */
    function magazinevibe_edge_title_classes($classes = array()) {
        $classes = array();
        $classes = apply_filters('magazinevibe_edge_title_classes', $classes);

        if(is_array($classes) && count($classes)) {
            echo implode(' ', $classes);
        }
    }
}

if(!function_exists('magazinevibe_edge_title_background_image_classes')) {
    function magazinevibe_edge_title_background_image_classes($classes) {
        //init variables
        $id                         = magazinevibe_edge_get_page_id();
        $is_img_responsive 		    = '';
        $show_title_img			    = true;
        $title_img				    = '';

        //is responsive image is set for current page?
        if(get_post_meta($id, "edgtf_title_area_background_image_responsive_meta", true) != "") {
            $is_img_responsive = get_post_meta($id, "edgtf_title_area_background_image_responsive_meta", true);
        } else {
            //take value from theme options
            $is_img_responsive = magazinevibe_edge_options()->getOptionValue('title_area_background_image_responsive');
        }

        //is title image chosen for current page?
        if(get_post_meta($id, "edgtf_title_area_background_image_meta", true) != ""){
            $title_img = get_post_meta($id, "edgtf_title_area_background_image_meta", true);
        }else{
            //take image that is set in theme options
            $title_img = magazinevibe_edge_options()->getOptionValue('title_area_background_image');
        }

        //is title image hidden for current page?
        if(get_post_meta($id, "edgtf_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set and visible?
        if($title_img !== '' && $show_title_img == true) {
            //is image not responsive?
            $classes[] = 'edgtf-preload-background';
            $classes[] = 'edgtf-has-background';

            //is image not responsive
            if($is_img_responsive == 'yes'){
                $classes[] = 'edgtf-has-responsive-background';
            }
        }

        return $classes;
    }

    add_filter('magazinevibe_edge_title_classes', 'magazinevibe_edge_title_background_image_classes');
}

if(!function_exists('magazinevibe_edge_title_content_alignment_class')) {
    /**
     * Function that adds class on title based on title content alignmnt option
     * Could be left, centered or right
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function magazinevibe_edge_title_content_alignment_class($classes) {

        //init variables
        $id                      = magazinevibe_edge_get_page_id();
        $title_content_alignment = 'left';

        if(get_post_meta($id, "edgtf_title_area_content_alignment_meta", true) != "") {
            $title_content_alignment = get_post_meta($id, "edgtf_title_area_content_alignment_meta", true);

        } else {
            $title_content_alignment = magazinevibe_edge_options()->getOptionValue('title_area_content_alignment');
        }

        $classes[] = 'edgtf-content-'.$title_content_alignment.'-alignment';

        return $classes;

    }

    add_filter('magazinevibe_edge_title_classes', 'magazinevibe_edge_title_content_alignment_class');
}

if(!function_exists('magazinevibe_edge_title_background_image_div_classes')) {
    function magazinevibe_edge_title_background_image_div_classes($classes) {

        //init variables
        $id                         = magazinevibe_edge_get_page_id();
        $is_img_responsive 		    = '';
        $show_title_img			    = true;
        $title_img				    = '';

        //is responsive image is set for current page?
        if(get_post_meta($id, "edgtf_title_area_background_image_responsive_meta", true) != "") {
            $is_img_responsive = get_post_meta($id, "edgtf_title_area_background_image_responsive_meta", true);
        } else {
            //take value from theme options
            $is_img_responsive = magazinevibe_edge_options()->getOptionValue('title_area_background_image_responsive');
        }

        //is title image chosen for current page?
        if(get_post_meta($id, "edgtf_title_area_background_image_meta", true) != ""){
            $title_img = get_post_meta($id, "edgtf_title_area_background_image_meta", true);
        }else{
            //take image that is set in theme options
            $title_img = magazinevibe_edge_options()->getOptionValue('title_area_background_image');
        }

        //is title image hidden for current page?
        if(get_post_meta($id, "edgtf_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set, visible and responsive?
        if($title_img !== '' && $show_title_img == true) {

            //is image responsive?
            if($is_img_responsive == 'yes') {
                $classes[] = 'edgtf-title-image-responsive';
            }
            //is image not responsive?
            elseif($is_img_responsive == 'no') {
                $classes[] = 'edgtf-title-image-not-responsive';
            }
        }

        return $classes;
    }

    add_filter('magazinevibe_edge_title_classes', 'magazinevibe_edge_title_background_image_div_classes');
}