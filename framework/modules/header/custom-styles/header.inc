<?php

if(!function_exists('magazinevibe_edge_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function magazinevibe_edge_header_top_bar_styles() {
        global $magazinevibe_edge_options;

        if($magazinevibe_edge_options['top_bar_in_grid'] == 'yes') {
            $top_bar_grid_selector = '.edgtf-top-bar .edgtf-grid .edgtf-vertical-align-containers';
            $top_bar_grid_styles = array();
            if($magazinevibe_edge_options['top_bar_grid_background_color'] !== '') {
                $grid_background_color    = $magazinevibe_edge_options['top_bar_grid_background_color'];
                $grid_background_transparency = 1;

                if(magazinevibe_edge_options()->getOptionValue('top_bar_grid_background_transparency')) {
                    $grid_background_transparency = magazinevibe_edge_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = magazinevibe_edge_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo magazinevibe_edge_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = magazinevibe_edge_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $top_bar_styles['background-color'] = $background_color;
        }

        echo magazinevibe_edge_dynamic_css('.edgtf-top-bar', $top_bar_styles);
    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_header_top_bar_styles');
}

if(!function_exists('magazinevibe_edge_header_top_bar_responsive_styles')) {
    /**
     * Generates styles for header top bar
     */
    function magazinevibe_edge_header_top_bar_responsive_styles() {
        global $magazinevibe_edge_options;

        $top_bar_responsive_styles = array();
        $hide_top_bar_on_mobile = magazinevibe_edge_options()->getOptionValue('hide_top_bar_on_mobile');

        if($hide_top_bar_on_mobile === 'yes') { ?>
            @media only screen and (max-width: 700px) {
                .edgtf-top-bar {
                    height: 0;
                    display: none;
                }
            }
        <?php }
    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_header_top_bar_responsive_styles');
}

if(!function_exists('magazinevibe_edge_header_type3_logo_styles')) {
    /**
     * Generates styles for header type 3 logo
     */
    function magazinevibe_edge_header_type3_logo_styles() {
        global $magazinevibe_edge_options;

        $logo_area_header_type3_styles = array();
        $logo_link_styles = array();

        if($magazinevibe_edge_options['logo_area_background_color_header_type3'] !== '') {
            $logo_area_background_color = $magazinevibe_edge_options['logo_area_background_color_header_type3'];
            $logo_area_background_transparency = 1;

            if($magazinevibe_edge_options['logo_area_background_transparency_header_type3'] !== '') {
                $logo_area_background_transparency = $magazinevibe_edge_options['logo_area_background_transparency_header_type3'];
            }

            $logo_area_header_type3_styles['background-color'] = magazinevibe_edge_rgba_color($logo_area_background_color, $logo_area_background_transparency);
        }

        if($magazinevibe_edge_options['logo_area_height_header_type3'] !== '') {
            $logo_area_header_type3_styles['height'] = magazinevibe_edge_filter_px($magazinevibe_edge_options['logo_area_height_header_type3']).'px';
        }

        echo magazinevibe_edge_dynamic_css('.edgtf-header-type3 .edgtf-page-header .edgtf-logo-area', $logo_area_header_type3_styles);

        $logo_link_selector = '.edgtf-header-type3 .edgtf-page-header .edgtf-logo-area .edgtf-logo-wrapper a';

        echo magazinevibe_edge_dynamic_css($logo_link_selector, $logo_link_styles);

        $logo_area_grid_header_type3_styles = array();

        if($magazinevibe_edge_options['logo_area_in_grid_header_type3'] =='yes' && $magazinevibe_edge_options['logo_area_grid_background_color_header_type3'] !== '') {
            $logo_area_grid_background_color = $magazinevibe_edge_options['logo_area_grid_background_color_header_type3'];
            $logo_area_grid_background_transparency = 1;

            if($magazinevibe_edge_options['logo_area_grid_background_transparency_header_type3'] !== '') {
                $logo_area_grid_background_transparency = $magazinevibe_edge_options['logo_area_grid_background_transparency_header_type3'];
            }

            $logo_area_grid_header_type3_styles['background-color'] = magazinevibe_edge_rgba_color($logo_area_grid_background_color, $logo_area_grid_background_transparency);
        }

        echo magazinevibe_edge_dynamic_css('.edgtf-header-type3 .edgtf-page-header .edgtf-logo-area .edgtf-grid .edgtf-vertical-align-containers', $logo_area_grid_header_type3_styles);

    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_header_type3_logo_styles');
}

if(!function_exists('magazinevibe_edge_header_type3_logo_inline_styles')) {
    /**
     * Generates styles for header type 3 logo
     */
    function magazinevibe_edge_header_type3_logo_inline_styles() {
        global $magazinevibe_edge_options;

        $logo_styles = array();

        if(magazinevibe_edge_options()->getOptionValue('logo_image_top_padding') !== '') {
            $logo_styles['padding-top'] = magazinevibe_edge_filter_px(magazinevibe_edge_options()->getOptionValue('logo_image_top_padding')).'px';
        }

        $logo_styles_selector = array();

        if(magazinevibe_edge_get_meta_field_intersect('header_type') !== 'header-type-two') {
            $logo_styles_selector = array(
                '.edgtf-logo-area .edgtf-logo-wrapper'
            );
        } else {
            $logo_styles_selector = array(
                '.edgtf-logo-area .edgtf-logo-wrapper',
                '.edgtf-logo-area .edgtf-position-right .widget'
            );
        }

        echo magazinevibe_edge_dynamic_css($logo_styles_selector, $logo_styles);
    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_header_type3_logo_inline_styles');
}

if(!function_exists('magazinevibe_edge_header_type3_menu_area_styles')) {
    /**
     * Generates styles for header type 3 menu area
     */
    function magazinevibe_edge_header_type3_menu_area_styles() {
        global $magazinevibe_edge_options;

        $menu_area_header_type3_styles = array();

        if($magazinevibe_edge_options['menu_area_background_color_header_type3'] !== '') {
            $menu_area_background_color = $magazinevibe_edge_options['menu_area_background_color_header_type3'];
            $menu_area_background_transparency = 1;

            if($magazinevibe_edge_options['menu_area_background_transparency_header_type3'] !== '') {
                $menu_area_background_transparency = $magazinevibe_edge_options['menu_area_background_transparency_header_type3'];
            }

            $menu_area_header_type3_styles['background-color'] = magazinevibe_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($magazinevibe_edge_options['menu_area_height_header_type3'] !== '') {
            $menu_area_header_type3_styles['height'] = magazinevibe_edge_filter_px($magazinevibe_edge_options['menu_area_height_header_type3']).'px';
        }

        echo magazinevibe_edge_dynamic_css('.edgtf-header-type3 .edgtf-page-header .edgtf-menu-area', $menu_area_header_type3_styles);

        $menu_area_grid_header_type3_styles = array();

        if($magazinevibe_edge_options['menu_area_in_grid_header_type3'] =='yes' && $magazinevibe_edge_options['menu_area_grid_background_color_header_type3'] !== '') {
            $menu_area_grid_background_color = $magazinevibe_edge_options['menu_area_grid_background_color_header_type3'];
            $menu_area_grid_background_transparency = 1;

            if($magazinevibe_edge_options['menu_area_grid_background_transparency_header_type3'] !== '') {
                $menu_area_grid_background_transparency = $magazinevibe_edge_options['menu_area_grid_background_transparency_header_type3'];
            }

            $menu_area_grid_header_type3_styles['background-color'] = magazinevibe_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo magazinevibe_edge_dynamic_css('.edgtf-header-type3 .edgtf-page-header .edgtf-menu-area .edgtf-grid .edgtf-vertical-align-containers', $menu_area_grid_header_type3_styles);
    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_header_type3_menu_area_styles');
}

if(!function_exists('magazinevibe_edge_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function magazinevibe_edge_sticky_header_styles() {
        global $magazinevibe_edge_options;

        if($magazinevibe_edge_options['sticky_header_in_grid'] == 'yes' && $magazinevibe_edge_options['sticky_header_grid_background_color'] !== '') {
            $sticky_header_grid_background_color        = $magazinevibe_edge_options['sticky_header_grid_background_color'];
            $sticky_header_grid_background_transparency = 1;

            if($magazinevibe_edge_options['sticky_header_grid_transparency'] !== '') {
                $sticky_header_grid_background_transparency = $magazinevibe_edge_options['sticky_header_grid_transparency'];
            }

            echo magazinevibe_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-grid .edgtf-vertical-align-containers', array('background-color' => magazinevibe_edge_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if($magazinevibe_edge_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $magazinevibe_edge_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($magazinevibe_edge_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $magazinevibe_edge_options['sticky_header_transparency'];
            }

            echo magazinevibe_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array('background-color' => magazinevibe_edge_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($magazinevibe_edge_options['sticky_header_height'] !== '') {

            echo magazinevibe_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header', array('height' => $magazinevibe_edge_options['sticky_header_height'].'px'));
        }

        $sticky_menu_item_styles = array();
        if($magazinevibe_edge_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $magazinevibe_edge_options['sticky_color'];
        }
        if($magazinevibe_edge_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = magazinevibe_edge_get_formatted_font_family($magazinevibe_edge_options['sticky_google_fonts']);
        }
        if($magazinevibe_edge_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $magazinevibe_edge_options['sticky_fontsize'].'px';
        }
        if($magazinevibe_edge_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $magazinevibe_edge_options['sticky_lineheight'].'px';
        }
        if($magazinevibe_edge_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $magazinevibe_edge_options['sticky_texttransform'];
        }
        if($magazinevibe_edge_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $magazinevibe_edge_options['sticky_fontstyle'];
        }
        if($magazinevibe_edge_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $magazinevibe_edge_options['sticky_fontweight'];
        }
        if($magazinevibe_edge_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $magazinevibe_edge_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li > a'
        );

        echo magazinevibe_edge_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($magazinevibe_edge_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $magazinevibe_edge_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item:hover > a',
            'body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
            'body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item:hover > a'
        );

        echo magazinevibe_edge_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_sticky_header_styles');
}

if(!function_exists('magazinevibe_edge_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function magazinevibe_edge_fixed_header_styles() {
        global $magazinevibe_edge_options;

        if($magazinevibe_edge_options['fixed_header_grid_background_color'] !== '') {

            $fixed_header_grid_background_color              = $magazinevibe_edge_options['fixed_header_grid_background_color'];
            $fixed_header_grid_background_color_transparency = 1;

            if($magazinevibe_edge_options['fixed_header_grid_transparency'] !== '') {
                $fixed_header_grid_background_color_transparency = $magazinevibe_edge_options['fixed_header_grid_transparency'];
            }

            echo magazinevibe_edge_dynamic_css('.edgtf-header-type1 .edgtf-fixed-wrapper.fixed .edgtf-grid .edgtf-vertical-align-containers,
                                    .edgtf-header-type3 .edgtf-fixed-wrapper.fixed .edgtf-grid .edgtf-vertical-align-containers',
                array('background-color' => magazinevibe_edge_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if($magazinevibe_edge_options['fixed_header_background_color'] !== '') {

            $fixed_header_background_color              = $magazinevibe_edge_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($magazinevibe_edge_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $magazinevibe_edge_options['fixed_header_transparency'];
            }

            echo magazinevibe_edge_dynamic_css('.edgtf-header-type1 .edgtf-fixed-wrapper.fixed .edgtf-menu-area,
                                    .edgtf-header-type3 .edgtf-fixed-wrapper.fixed .edgtf-menu-area',
                array('background-color' => magazinevibe_edge_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_fixed_header_styles');
}

if(!function_exists('magazinevibe_edge_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function magazinevibe_edge_main_menu_styles() {
        global $magazinevibe_edge_options;

        if($magazinevibe_edge_options['menu_color'] !== '' || $magazinevibe_edge_options['menu_fontsize'] != '' || $magazinevibe_edge_options['menu_fontstyle'] !== '' || $magazinevibe_edge_options['menu_fontweight'] !== '' || $magazinevibe_edge_options['menu_texttransform'] !== '' || $magazinevibe_edge_options['menu_letterspacing'] !== '' || $magazinevibe_edge_options['menu_google_fonts'] != "-1") { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li > a {
            <?php if($magazinevibe_edge_options['menu_color']) { ?> color: <?php echo esc_attr($magazinevibe_edge_options['menu_color']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $magazinevibe_edge_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($magazinevibe_edge_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($magazinevibe_edge_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($magazinevibe_edge_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($magazinevibe_edge_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($magazinevibe_edge_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($magazinevibe_edge_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_hovercolor'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
            .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a,
            body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
            body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a {
                color: <?php echo esc_attr($magazinevibe_edge_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_activecolor'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a,
            body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a{
                color: <?php echo esc_attr($magazinevibe_edge_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_text_background_color'] !=='') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li > a span.item_inner{
                background-color: <?php echo esc_attr($magazinevibe_edge_options['menu_text_background_color']); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_hover_background_color'] !== '') {
            $menu_hover_background_color = $magazinevibe_edge_options['menu_hover_background_color'];

            if($magazinevibe_edge_options['menu_hover_background_color_transparency'] !== '') {
                $menu_hover_background_color_rgb = magazinevibe_edge_hex2rgb($menu_hover_background_color);
                $menu_hover_background_color     = 'rgba('.$menu_hover_background_color_rgb[0].', '.$menu_hover_background_color_rgb[1].', '.$menu_hover_background_color_rgb[2].', '.$magazinevibe_edge_options['menu_hover_background_color_transparency'].')';
            } ?>

            .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a span.item_inner,
            .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a span.item_inner {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_active_background_color'] !== '') {
            $menu_active_background_color = $magazinevibe_edge_options['menu_active_background_color'];

            if($magazinevibe_edge_options['menu_active_background_color_transparency'] !== '') {
                $menu_active_background_color_rgb = magazinevibe_edge_hex2rgb($menu_active_background_color);
                $menu_active_background_color     = 'rgba('.$menu_active_background_color_rgb[0].', '.$menu_active_background_color_rgb[1].', '.$menu_active_background_color_rgb[2].', '.$magazinevibe_edge_options['menu_active_background_color_transparency'].')';
            }
            ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a span.item_inner {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_lineheight'] != "" || $magazinevibe_edge_options['menu_padding_left_right'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li > a span.item_inner{
            <?php if($magazinevibe_edge_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($magazinevibe_edge_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($magazinevibe_edge_options['menu_padding_left_right']) { ?> padding: 0  <?php echo esc_attr($magazinevibe_edge_options['menu_padding_left_right']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['menu_margin_left_right'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li{
                margin: 0  <?php echo esc_attr($magazinevibe_edge_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['enable_menu_item_text_decoration'] == 'yes') { ?>

            <?php if($magazinevibe_edge_options['menu_item_text_decoration_style'] == 'none') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a span.item_inner,
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a span.item_inner{
                    text-decoration: none;
                }
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_item_text_decoration_style'] == 'underline') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a span.item_inner,
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a span.item_inner{
                    text-decoration: underline;
                }
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_item_text_decoration_style'] == 'line-through') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a span.item_inner,
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a span.item_inner{
                    text-decoration: line-through;
                }
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_item_text_decoration_style'] == 'overline') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a span.item_inner,
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a span.item_inner{
                    text-decoration: overline;
                }
            <?php } ?>


            <?php if($magazinevibe_edge_options['menu_item_active_text_decoration_style'] == 'none') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a span.item_inner{
                    text-decoration: none;
                }
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_item_active_text_decoration_style'] == 'underline') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a span.item_inner{
                    text-decoration: underline;
                }
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_item_active_text_decoration_style'] == 'line-through') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a span.item_inner{
                    text-decoration: line-through;
                }
            <?php } ?>
            <?php if($magazinevibe_edge_options['menu_item_active_text_decoration_style'] == 'overline') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a span.item_inner{
                    text-decoration: overline;
                }
            <?php } ?>

        <?php } ?>

        <?php
        if($magazinevibe_edge_options['dropdown_background_color'] != "" || $magazinevibe_edge_options['dropdown_background_transparency'] != "") {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#ffffff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = $magazinevibe_edge_options['dropdown_background_color'] !== "" ? $magazinevibe_edge_options['dropdown_background_color'] : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = $magazinevibe_edge_options['dropdown_background_transparency'] !== "" ? $magazinevibe_edge_options['dropdown_background_transparency'] : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = magazinevibe_edge_hex2rgb($dropdown_bg_color);

            ?>

            .edgtf-drop-down .second .inner ul,
            .edgtf-drop-down .second .inner ul li ul,
            li.narrow .second .inner ul,
            .edgtf-drop-down .wide.wide_background .second{
            background-color: <?php echo esc_attr($dropdown_bg_color); ?>;
            background-color: rgba(<?php echo esc_attr($dropdown_bg_color_rgb[0]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[1]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[2]); ?>,<?php echo esc_attr($dropdown_bg_transparency); ?>);
            }
        <?php } //end dropdown background and transparency styles ?>

        <?php if($magazinevibe_edge_options['dropdown_top_separator_color'] !== '' && $magazinevibe_edge_options['enable_dropdown_top_separator'] !== "no") { ?>
            .edgtf-drop-down .second,
            .edgtf-drop-down .narrow .second .inner ul li ul {
                border-top-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_top_separator_color']); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['enable_dropdown_top_separator'] === "no") { ?>
            .edgtf-drop-down .second,
            .edgtf-drop-down .narrow .second .inner ul li ul {
                border-top: 0 !important;
            }
            .edgtf-drop-down .narrow .second .inner ul li ul {
                top: 0;
            }
        <?php } ?>

        <?php
        if($magazinevibe_edge_options['dropdown_top_padding'] !== '') {

            $menu_inner_ul_top = 0; //default value without border
            if($magazinevibe_edge_options['dropdown_top_padding'] !== '') {
                ?>
                li.narrow .second .inner ul,
                .edgtf-drop-down .wide .second .inner > ul{
                padding-top: <?php echo esc_attr($magazinevibe_edge_options['dropdown_top_padding']); ?>px;
                }
                <?php
                $menu_inner_ul_top = $magazinevibe_edge_options['dropdown_top_padding']; //overwrite default value
            } ?>

            .edgtf-drop-down .narrow .second .inner ul li ul,
            body.edgtf-slide-from-top .narrow .second .inner ul li:hover ul{
                top:-<?php echo esc_attr($menu_inner_ul_top); ?>px;
            }

        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_bottom_padding'] !== '') { ?>
            li.narrow .second .inner ul,
            .edgtf-drop-down .wide .second .inner > ul{
                padding-bottom: <?php echo esc_attr($magazinevibe_edge_options['dropdown_bottom_padding']); ?>px;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_separator_color'] !== "") { ?>
            .edgtf-drop-down .second .inner ul li a {
                border-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_separator_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($magazinevibe_edge_options['dropdown_vertical_separator_color'])) { ?>
            .edgtf-drop-down .wide .second ul li {
                border-left-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_vertical_separator_color']); ?>;
            }
        <?php } ?>


        <?php if($magazinevibe_edge_options['dropdown_top_position'] !== '') { ?>
            header .edgtf-drop-down .second {
                top: <?php echo esc_attr($magazinevibe_edge_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_color'] !== '' || $magazinevibe_edge_options['dropdown_fontsize'] !== '' || $magazinevibe_edge_options['dropdown_lineheight'] !== '' || $magazinevibe_edge_options['dropdown_fontstyle'] !== '' || $magazinevibe_edge_options['dropdown_fontweight'] !== '' || $magazinevibe_edge_options['dropdown_google_fonts'] != "-1" || $magazinevibe_edge_options['dropdown_texttransform'] !== '' || $magazinevibe_edge_options['dropdown_letterspacing'] !== '') { ?>
            .edgtf-drop-down .second .inner > ul > li > a,
            .edgtf-drop-down .second .inner > ul > li > h6,
            .edgtf-drop-down .wide .second .inner > ul > li > h6,
            .edgtf-drop-down .wide .second .inner > ul > li > a {
            <?php if(!empty($magazinevibe_edge_options['dropdown_color'])) { ?> color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_color']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $magazinevibe_edge_options['dropdown_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($magazinevibe_edge_options['dropdown_fontsize']); ?>px; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($magazinevibe_edge_options['dropdown_lineheight']); ?>px; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($magazinevibe_edge_options['dropdown_fontstyle']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($magazinevibe_edge_options['dropdown_fontweight']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($magazinevibe_edge_options['dropdown_texttransform']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($magazinevibe_edge_options['dropdown_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if(!empty($magazinevibe_edge_options['dropdown_hovercolor'])) { ?>
            .edgtf-drop-down li:not(.wide) .second .inner > ul > li:hover > a {
                color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($magazinevibe_edge_options['dropdown_background_hovercolor'])) { ?>
            .edgtf-drop-down li:not(.wide) .second .inner > ul > li:hover{
                background-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_background_hovercolor']); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_wide_color'] !== '' || $magazinevibe_edge_options['dropdown_wide_fontsize'] !== '' || $magazinevibe_edge_options['dropdown_wide_lineheight'] !== '' || $magazinevibe_edge_options['dropdown_wide_fontstyle'] !== '' || $magazinevibe_edge_options['dropdown_wide_fontweight'] !== '' || $magazinevibe_edge_options['dropdown_wide_google_fonts'] !== "-1" || $magazinevibe_edge_options['dropdown_wide_texttransform'] !== '' || $magazinevibe_edge_options['dropdown_wide_letterspacing'] !== '') { ?>
            .edgtf-drop-down .wide .second .inner > ul > li > a{
            <?php if($magazinevibe_edge_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $magazinevibe_edge_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_wide_hovercolor'] !== '') { ?>
            .edgtf-drop-down .wide .second .inner > ul > li:hover > a {
                color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($magazinevibe_edge_options['dropdown_wide_background_hovercolor'])) { ?>
            .edgtf-drop-down .wide .second .inner > ul > li:hover > a{
                background-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_background_hovercolor']); ?>
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_color_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_fontsize_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_lineheight_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_fontstyle_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_fontweight_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_google_fonts_thirdlvl'] != "-1" || $magazinevibe_edge_options['dropdown_texttransform_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .second .inner ul li.sub ul li a,
            .edgtf-drop-down .second .inner ul li ul li a {
            <?php if($magazinevibe_edge_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $magazinevibe_edge_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($magazinevibe_edge_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($magazinevibe_edge_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($magazinevibe_edge_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($magazinevibe_edge_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($magazinevibe_edge_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($magazinevibe_edge_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($magazinevibe_edge_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .second .inner ul li.sub ul li:hover > a,
            .edgtf-drop-down .second .inner ul li ul li:hover > a {
                color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_background_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .second .inner ul li.sub ul li:hover,
            .edgtf-drop-down .second .inner ul li ul li:hover {
                background-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_background_hovercolor_thirdlvl']); ?>;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_wide_color_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $magazinevibe_edge_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $magazinevibe_edge_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .wide .second .inner ul li.sub ul li a,
            .edgtf-drop-down .wide .second .inner ul li ul li a {
            <?php if($magazinevibe_edge_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $magazinevibe_edge_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($magazinevibe_edge_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($magazinevibe_edge_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .wide .second .inner ul li.sub ul li:hover > a,
            .edgtf-drop-down .wide .second .inner ul li ul li:hover > a {
                color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($magazinevibe_edge_options['dropdown_wide_background_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .wide .second .inner ul li.sub ul li:hover,
            .edgtf-drop-down .wide .second .inner ul li ul li:hover {
                background-color: <?php echo esc_attr($magazinevibe_edge_options['dropdown_wide_background_hovercolor_thirdlvl']); ?>;
            }
        <?php }
    }

    add_action('magazinevibe_edge_style_dynamic', 'magazinevibe_edge_main_menu_styles');
}