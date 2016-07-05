<?php

if ( ! function_exists('magazinevibe_edge_header_options_map') ) {

	function magazinevibe_edge_header_options_map() {

		magazinevibe_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => 'Header',
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = magazinevibe_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => 'Header'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_type',
				'default_value' => 'header-type-one',
				'label' => 'Choose Header Type',
				'description' => 'Select header type layout',
				'options' => array(
					'header-type-one' => 'Header Type 1',
					'header-type-two' => 'Header Type 2'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => 'Choose Header Behaviour',
				'description' => 'Select the behaviour of header when you scroll down to page',
				'options' => array(
					'sticky-header-on-scroll-up' => 'Sticky on scrol up',
					'sticky-header-on-scroll-down-up' => 'Sticky on scrol up/down',
					'fixed-on-scroll' => 'Fixed on scroll'
				),
                'hidden_value' => '',
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
					)
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'enable_header_border_bottom',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => 'Enable Bottom Border for Header Area',
				'description' => 'Disabling this option will turn off border bottom for header area',
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_panel_header_border_bottom_container"
				)
			)
		);

			$panel_header_border_bottom_container = magazinevibe_edge_add_admin_container(array(
				'name' => 'panel_header_border_bottom_container',
				'parent' => $panel_header,
				'hidden_property' => 'enable_header_border_bottom',
				'hidden_value' => 'no'
			));

				magazinevibe_edge_add_admin_field(array(
					'name' => 'header_border_bottom_color',
					'type' => 'color',
					'label' => 'Border Color',
					'description' => 'Set bottom border color for header',
					'parent' => $panel_header_border_bottom_container
				));

		magazinevibe_edge_add_admin_section_title(
			array(
				'parent' => $panel_header,
				'name' => 'top_header_area_title',
				'title' => 'Top Bar'
			)
		);		

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => 'Top Bar',
				'description' => 'Enabling this option will show top bar area',
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = magazinevibe_edge_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => 'Top Bar in grid',
				'description' => 'Set top bar content to be in grid',
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = magazinevibe_edge_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => 'Grid Background Color',
			'description' => 'Set grid background color for top bar',
			'parent' => $top_bar_in_grid_container
		));


		magazinevibe_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => 'Grid Background Transparency',
			'description' => 'Set grid background transparency for top bar',
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => 'Background Color',
			'description' => 'Set background color for top bar',
			'parent' => $top_bar_container
		));

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'hide_top_bar_on_mobile',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => 'Hide Top Bar on Mobile Devices',
				'description' => 'Enabling this option you will hide top header area on mobile devices',
				'parent' => $top_bar_container
			)
		);

		magazinevibe_edge_add_admin_section_title(
			array(
				'parent' => $panel_header,
				'name' => 'logo_area_title',
				'title' => 'Logo Area'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'logo_area_in_grid_header_type3',
				'default_value' => 'yes',
				'label' => 'Logo area in grid',
				'description' => 'Set logo area content to be in grid',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_logo_area_in_grid_header_type3_container'
				)
			)
		);

		$logo_area_in_grid_header_type3_container = magazinevibe_edge_add_admin_container(
			array(
				'parent' => $panel_header,
				'name' => 'logo_area_in_grid_header_type3_container',
				'hidden_property' => 'logo_area_in_grid_header_type3',
				'hidden_value' => 'no'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $logo_area_in_grid_header_type3_container,
				'type' => 'color',
				'name' => 'logo_area_grid_background_color_header_type3',
				'default_value' => '',
				'label' => 'Grid Background color',
				'description' => 'Set grid background color for logo area',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $logo_area_in_grid_header_type3_container,
				'type' => 'text',
				'name' => 'logo_area_grid_background_transparency_header_type3',
				'default_value' => '',
				'label' => 'Grid background transparency (0-1)',
				'description' => 'Set grid background transparency for logo area',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'color',
				'name' => 'logo_area_background_color_header_type3',
				'default_value' => '',
				'label' => 'Background color',
				'description' => 'Set background color for logo area',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'text',
				'name' => 'logo_area_background_transparency_header_type3',
				'default_value' => '',
				'label' => 'Background transparency',
				'description' => 'Set background transparency for logo area',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'text',
				'name' => 'logo_area_height_header_type3',
				'default_value' => '',
				'label' => 'Height',
				'description' => 'Enter logo area height (default is 220px)',
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_section_title(
			array(
				'parent' => $panel_header,
				'name' => 'menu_area_title',
				'title' => 'Menu Area'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_type3',
				'default_value' => 'no',
				'label' => 'Menu area in grid',
				'description' => 'Set menu area content to be in grid',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_type3_container'
				)
			)
		);

		$menu_area_in_grid_header_type3_container = magazinevibe_edge_add_admin_container(
			array(
				'parent' => $panel_header,
				'name' => 'menu_area_in_grid_header_type3_container',
				'hidden_property' => 'menu_area_in_grid_header_type3',
				'hidden_value' => 'no'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_type3_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_type3',
				'default_value' => '',
				'label' => 'Grid Background color',
				'description' => 'Set grid background color for menu area',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_type3_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_type3',
				'default_value' => '',
				'label' => 'Grid background transparency',
				'description' => 'Set grid background transparency for menu area',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_type3',
				'default_value' => '',
				'label' => 'Background color',
				'description' => 'Set background color for menu area'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_type3',
				'default_value' => '',
				'label' => 'Background transparency',
				'description' => 'Set background transparency for menu area',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'text',
				'name' => 'menu_area_height_header_type3',
				'default_value' => '',
				'label' => 'Height',
				'description' => 'Enter menu area height (default is 60px)',
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_sticky_header = magazinevibe_edge_add_admin_panel(
			array(
				'title' => 'Sticky Header',
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => 'Scroll Amount for Sticky',
				'description' => 'Enter scroll amount for Sticky Menu to appear (deafult is header height)',
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => 'Sticky Header in grid',
				'description' => 'Set sticky header content to be in grid',
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = magazinevibe_edge_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => 'Grid Background Color',
			'description' => 'Set grid background color for sticky header',
			'parent' => $sticky_header_in_grid_container
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => 'Sticky Header Grid Transparency',
			'description' => 'Enter transparency for sticky header grid (value from 0 to 1)',
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => 'Background Color',
			'description' => 'Set background color for sticky header',
			'parent' => $panel_sticky_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => 'Sticky Header Transparency',
			'description' => 'Enter transparency for sticky header (value from 0 to 1)',
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => 'Sticky Header Height',
			'description' => 'Enter height for sticky header (default is 60px)',
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = magazinevibe_edge_add_admin_group(array(
			'title' => 'Sticky Header Menu',
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => 'Define styles for sticky menu items',
		));

		$row1_sticky_header_menu = magazinevibe_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => 'Text Color',
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => 'Hover/Active color',
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = magazinevibe_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		magazinevibe_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => 'Font Family',
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => 'Font Size',
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => 'Line height',
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => 'Text transform',
				'default_value' => '',
				'options' => magazinevibe_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = magazinevibe_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		magazinevibe_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => magazinevibe_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => magazinevibe_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => 'Letter Spacing',
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = magazinevibe_edge_add_admin_panel(
			array(
				'title' => 'Fixed Header',
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		magazinevibe_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => 'Grid Background Color',
			'description' => 'Set grid background color for fixed header',
			'parent' => $panel_fixed_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => 'Header Transparency Grid',
			'description' => 'Enter transparency for fixed header grid (value from 0 to 1)',
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => 'Background Color',
			'description' => 'Set background color for fixed header',
			'parent' => $panel_fixed_header
		));

		magazinevibe_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => 'Header Transparency',
			'description' => 'Enter transparency for fixed header (value from 0 to 1)',
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = magazinevibe_edge_add_admin_panel(
			array(
				'title' => 'Main Menu',
				'name' => 'panel_main_menu',
				'page' => '_header_page'
			)
		);

		magazinevibe_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => 'Main Menu General Settings'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_menu_item_text_decoration',
				'default_value' => 'no',
				'label' => 'Enable 1st Level Menu Item Text Decoration',
				'description' => 'Enable this option and choose a text decoration for menu items in first level',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_item_text_decoration_container'
				)
			)
		);

		$menu_item_text_decoration_container = magazinevibe_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_text_decoration_container',
				'hidden_property' => 'enable_menu_item_text_decoration',
				'hidden_value' => 'no'
			)
		);

		$text_decoration_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $menu_item_text_decoration_container,
				'name' => 'group_text_decoration',
				'title' => 'Menu Item Text Decoration',
			)
		);

		$text_decoration_row = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $text_decoration_group,
				'name' => 'text_decoration_row',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $text_decoration_row,
				'type' => 'selectsimple',
				'name' => 'menu_item_text_decoration_style',
				'default_value' => 'none',
				'label' => 'Hover Item Text Decoration',
				'description' => 'Choose text decoration type for hover menu items',
				'options' => array(
					'none' => 'None',
					'underline' => 'Underline',
					'line-through' => 'Line-through',
					'overline' => 'Overline'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $text_decoration_row,
				'type' => 'selectsimple',
				'name' => 'menu_item_active_text_decoration_style',
				'default_value' => 'none',
				'label' => 'Active Item Text Decoration',
				'description' => 'Choose text decoration type for active menu items',
				'options' => array(
					'none' => 'None',
					'underline' => 'Underline',
					'line-through' => 'Line-through',
					'overline' => 'Overline'
				)
			)
		);

		$drop_down_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => 'Main Dropdown Menu',
				'description' => 'Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)'
			)
		);

		$drop_down_row1 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => 'Background Color',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => 'Transparency',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => 'Item Bottom Separator Color',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_vertical_separator_color',
				'default_value' => '',
				'label' => 'Item Vertical Separator Color',
			)
		);

		$drop_down_row2 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row2',
				'next' => true
			)
		);

		$drop_down_padding_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => 'Main Dropdown Menu Padding',
				'description' => 'Choose a top/bottom padding for dropdown menu'
			)
		);

		$drop_down_padding_row = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => 'Top Padding',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => 'Bottom Padding',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => 'Main Dropdown Menu Appearance',
				'description' => 'Choose appearance for dropdown menu',
				'options' => array(
					'dropdown-default' => 'Default',
					'dropdown-animate-height' => 'Animate Height'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => 'Dropdown position',
				'description' => 'Enter value in percentage of entire header height',
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_dropdown_menu_item_icon',
				'default_value' => 'yes',
				'label' => 'Enable Arrow Icon for Dropdown Menu',
				'description' => 'Enabling this option will display an arrow icon for 1st level menu items which have a dropdown menu'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_dropdown_top_separator',
				'default_value' => 'yes',
				'label' => 'Enable Dropdown Top Separator',
				'description' => 'Enabling this option will display top separator for second level in dropdown menu',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_dropdown_top_separator_container'
				)
			)
		);

		$enable_dropdown_top_separator_container = magazinevibe_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'enable_dropdown_top_separator_container',
				'hidden_property' => 'enable_dropdown_top_separator',
				'hidden_value' => 'no'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $enable_dropdown_top_separator_container,
				'type' => 'color',
				'name' => 'dropdown_top_separator_color',
				'default_value' => '',
				'label' => 'Dropdown Top Separator Color',
				'description' => 'Choose color for top separator',
			)
		);

		$first_level_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => '1st Level Menu',
				'description' => 'Define styles for 1st level in Top Navigation Menu'
			)
		);

		$first_level_row1 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => 'Text Color',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => 'Hover Text Color',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => 'Active Text Color',
			)
		);

		$first_level_row2 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => 'Text Background Color',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => 'Hover Text Background Color',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => 'Active Text Background Color',
			)
		);

		$first_level_row5 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => 'Hover Background Color Transparency',
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => 'Active Background Color Transparency',
			)
		);

		$first_level_row6 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => magazinevibe_edge_get_font_style_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => magazinevibe_edge_get_font_weight_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => 'Letter Spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => magazinevibe_edge_get_text_transform_array()
			)
		);

		$first_level_row7 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => 'Padding Left/Right',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => 'Margin Left/Right',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => '2nd Level Menu',
				'description' => 'Define styles for 2nd level in Top Navigation Menu'
			)
		);

		$second_level_row1 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$second_level_row2 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => 'Font style',
				'options' => magazinevibe_edge_get_font_style_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => magazinevibe_edge_get_font_weight_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => magazinevibe_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => '2nd Level Wide Menu',
				'description' => 'Define styles for 2nd level in Wide Menu'
			)
		);

		$second_level_wide_row1 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$second_level_wide_row2 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => 'Font style',
				'options' => magazinevibe_edge_get_font_style_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => magazinevibe_edge_get_font_weight_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => magazinevibe_edge_get_text_transform_array()
			)
		);

		$third_level_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => '3nd Level Menu',
				'description' => 'Define styles for 3nd level in Top Navigation Menu'
			)
		);

		$third_level_row1 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$third_level_row2 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => 'Font style',
				'options' => magazinevibe_edge_get_font_style_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => magazinevibe_edge_get_font_weight_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => magazinevibe_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = magazinevibe_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => '3rd Level Wide Menu',
				'description' => 'Define styles for 3rd level in Wide Menu'
			)
		);

		$third_level_wide_row1 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$third_level_wide_row2 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = magazinevibe_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => 'Font style',
				'options' => magazinevibe_edge_get_font_style_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => magazinevibe_edge_get_font_weight_array()
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		magazinevibe_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => magazinevibe_edge_get_text_transform_array()
			)
		);

	}

	add_action( 'magazinevibe_edge_options_map', 'magazinevibe_edge_header_options_map', 4);

}