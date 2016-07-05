<?php
namespace MagazineVibe\Modules\ExpandingVideoPost;

use MagazineVibe\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class ExpandingVideoPost
 */
class ExpandingVideoPost implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_expanding_video_post';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Edge Expanding Video Post', 'magazinevibe'),
				'base' => $this->getBase(),
				'category' => 'by EDGE',
				'icon' => 'icon-wpb-expanding-video-post extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => 'Video Post ID',
						'param_name' => 'post_in',
						'description' => 'Enter the ID of the video post format you want to display'
					),
					array(
		                'type' => 'dropdown',
		                'heading' => 'Display Category',
		                'param_name' => 'display_category',
		                'value' => array(
		                    'Yes' => 'yes',
		                    'No' => 'no'
		                ),
                        'save_always'	=> true,
		                'description' => ''
		            ),
		            array(
		                'type' => 'dropdown',
		                'heading' => 'Display Date',
		                'param_name' => 'display_date',
		                'value' => array(
		                    'Yes' => 'yes',
		                    'No' => 'no'
		                ),
                        'save_always'	=> true,
		                'description' => ''
		            ),
					array(
						'type' => 'dropdown',
						'heading' => 'Title Tag',
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'description' => ''
					)
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'post_in' => '',
			'display_category' => 'yes',
			'display_date' => 'yes',
			'title_tag' => 'h3',
		);

		$params = shortcode_atts($args, $atts);

		$queryArray = $this->generateQueryArray($params);
		$queryResult = new \WP_Query($queryArray);
		$params['query_result'] = $queryResult;

		//Get HTML from template
		$html = magazinevibe_edge_get_shortcode_module_template_part('templates/expanding-video-post-template', 'expanding-video-post', '', $params);

		return $html;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateQueryArray($params){

		$queryArray = array();

		if($params['post_in'] !== '') {
			$queryArray['p'] = $params['post_in'];
        }
		
		return $queryArray;
	}
}