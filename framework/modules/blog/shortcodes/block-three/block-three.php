<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\BlockThree;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockThree
 */
class BlockThree extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct()
    {
        $this->base = 'edgtf_block_three';
        $this->css_class = 'edgtf-block-three';
        $this->shortcode_title = 'Edge Block 3';

        parent::__construct($this->base, $this->css_class, $this->shortcode_title);

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * add params for shortcode in next function
     * function gets $base for each shortcode
     *
     * @see magazinevibe_edge_get_shortcode_params()
     */

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @return string
     */
    public function render($atts, $content = null)
    {

        $args = array(
            'display_category' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd M Y',
            'display_author' => 'yes',
            'display_comments' => 'yes',
            'display_rating' => 'no',
            'title_tag' => 'h5',
            'thumb_image_size' => ''
        );

        $args_featured = array(
            'featured_display_category' => 'yes',
            'featured_display_date' => 'yes',
            'featured_date_format' => 'd M Y',
            'featured_display_author' => 'no',
            'featured_display_comments' => 'yes',
            'featured_display_social_share' => 'no',
            'featured_title_tag' => 'h3',
            'featured_display_rating' => 'no',
            'featured_box_background_color' => '',
            'featured_thumb_image_size' => '',
            'featured_thumb_image_width' => '',
            'featured_thumb_image_height' => ''
        );

        $params = shortcode_atts($args, $atts);

        $params_featured = shortcode_atts($args_featured, $atts);
        $params_featured_filtered = magazinevibe_edge_get_filtered_params($params_featured, 'featured');
        $params_featured_filtered['box_styles'] = $this->getBoxStyles($params_featured_filtered);

        $html = '';

        if ($atts['query_result']->have_posts()):

            $html .= '<ul>';
            $html .= '<li class = "edgtf-pls-image-list">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-featured-template', 'templates', '', $params_featured_filtered);

            endwhile;

            $html .= '</li>';
            $html .= '<li class="edgtf-pls-text-list">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-minimal-template', 'templates', '', $params);

            endwhile;

            $html .= '</li>';
            $html .= '</ul>';

        else:
            $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;

        wp_reset_postdata();

        return $html;
    }

    /**
     * Returns array of box styles
     *
     * @param $params
     *
     * @return array
     */
    private function getBoxStyles($params) {
        $styles = array();

        if(!empty($params['box_background_color'])) {
            $styles[] = 'background-color: '.$params['box_background_color'];
        }

        return $styles;
    }
}