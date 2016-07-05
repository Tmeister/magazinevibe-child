<?php

if (!function_exists('magazinevibe_edge_get_footer_classes')) {
	/**
	 * Return all footer classes
	 *
	 * @param $page_id
	 * @return string|void
	 */
	function magazinevibe_edge_get_footer_classes($page_id) {

		$footer_classes                     = '';
		$footer_classes_array               = array();

		if(get_post_meta($page_id, 'edgtf_disable_footer_meta', true) == 'yes'){
			$footer_classes_array[] = 'edgtf-disable-footer';
		}

		//is some class added to footer classes array?
		if(is_array($footer_classes_array) && count($footer_classes_array)) {
			//concat all classes and prefix it with class attribute
			$footer_classes = esc_attr(implode(' ', $footer_classes_array));
		}

		return $footer_classes;
	}
}