<?php
namespace MagazineVibe\Modules\Blog\Shortcodes\PostSplitSlider;

use MagazineVibe\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostSplitSlider
 */
class PostSplitSlider extends ListShortcode {

	/**
	 * @var string
	 */
    private $base;
    private $css_class;
    private $shortcode_title;

	public function __construct() {
		$this->base = 'edgtf_post_split_slider';
        $this->css_class = 'edgtf-pss';
        $this->shortcode_title = 'Edge Post Split Slider';

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
			'display_category' => 'yes',
			'display_date' => 'yes',
			'date_format' => 'M d, Y',
			'display_author' => 'yes',
			'display_comments' => 'yes',
			'title_tag' => 'h2',
			'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => ''
		);

		$params = shortcode_atts($args, $atts);

        $html = '';

        if($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
                //Get HTML from template
		        $html .= magazinevibe_edge_get_list_shortcode_module_template_part('templates/post-split-slider-template', 'post-split-slider', '', $params);

            endwhile;
        else:
            $html .= '<div class="'.$this->css_class.'-message"><p>'.esc_html__('No posts were found.', 'magazinevibe').'</p></div>';
        endif;
        wp_reset_postdata();

        return $html;
	}

    /** Overwrite
     * Generates holder classes
     *
     * @param $params
     *
     * @return string
     */

	protected function getHolderClasses($params){
		$holderClasses = array();

        if($params['display_navigation'] === 'no') {
            $holderClasses[] = 'edgtf-pss-navigation-disabled';
        }

        if($params['slide_proportion'] !== '') {
            $holderClasses[] = 'edgtf-'.$params['slide_proportion'];
        } else {
            $holderClasses[] = 'edgtf-two_third_one_third';
        }

        return implode(' ', $holderClasses);
	}

    /** Overwrite
     * Return all configuration data for slider
     *
     * @param $params
     * @return array
     */
    protected function generatePostsData($params) {

        $slider_data = array();

        $slider_data['data-slideproportion'] = ($params['slide_proportion'] !== '') ? $params['slide_proportion'] : 'two_third_one_third';

        return $slider_data;
    }
}