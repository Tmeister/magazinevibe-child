<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\BlockTwo;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockTwo
 */
class BlockTwo extends ListShortcode {

    /**
     * @var string
     */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'edgtf_block_two';
        $this->css_class = 'edgtf-block-two';
        $this->shortcode_title = 'Edge Block 2';

        parent::__construct($this->base, $this->css_class, $this->shortcode_title);

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * add params for shortcode in next function
     *
     * @see magazinevibe_edge_get_shortcode_params()
     */

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     *
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'display_category' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd M Y',
            'display_author' => 'no',
            'display_comments' => 'yes',
            'display_social_share' => 'yes',
            'display_like' => 'yes',
            'display_excerpt' => 'yes',
            'excerpt_length' => '50',
            'title_tag' => 'h3',
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => ''
        );

        $params = shortcode_atts($args, $atts);
        $html = '';

        if($atts['query_result']->have_posts()):

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-three-template', 'templates', '', $params);

            endwhile;
        else:
            $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;
        wp_reset_postdata();

        return $html;
    }
}