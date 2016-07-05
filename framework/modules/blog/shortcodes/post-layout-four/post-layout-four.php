<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\PostLayoutFour;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostLayoutTWo
 */
class PostLayoutFour extends ListShortcode {

    /**
     * @var string
     */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'edgtf_post_layout_four';
        $this->css_class = 'edgtf-post-layout-four';
        $this->shortcode_title = 'Edge Post Layout 4';

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
    public function render($atts, $content = null) {

        $args = array(
            'display_featured_post' => 'yes',
            'display_category' => 'no',
            'display_date' => 'yes',
            'date_format' => 'd M Y',
            'display_author' => 'yes',
            'display_comments' => 'no',
            'title_tag' => 'h5',
            'display_rating' => 'yes',
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => ''

        );

        $params = shortcode_atts($args, $atts);

        $html = '';

        if($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-two-template', 'templates', '', $params);

            endwhile;
        else:
            $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;
        wp_reset_postdata();

        return $html;
    }
}