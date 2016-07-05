<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\PostLayoutMinimalWithThumb;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostLayoutMinimalWithThumb
 */
class PostLayoutMinimalWithThumb extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct()
    {
        $this->base = 'edgtf_post_layout_minimal_with_thumb';
        $this->css_class = 'edgtf-post-layout-minimal-with-thumb';
        $this->shortcode_title = 'Edge Post Layout 6';

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
            'display_date' => 'yes',
            'date_format' => 'd M Y',
            'display_author' => 'yes',
            'display_rating' => 'no',
            'title_tag' => 'h6'
        );

        $params = shortcode_atts($args, $atts);

        $html = '';

        if ($atts['query_result']->have_posts()) {
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-two-template', 'templates', '', $params);

            endwhile;
        } else {
            $html .= '<div class="'. $this->css_class .'-messsage"><p>'. esc_html__('No posts were found.', 'magazinevibe') .'</p></div>';
        }

        wp_reset_postdata();

        return $html;
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

        if (isset($params['pagination_type']) && $params['pagination_type'] !== '') {
            $slider_classes[] = 'edgtf-post-pag-'.$params['pagination_type'];
        }

        if ($params['thumb_size'] !== '') {
            $slider_classes[] = 'edgtf-post-thumb-size-'.$params['thumb_size'];
        }

        return implode(' ', $slider_classes);
    }
}