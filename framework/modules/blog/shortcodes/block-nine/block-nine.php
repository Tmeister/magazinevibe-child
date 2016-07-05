<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\BlockNine;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockNine
 */
class BlockNine extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'edgtf_block_nine';
        $this->css_class = 'edgtf-block-nine';
        $this->shortcode_title = 'Edge Block 9';

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
            'title_tag' => 'h5',
            'display_author' => 'yes',
            'display_rating' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd M Y'
        );

        $params = shortcode_atts($args, $atts);

        $html = '';

        $loop_counter = 0;
        if ($atts['query_result']->have_posts()):
            $posts_number = $atts['number_of_posts'];

            $html .= '<ul>';
            
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
                $loop_counter++;

                if($loop_counter === 1){
                    $html .= '<li class="edgtf-block-nine-first-column">';
                }

                if($loop_counter < intval(round($posts_number/2)+1)) {
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-two-template', 'templates', '', $params);

                    if($loop_counter === intval(round($posts_number/2))){
                        $html .= '</li>';
                        $html .= '<li class="edgtf-block-nine-second-column">';
                    }
                } else {
                    $html .= magazinevibe_edge_get_list_shortcode_module_template_part('post-example-item-two-template', 'templates', '', $params);
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