<?php

if ( ! function_exists('magazinevibe_edge_mobile_header_options_map') ) {

	function magazinevibe_edge_mobile_header_options_map() {

		magazinevibe_edge_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => 'Mobile Header',
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = magazinevibe_edge_add_admin_panel(array(
			'title' => 'Mobile header',
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => 'Mobile Header Height',
			'description' => 'Enter height for mobile header in pixels',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => 'Mobile Header Background Color',
			'description' => 'Choose color for mobile header',
			'parent'      => $panel_mobile_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => 'Mobile Menu Background Color',
			'description' => 'Choose color for mobile menu',
			'parent'      => $panel_mobile_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => 'Mobile Menu Item Separator Color',
			'description' => 'Choose color for mobile menu horizontal separators',
			'parent'      => $panel_mobile_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => 'Logo Height For Mobile Header',
			'description' => 'Define logo height for screen size smaller than 1000px',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => 'Logo Height For Mobile Devices',
			'description' => 'Define logo height for screen size smaller than 480px',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		magazinevibe_edge_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => 'Typography'
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => 'Navigation Text Color',
			'description' => 'Define color for mobile navigation text',
			'parent'      => $panel_mobile_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => 'Navigation Hover/Active Color',
			'description' => 'Define hover/active color for mobile navigation text',
			'parent'      => $panel_mobile_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => 'Navigation Font Family',
			'description' => 'Define font family for mobile navigation text',
			'parent'      => $panel_mobile_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => 'Navigation Font Size',
			'description' => 'Define font size for mobile navigation text',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => 'Navigation Line Height',
			'description' => 'Define line height for mobile navigation text',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => 'Navigation Text Transform',
			'description' => 'Define text transform for mobile navigation text',
			'parent'      => $panel_mobile_header,
			'options'     => magazinevibe_edge_get_text_transform_array(true)
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => 'Navigation Font Style',
			'description' => 'Define font style for mobile navigation text',
			'parent'      => $panel_mobile_header,
			'options'     => magazinevibe_edge_get_font_style_array(true)
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => 'Navigation Font Weight',
			'description' => 'Define font weight for mobile navigation text',
			'parent'      => $panel_mobile_header,
			'options'     => magazinevibe_edge_get_font_weight_array(true)
		));

		magazinevibe_edge_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => 'Mobile Menu Opener'
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_menu_title',
			'type'        => 'text',
			'label'       => 'Mobile Navigation Title',
			'description' => 'Enter title for mobile menu navigation',
			'parent'      => $panel_mobile_header,
			'default_value' => 'MENU',
			'args' => array(
				'col_width' => 3
			)
		));

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_mobile_header,
				'type' => 'yesno',
				'name' => 'enable_mobile_menu_icon',
				'default_value' => 'no',
				'label' => 'Enable Custom Mobile Navigation Icon',
				'description' => 'Enabling this option you will show custom icon for mobile navigation',
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_show_mobile_menu_icon_container"
				)
			)
		);

		$show_mobile_menu_icon_container = magazinevibe_edge_add_admin_container(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'show_mobile_menu_icon_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label'       => 'Mobile Navigation Icon Pack',
			'default_value' => 'font_elegant',
			'description' => 'Choose icon pack for mobile navigation icon',
			'parent'      => $show_mobile_menu_icon_container,
			'options'     => magazinevibe_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => 'Mobile Navigation Icon Color',
			'description' => 'Choose color for icon header',
			'parent'      => $show_mobile_menu_icon_container
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => 'Mobile Navigation Icon Hover Color',
			'description' => 'Choose hover color for mobile navigation icon ',
			'parent'      => $show_mobile_menu_icon_container
		));

		magazinevibe_edge_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => 'Mobile Navigation Icon size',
			'description' => 'Choose size for mobile navigation icon ',
			'parent'      => $show_mobile_menu_icon_container,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));
	}

	add_action( 'magazinevibe_edge_options_map', 'magazinevibe_edge_mobile_header_options_map', 5);
}