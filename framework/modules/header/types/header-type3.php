<?php
namespace MagazineVibe\Modules\Header\Types;

use MagazineVibe\Modules\Header\Lib\HeaderType;
/**
 * Class that represents Header Type 1 layout and option
 *
 * Class HeaderType3
 */
class HeaderType3 extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-type3';

        if(!is_admin()) {
            $logoAreaHeight       = magazinevibe_edge_filter_px(magazinevibe_edge_options()->getOptionValue('logo_area_height_header_type3'));
            $this->logoAreaHeight = $logoAreaHeight !== '' ? magazinevibe_edge_filter_px($logoAreaHeight) : 140;

            $menuAreaHeight       = magazinevibe_edge_filter_px(magazinevibe_edge_options()->getOptionValue('menu_area_height_header_type3'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? $menuAreaHeight : 64;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('magazinevibe_edge_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('magazinevibe_edge_per_page_js_vars', array($this, 'getPerPageJSVariables'));
        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {

        $parameters['logo_area_in_grid'] = magazinevibe_edge_options()->getOptionValue('logo_area_in_grid_header_type3') == 'yes' ? true : false;
        $parameters['menu_area_in_grid'] = magazinevibe_edge_options()->getOptionValue('menu_area_in_grid_header_type3') == 'yes' ? true : false;

        $parameters = apply_filters('magazinevibe_edge_header_type3_parameters', $parameters);

        magazinevibe_edge_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Registers widget areas for header type
     */
    public function registerWidgetAreas() {
        register_sidebar(array(
            'name'          => esc_html__('Right From Main Menu', 'magazinevibe'),
            'id'            => 'edgtf-right-from-main-menu',
            'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-main-menu-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'magazinevibe')
        ));
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = magazinevibe_edge_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'edgtf_logo_area_background_color_header_type3_meta', true) !== ''){
            $logoAreaTransparent = get_post_meta($id, 'edgtf_logo_area_background_color_header_type3_meta', true) !== '' &&
                                   get_post_meta($id, 'edgtf_logo_area_background_transparency_header_type3_meta', true) !== '1';
        } elseif(magazinevibe_edge_options()->getOptionValue('logo_area_background_color_header_type3') == '') {
            $logoAreaTransparent = magazinevibe_edge_options()->getOptionValue('logo_area_grid_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('logo_area_grid_background_transparency_header_type3') !== '1';
        } else {
            $logoAreaTransparent = magazinevibe_edge_options()->getOptionValue('logo_area_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('logo_area_background_transparency_header_type3') !== '1';
        }

        if(get_post_meta($id, 'edgtf_menu_area_background_color_header_standard_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'edgtf_menu_area_background_color_header_standard_meta', true) !== '' &&
                                   get_post_meta($id, 'edgtf_menu_area_background_transparency_header_standard_meta', true) !== '1';
        } elseif(magazinevibe_edge_options()->getOptionValue('menu_area_background_color_header_type3') == '') {
            $menuAreaTransparent = magazinevibe_edge_options()->getOptionValue('menu_area_grid_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('menu_area_grid_background_transparency_header_type3') !== '1';
        } else {
            $menuAreaTransparent = magazinevibe_edge_options()->getOptionValue('menu_area_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('menu_area_background_transparency_header_type3') !== '1';
        }

        if($logoAreaTransparent || $menuAreaTransparent) {
            if($logoAreaTransparent) {
                $transparencyHeight = $this->logoAreaHeight + $this->menuAreaHeight;

                if(magazinevibe_edge_is_top_bar_enabled() && magazinevibe_edge_is_top_bar_transparent()) {
                    $transparencyHeight += magazinevibe_edge_get_top_bar_height();
                }
            }

            if(!$logoAreaTransparent && $menuAreaTransparent) {
                $transparencyHeight = $this->menuAreaHeight;
            }
        }

        return $transparencyHeight;
    }

    public function calculateHeightOfCompleteTransparency() {
        $id = magazinevibe_edge_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'edgtf_logo_area_background_color_header_type3_meta', true) !== ''){
            $logoAreaTransparent = get_post_meta($id, 'edgtf_logo_area_background_color_header_type3_meta', true) !== '' &&
                                   get_post_meta($id, 'edgtf_logo_area_background_transparency_header_type3_meta', true) === '0';
        } elseif(magazinevibe_edge_options()->getOptionValue('logo_area_background_color_header_type3') == '') {
            $logoAreaTransparent = magazinevibe_edge_options()->getOptionValue('logo_area_grid_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('logo_area_grid_background_transparency_header_type3') === '0';
        } else {
            $logoAreaTransparent = magazinevibe_edge_options()->getOptionValue('logo_area_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('logo_area_background_transparency_header_type3') === '0';
        }

        if(get_post_meta($id, 'edgtf_menu_area_background_color_header_standard_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'edgtf_menu_area_background_color_header_standard_meta', true) !== '' &&
                                   get_post_meta($id, 'edgtf_menu_area_background_transparency_header_standard_meta', true) === '0';
        } elseif(magazinevibe_edge_options()->getOptionValue('menu_area_background_color_header_type3') == '') {
            $menuAreaTransparent = magazinevibe_edge_options()->getOptionValue('menu_area_grid_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('menu_area_grid_background_transparency_header_type3') === '0';
        } else {
            $menuAreaTransparent = magazinevibe_edge_options()->getOptionValue('menu_area_background_color_header_type3') !== '' &&
                                   magazinevibe_edge_options()->getOptionValue('menu_area_background_transparency_header_type3') === '0';
        }

        if($logoAreaTransparent || $menuAreaTransparent) {
            if($logoAreaTransparent) {
                $transparencyHeight = $this->logoAreaHeight + $this->menuAreaHeight;

                if(magazinevibe_edge_is_top_bar_enabled() && magazinevibe_edge_is_top_bar_completely_transparent()) {
                    $transparencyHeight += magazinevibe_edge_get_top_bar_height();
                }
            }

            if(!$logoAreaTransparent && $menuAreaTransparent) {
                $transparencyHeight = $this->menuAreaHeight;
            }
        }

        return $transparencyHeight;
    }

    public function calculateHeaderHeight() {
        $headerHeight = $this->logoAreaHeight + $this->menuAreaHeight;
        if(magazinevibe_edge_is_top_bar_enabled()) {
            $headerHeight += magazinevibe_edge_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['edgtfLogoAreaHeight'] = $this->logoAreaHeight;
        $globalVariables['edgtfMenuAreaHeight'] = $this->menuAreaHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(magazinevibe_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            $perPageVars['edgtfHeaderTransparencyHeight'] = $this->headerHeight - (magazinevibe_edge_get_top_bar_height() + $this->heightOfCompleteTransparency);
        }else{
            $perPageVars['edgtfHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }
}