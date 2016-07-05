<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\Lib;

/**
 * Interface ShortcodeInterface
 */
abstract class ListShortcode {

    private $base;
    private $css_class;
    private $shortcode_title;

    function __construct($base, $css_class, $shortcode_title){

        $this->base = $base;
        $this->css_class = $css_class;
        $this->shortcode_title = $shortcode_title;

    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase(){
        return $this->base;
    }


    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map( array(
                "name" => $this->shortcode_title,
                "base" => $this->base,
                "category" => 'by EDGE  ',
                "icon" => "icon-wpb-".$this->css_class." extended-custom-icon-mag",
                "allowed_container_element" => 'vc_row',
                "params" => magazinevibe_edge_get_shortcode_params($this->base)
            ) );
        }
    }
    /**
     * Renders specific HTML for each shortcode.This method is unique for each shortcode
     *
     * @param html
     */


    public function render($params, $content = null){
    }

    /**
     * Renders shortcodes holder HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return html
     */

    public function renderHolders($atts, $content = null)
    {

        $args = magazinevibe_edge_get_shortcode_params_names(magazinevibe_edge_get_shortcode_params($this->base));
        $html = '';

        $params = shortcode_atts($args, $atts);

        $atts['query_result'] = $this->generatePostsQuery($params);

        // data and class for holder
        $params['thumb_image_size'] = $this->generateImageSize($params, 'regular');
        $params['featured_thumb_image_size'] = $this->generateImageSize($params, 'featured');
        $params['paged'] = $this->getPageNumber();

        if($params['offset'] > '0' && $params['offset'] != ''){
            $atts['max_pages'] = ceil(($atts['query_result']->found_posts - $atts['offset'])/$atts['number_of_posts']);
        } else {
            $atts['max_pages'] = $atts['query_result']->max_num_pages;
        }
        $params['max_pages'] = $atts['max_pages'];

        $params['posts_data'] = $this->generatePostsData($params);
        $params['slider_classes'] = $this->getHolderClasses($params);
        $params['query_result'] = $atts['query_result'];

        // information that need to be passed to render
        $atts['thumb_image_size'] = $params['thumb_image_size'];
        if($params['thumb_image_size'] == 'custom_size'){
            $atts['thumb_image_width'] = $params['thumb_image_width'];
            $atts['thumb_image_height'] = $params['thumb_image_height'];
        }
        $atts['featured_thumb_image_size'] = $params['featured_thumb_image_size'];
        if($params['featured_thumb_image_size'] == 'custom_size' && $params['featured_thumb_image_width'] != '' && $params['featured_thumb_image_height'] != ''){
            $atts['featured_thumb_image_width'] = $params['featured_thumb_image_width'];
            $atts['featured_thumb_image_height'] = $params['featured_thumb_image_height'];
        }

        // generate html

        $html .= '<div class="'.$this->css_class.'-holder  '.esc_attr($params['slider_classes']).'" '.magazinevibe_edge_get_inline_attrs($params['posts_data']).'>';

        if($this->getBase() == 'edgtf_block_two') {
            $html .= '<div class="edgtf-block-two-inner-holder" >';
        }
        if($this->getBase() == 'edgtf_post_layout_boxes') {
            $html .= '<div class="edgtf-post-layout-boxes-inner" >';
        }

        $html .= $this->render($atts);

        if($this->getBase() == 'edgtf_block_two' || $this->getBase() == 'edgtf_post_layout_boxes') {
            $html .= '</div>';
            // close edgtf-block-two-inner-holder or close edgtf-post-layout-boxes-inner
        }

        if($this->isPaginationEnabled($params) && $params['max_pages'] > 1){
            switch($params['pagination_type']){
                case 'edgtf-load-more' : {
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-show-load-more-template', 'templates', '', $atts);
                } break;
                case 'edgtf-next-prev' : {
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-direction-nav-vertical-template', 'templates', '', $atts);
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-ajax-preloader-template', 'templates', '', $atts);
                } break;
                case 'edgtf-next-prev-horizontal' : {
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-direction-nav-horizontal-template', 'templates', '', $atts);
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-ajax-preloader-template', 'templates', '', $atts);
                } break;
                default : break;
            }
        }

        $html .= '</div>';
        // close css_class holder

        return $html;
    }

    /**
     * Generates query array
     *
     * @param $params
     *
     * @return array
     */
    public function generatePostsQuery($params) {
        $queryResult = magazinevibe_edge_get_query($params);

        return $queryResult;
    }

    /**
     * Generates image size option
     *
     * @param $params
     *
     * @return string
     */
    private function generateImageSize($params, $type){
        $thumbImageSize = '';

        switch($type){
            case 'regular' :
                $imageSize = isset($params['thumb_image_size']) ? $params['thumb_image_size'] : '';
                break;
            case 'featured' :
                $imageSize = isset($params['featured_thumb_image_size']) ? $params['featured_thumb_image_size'] : '';
                break;
            default :
                $imageSize = ''; // doesn't have image proportions
        }

        if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize = 'magazinevibe_edge_landscape';
        } else if($imageSize !== '' && $imageSize === 'square'){
            $thumbImageSize = 'magazinevibe_edge_square';
        } else if ($imageSize !== '' && $imageSize == 'portrait') {
            $thumbImageSize = 'magazinevibe_edge_portrait';
        } else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize = 'full';
        } else if ($imageSize !== '' && $imageSize == 'custom_size') {
            $thumbImageSize = 'custom_size';
        }

        return $thumbImageSize;
    }


    /**
     * Generates true/false for pagination
     *
     * @param $params
     *
     * @return boolean
     */
    private function isPaginationEnabled($params) {

        return (isset($params['display_pagination'])
            && isset($params['pagination_type'])
            && $params['display_pagination'] == 'yes');

    }

    /**
     * Generates true/false for pagination
     *
     * @return int
     */
    private function getPageNumber() {

        if(get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif(get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        return $paged;
    }

    /**
     * Generates posts data attribute array
     *
     * @param $params
     *
     * @return array
     */
    protected function generatePostsData($params) {
        $sliderData = array();

        $sliderData['data-base'] = $this->base;

        foreach ($params as $key => $value){
            $sliderData['data-'.$key] = ($value !== '') ? $value : '';
        }

        if($this->isPaginationEnabled($params)){
            $sliderData['data-prev_page'] = $sliderData['data-paged']-1;
            $sliderData['data-next_page'] = $sliderData['data-paged']+1;
        }

        return $sliderData;
    }

    /**
     * Generates posts class string
     *
     * @param $params
     *
     * @return string
     */
    protected function getHolderClasses($params) {

        $slider_classes = array();

        if (isset($params['column_number']) && $params['column_number'] !== '') {
            $slider_classes[] = 'edgtf-post-columns-'.$params['column_number'];
        }

        if ($this->isPaginationEnabled($params)) {
            $slider_classes[] = 'edgtf-post-pag-'.$params['pagination_type'];
        }

        return implode(' ', $slider_classes);
    }
}