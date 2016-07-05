<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\BlockFour;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockFour
 */
class BlockFour extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'edgtf_block_four';
        $this->css_class = 'edgtf-block-four';
        $this->shortcode_title = 'Edge Block 4';

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

        $args_featured = array(
            'featured_title_tag' => 'h3',
            'featured_thumb_image_size' => '',
            'featured_thumb_image_width' => '',
            'featured_thumb_image_height' => '',
            'featured_display_category' => 'yes',
            'featured_display_date' => 'yes',
            'featured_date_format' => 'd M Y',
            'featured_display_comments' => 'yes',
            'featured_display_like' => 'yes',
            'featured_display_social_share' => 'yes',
            'featured_display_excerpt' => 'yes',
            'featured_excerpt_length' => '50'
        );

        $args = array(
            'title_tag' => 'h5',
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => '',
            'display_author' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd M Y'
        );

        $params = shortcode_atts($args, $atts);
        $params_featured = shortcode_atts($args_featured, $atts);

        $params_featured_filtered = magazinevibe_edge_get_filtered_params($params_featured, 'featured');

        $html = '';

        $loop_counter = 0;
        if ($atts['query_result']->have_posts()):

            $html .= '<ul>';
            
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
                $loop_counter++;

                if($loop_counter == 1){
                    $html .= '<li class="edgtf-block-four-featured">';
                        //Get HTML from template
                        $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-three-template', 'templates', '', $params_featured_filtered);
                    $html .= '</li>';
                    $html .= '<li class="edgtf-block-four-non-featured">';
                } else {
                    //Get HTML from template
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-minimal-template', 'templates', '', $params);
                }

            endwhile;
            
            $html .= '</li>';
            $html .= '</ul>';

        else:
            $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;

        wp_reset_postdata();

        return $html;
    }
}