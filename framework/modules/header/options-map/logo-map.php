<?php

if ( ! function_exists('magazinevibe_edge_logo_options_map') ) {

	function magazinevibe_edge_logo_options_map() {

		magazinevibe_edge_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => 'Logo',
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = magazinevibe_edge_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => 'Logo'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => 'Hide Logo',
				'description' => 'Enabling this option will hide logo image',
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = magazinevibe_edge_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => 'Logo Image - Default',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo_sticky.png",
				'label' => 'Logo Image - Sticky',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo_sticky.png",
				'label' => 'Logo Image - Mobile',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'logo_image_top_padding',
			'type'        => 'text',
			'label'       => 'Top Padding For Non-Scrolled Logo',
			'description' => 'Enter top padding value to move your logo image down in pixels.',
			'parent'      => $hide_logo_container,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

	}

	add_action( 'magazinevibe_edge_options_map', 'magazinevibe_edge_logo_options_map', 2);
}