<?php
namespace MagazineVibe\Modules\SectionTitle;

use MagazineVibe\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class ExpandingVideoPost
 */
class SectionTitle implements ShortcodeInterface{
    /**
     * @var string
     */
	private $base;

	function __construct() {
		$this->base = 'edgtf_section_title';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /*
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     */

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge Section Title', 'magazinevibe'),
            'base' => $this->getBase(),
			'icon' => 'icon-wpb-section-title extended-custom-icon',
			'category' => 'by EDGE',
			'allowed_container_element' => 'vc_row',
			'params' => array(
                array(
                    'type'       => 'textfield',
                    'heading'    => 'Title',
                    'param_name' => 'title',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Title Tag',
                    'param_name' => 'title_tag',
                    'value' => array(
                        'Default'   => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => '',
                    'dependency' => array('element' => 'title', 'not_empty' => true),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Link Address',
                    'param_name'  => 'link_address',
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Link Text',
                    'param_name'  => 'link_text',
                    'admin_label' => true,
                    'value'       => 'Read More',
                    'save_always' => true,
                    'dependency' => array('element' => 'link_address', 'not_empty' => true)

                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => 'Link Target',
                    'param_name'  => 'link_target',
                    'value'       => array(
                        'Same Window'  => '_self',
                        'New Window' => '_blank'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'dependency' => array('element' => 'link_address', 'not_empty' => true)
                ),
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
            'title' => '',
            'title_tag' => 'h6',
            'link_address' => '',
            'link_text' => 'Read More',
            'link_target' => '_self',
        );

        $params = shortcode_atts($args, $atts);

        //Get HTML from template
        $html = magazinevibe_edge_get_shortcode_module_template_part('templates/section-title-template', 'section-title', '', $params);

        return $html;
    }
	
}

