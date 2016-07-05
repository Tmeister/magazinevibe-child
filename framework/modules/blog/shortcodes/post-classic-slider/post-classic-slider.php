<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\PostClassicSlider;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostClassicSlider
 */
class PostClassicSlider extends ListShortcode {

	/**
	 * @var string
	 */
    private $base;
    private $css_class;
    private $shortcode_title;

	public function __construct() {
		$this->base = 'edgtf_post_classic_slider';
        $this->css_class = 'edgtf-post-classic-slider';
        $this->shortcode_title = 'Edge Post Classic Slider';

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
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'display_info_box' => 'yes',
			'display_category' => 'yes',
			'display_date' => 'yes',
			'date_format' => 'd M Y',
			'display_author' => 'no',
			'display_comments' => 'no',
			'title_tag' => 'h2',
			'box_background_color' => '',
			'thumb_image_size' => '',
			'thumb_image_width' => '',
			'thumb_image_height' => '',
		);

		$params = shortcode_atts($args, $atts);
        $html = '';

        if($atts['query_result']->have_posts()):
            $html .= '<ul class="edgtf-pcs-slider">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= magazinevibe_edge_get_list_shortcode_module_template_part('templates/post-classic-slider-template', 'post-classic-slider', '', $params);

            endwhile;

            $html .= '</ul>';
        else:
        $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;

        wp_reset_postdata();

        return $html;
	}

    protected function getHolderClasses($params) {

        $slider_classes = array();

        if ($params['number_of_posts'] !== '') {
            $slider_classes[] = 'edgtf-pcs-number-'.$params['number_of_posts'];
        }

        if ($params['display_control'] == 'thumbnails') {
            $slider_classes[] = 'edgtf-pcs-thumbnail';
        }

        if ($params['display_navigation'] == 'yes') {
            $slider_classes[] = 'edgtf-pcs-navigation';
        }

        return implode(' ', $slider_classes);
    }
}