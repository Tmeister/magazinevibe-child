<?php

if (!function_exists('magazinevibe_edge_title_area_typography_style')) {

    function magazinevibe_edge_title_area_typography_style(){

        $breadcrumb_styles = array();

        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_color') !== '') {
            $breadcrumb_styles['color'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_color');
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_google_fonts') !== '-1') {
            $breadcrumb_styles['font-family'] = magazinevibe_edge_get_formatted_font_family(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_google_fonts'));
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_fontsize') !== '') {
            $breadcrumb_styles['font-size'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_fontsize').'px';
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_lineheight') !== '') {
            $breadcrumb_styles['line-height'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_lineheight').'px';
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_texttransform') !== '') {
            $breadcrumb_styles['text-transform'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_texttransform');
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_fontstyle') !== '') {
            $breadcrumb_styles['font-style'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_fontstyle');
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_fontweight') !== '') {
            $breadcrumb_styles['font-weight'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_fontweight');
        }
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_letter_spacing') !== '') {
            $breadcrumb_styles['letter-spacing'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_letter_spacing').'px';
        }

        $breadcrumb_selector = array(
            '.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs a, .edgtf-title .edgtf-title-holder .edgtf-breadcrumbs span'
        );

        echo magazinevibe_edge_dynamic_css($breadcrumb_selector, $breadcrumb_styles);

        $breadcrumb_selector_styles = array();
        if(magazinevibe_edge_options()->getOptionValue('page_breadcrumb_hovercolor') !== '') {
            $breadcrumb_selector_styles['color'] = magazinevibe_edge_options()->getOptionValue('page_breadcrumb_hovercolor');
        }

        $breadcrumb_hover_selector = array(
            '.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs a:hover'
        );

        echo magazinevibe_edge_dynamic_css($breadcrumb_hover_selector, $breadcrumb_selector_styles);

    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_title_area_typography_style');
}