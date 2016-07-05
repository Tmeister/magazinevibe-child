<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\BlockFive;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockFive
 */
class BlockFive extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'edgtf_block_five';
        $this->css_class = 'edgtf-block-five';
        $this->shortcode_title = 'Edge Block 5';

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
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => '',
            'title_tag' => 'h5',
            'display_author' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd M Y',
            'display_rating' => 'yes'
        );

        $params = shortcode_atts($args, $atts);
        $params_featured = shortcode_atts($args_featured, $atts);

        $params_featured_filtered = magazinevibe_edge_get_filtered_params($params_featured, 'featured');

        $html = '';

        $loop_counter = 0;
        if ($atts['query_result']->have_posts()):
            $posts_number = $atts['number_of_posts'];
            $html .= '<div class="edgtf-block-group-holder">';
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
                $loop_counter++;

                if($loop_counter < 3){
                    if($loop_counter === 1) {
                        $html .= '<div class="edgtf-block-five-featured"><ul>';
                    }
                        $html .= '<li>';
                        //Get HTML from template
                        $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-three-template', 'templates', '', $params_featured_filtered);
                        $html .= '</li>';
                    if($loop_counter === 2) {
                        $html .= '</ul>';
                        $html .= '</div>'; // close edgtf-block-five-featured
                        $html .= '<div class="edgtf-block-five-non-featured"><ul>';
                    }
                } else {
                    if($loop_counter === 3 || $loop_counter === 2+intval(round(($posts_number-2)/2)+1)){
                        $html .= '<li>';
                    }
                        //Get HTML from template
                        $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-two-template', 'templates', '', $params);
                    
                    if($loop_counter === 2+intval(round(($posts_number-2)/2))){
                        $html .= '</li>';
                    }
                }

            endwhile;

            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</div>'; // closes edgtf-block-five-non-featured
            $html .= '</div>'; // close edgtf-block-group-holder;

        else:
            $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;

        wp_reset_postdata();

        return $html;
    }
}