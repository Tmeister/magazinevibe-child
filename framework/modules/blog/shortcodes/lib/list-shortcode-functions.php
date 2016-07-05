<?php

if(!function_exists('magazinevibe_edge_get_shortcode_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */

    function magazinevibe_edge_get_shortcode_params($signature){

        switch($signature){
            case "edgtf_block_one":
                return magazinevibe_edge_get_block_one_params();
                break;
            case "edgtf_block_two":
                return magazinevibe_edge_get_block_two_params();
                break;
            case "edgtf_block_three":
                return magazinevibe_edge_get_block_three_params();
                break;
            case "edgtf_block_four":
                return magazinevibe_edge_get_block_four_params();
                break;
            case "edgtf_block_five":
                return magazinevibe_edge_get_block_five_params();
                break;
            case "edgtf_block_six":
                return magazinevibe_edge_get_block_six_params();
                break;
            case "edgtf_block_seven":
                return magazinevibe_edge_get_block_seven_params();
                break;
            case "edgtf_block_eight":
                return magazinevibe_edge_get_block_eight_params();
                break;
            case "edgtf_block_nine":
                return magazinevibe_edge_get_block_nine_params();
                break;
            case "edgtf_block_ten":
                return magazinevibe_edge_get_block_ten_params();
                break;
            case "edgtf_post_classic_slider":
                return magazinevibe_edge_get_classic_slider_params();
                break;
            default:
                return magazinevibe_edge_get_shortcode_params_default($signature);
                break;
        }
    }
}

if(!function_exists('magazinevibe_edge_get_block_one_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_one_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );
            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );

            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'thumb_image_width',
                'description' => 'Set custom image width (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Non-Featured Items'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'thumb_image_height',
                'description' => 'Set custom image height (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
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
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Like',
                'param_name' => 'display_like',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                'group' => 'Non-Featured Items',
                'save_always' => true,
            );

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_two_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_two_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'	=> true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Number of Columns",
                "param_name" => "column_number",
                "value" => array(
                    "" => "",
                    "One" => 1,
                    "Two" => 2,
                    "Three" => 3,
                    "Four" => 4,
                    "Five" => 5
                ),
                "description" => "This option don't work for rating shortcode",
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'	=> true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'	=> true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );

            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always'	=> true,
                'description' => '',
                'group'       => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'thumb_image_width',
                'description' => 'Set custom image width (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group'       => 'Post Options'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'thumb_image_height',
                'description' => 'Set custom image height (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group'       => 'Post Options'
            );

            $params_array[] = array(
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
                'group'       => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Post Options',
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group'       => 'Post Options',
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group'       => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Like',
                'param_name' => 'display_like',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Post Options'
            );
            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                'group' => 'Post Options',
                'save_always' => true,
            );

        // NON-FEATURED POSTS OPTIONS - START

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_three_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_three_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'	=> true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'	=> true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'	=> true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'featured_display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'featured_display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                "type" => "colorpicker",
                "heading" => "Title Box Background Color",
                "param_name" => "featured_box_background_color",
                'group' => 'Featured Item'
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            // without offset - only for templates and load more
            $params_array[] = array(
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
                'group' => 'Non-Featured Items',
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items',
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items',
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items',
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items',
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items',
            );

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_four_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_four_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'featured_display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Like',
                'param_name' => 'featured_display_like',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'featured_display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'featured_excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'featured_display_excerpt', 'value' => array('yes')),
                'group' => 'Featured Item',
                'save_always' => true,
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
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
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items'
            );

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_five_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_five_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'featured_display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Like',
                'param_name' => 'featured_display_like',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'featured_display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'featured_excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'featured_display_excerpt', 'value' => array('yes')),
                'group' => 'Featured Item',
                'save_always' => true,
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
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
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Rating",
                "param_name" => "display_rating",
                "value" => array(
                    "Default" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
                'group' => 'Non-Featured Items'
            );

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_six_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_six_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'featured_display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Like',
                'param_name' => 'featured_display_like',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'featured_display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group'       => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'featured_excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'featured_display_excerpt', 'value' => array('yes')),
                'group' => 'Featured Item',
                'save_always' => true,
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'thumb_image_width',
                'description' => 'Set custom image width (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Non-Featured Items'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'thumb_image_height',
                'description' => 'Set custom image height (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
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
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Rating",
                "param_name" => "display_rating",
                "value" => array(
                    "Default" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
                'group' => 'Non-Featured Items'
            );

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_seven_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_seven_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'featured_display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Rating",
                "param_name" => "featured_display_rating",
                "value" => array(
                    "Default" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
                'group' => 'Featured Item'
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
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
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items'
            );

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination',
                'param_name' => 'display_pagination',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'save_always'	=> true,
                'description' => '',
                'group' => 'Pagination'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => 'Pagination Type',
                'param_name' => 'pagination_type',
                'value' => array(
                    'Horizontal Navigation' => 'edgtf-next-prev-horizontal',
                    'Vertical Navigation' => 'edgtf-next-prev',
                    'Load More' => 'edgtf-load-more',
                    'Infinite Scroll' => 'edgtf-infinite-scroll'
                ),
                'description' => '',
                'save_always'	=> true,
                'dependency' => array('element' => 'display_pagination', 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_eight_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_eight_params()
    {

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always' => true,
                'group' => 'General'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always' => true,
                'group' => 'General'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                'group' => 'General'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always' => true,
                'group' => 'General'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                'group' => 'General'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                'group' => 'General'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                'group' => 'General'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                'group' => 'General'
            );
        // without offset - only for templates and load more

        // GENERAL OPTIONS - END


        // FEATURED POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'featured_display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'featured_display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                "type" => "colorpicker",
                "heading" => "Title Box Background Color",
                "param_name" => "featured_box_background_color",
                'group' => 'Featured Item'
            );

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'thumb_image_width',
                'description' => 'Set custom image width (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Non-Featured Items'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'thumb_image_height',
                'description' => 'Set custom image height (px)',
                'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Non-Featured Items'
            );
            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                'group' => 'Non-Featured Items',
                'save_always' => true,
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Rating",
                "param_name" => "display_rating",
                "value" => array(
                    "Default" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
                'group' => 'Non-Featured Items'
            );

        // NON-FEATURED POSTS OPTIONS - END


        // PAGINATION OPTIONS - START


            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Pagination",
                "param_name" => "display_pagination",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                'save_always' => true,
                "description" => "",
                'group' => 'Pagination'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Pagination Type",
                "param_name" => "pagination_type",
                "value" => array(
                    "Horizontal Navigation" => "edgtf-next-prev-horizontal",
                    "Vertical Navigation" => "edgtf-next-prev",
                    "Load More" => "edgtf-load-more",
                    "Infinite Scroll" => "edgtf-infinite-scroll"
                ),
                "description" => "",
                'save_always' => true,
                "dependency" => array('element' => "display_pagination", 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_nine_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_nine_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // POST OPTIONS - START

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Post Options'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Rating",
                "param_name" => "display_rating",
                "value" => array(
                    "Default" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
                'group' => 'Post Options'
            );

        // POST OPTIONS - END

        // PAGINATION OPTIONS - START

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Pagination",
                "param_name" => "display_pagination",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                'save_always' => true,
                "description" => "",
                'group' => 'Pagination'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Pagination Type",
                "param_name" => "pagination_type",
                "value" => array(
                    "Horizontal Navigation" => "edgtf-next-prev-horizontal",
                    "Vertical Navigation" => "edgtf-next-prev",
                    "Load More" => "edgtf-load-more",
                    "Infinite Scroll" => "edgtf-infinite-scroll"
                ),
                "description" => "",
                'save_always' => true,
                "dependency" => array('element' => "display_pagination", 'value' => array('yes')),
                'group' => 'Pagination'
            );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_block_ten_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_block_ten_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Category",
                "value" => magazinevibe_edge_get_post_categories_VC(),
                "param_name" => "category_id",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Category Slug',
                'param_name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Choose Author",
                "param_name" => "author_id",
                "value" => magazinevibe_edge_get_authors_VC(),
                "description" => "",
                'save_always'   => true,
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Tag Slug',
                'param_name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Include Posts',
                'param_name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display',
                "group" => "General"
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Exclude Posts',
                'param_name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude',
                "group" => "General"
            );

            $params_array[] = array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => "Sort",
                "param_name" => "sort",
                "value" => magazinevibe_edge_get_sort_array(),
                "description" => "",
                "group" => "General"
            );
            // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // POSTS OPTIONS - START

            $params_array[] = array(
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
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
                'group' => 'Post Options'
            );

        // POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_array[] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Pagination",
            "param_name" => "display_pagination",
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            'save_always' => true,
            "description" => "",
            'group' => 'Pagination'
        );

        $params_array[] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Pagination Type",
            "param_name" => "pagination_type",
            "value" => array(
                "Horizontal Navigation" => "edgtf-next-prev-horizontal",
                "Vertical Navigation" => "edgtf-next-prev",
                "Load More" => "edgtf-load-more",
                "Infinite Scroll" => "edgtf-infinite-scroll"
            ),
            "description" => "",
            'save_always' => true,
            "dependency" => array('element' => "display_pagination", 'value' => array('yes')),
            'group' => 'Pagination'
        );

        // PAGINATION OPTIONS - END

        return $params_array;
    }
}

if(!function_exists('magazinevibe_edge_get_classic_slider_params')){
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function magazinevibe_edge_get_classic_slider_params(){

        $params_array = array();

        // GENERAL OPTIONS - START

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Number of Posts',
            'param_name' => 'number_of_posts',
            'description' => '',
            'value' => '4',
            'save_always' => true,
            'group' => 'General'
        );

        $params_array[] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Category",
            "value" => magazinevibe_edge_get_post_categories_VC(),
            "param_name" => "category_id",
            'save_always'	=> true,
            'group' => 'General'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Category Slug',
            'param_name' => 'category_slug',
            'description' => 'Leave empty for all or use comma for list',
            'group' => 'General'
        );

        $params_array[] = array(
            "type" => "dropdown",
            "admin_label" => true,
            "class" => "",
            "heading" => "Choose Author",
            "param_name" => "author_id",
            "value" => magazinevibe_edge_get_authors_VC(),
            "description" => "",
            'save_always'	=> true,
            'group' => 'General'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Tag Slug',
            'param_name' => 'tag_slug',
            'description' => 'Leave empty for all or use comma for list',
            'group' => 'General'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Include Posts',
            'param_name' => 'post_in',
            'description' => 'Enter the IDs of the posts you want to display',
            'group' => 'General'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Exclude Posts',
            'param_name' => 'post_not_in',
            'description' => 'Enter the IDs of the posts you want to exclude',
            'group' => 'General'
        );

        $params_array[] = array(
            "type" => "dropdown",
            "admin_label" => true,
            "class" => "",
            "heading" => "Sort",
            "param_name" => "sort",
            "value" => magazinevibe_edge_get_sort_array(),
            "description" => "",
            'group' => 'General'
        );

        // without offset - only for templates and load more

        // GENERAL OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Image Size',
            'param_name' => 'thumb_image_size',
            'value' => array(
                'Original' => 'original',
                'Landscape' => 'landscape',
                'Square' => 'square',
                'Custom' => 'custom_size'
            ),
            'save_always'	=> true,
            'description' => '',
            'group'       => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Image Width (px)',
            'param_name' => 'thumb_image_width',
            'description' => 'Set custom image width (px)',
            'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
            'group' => 'Post Options'
        );


        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Image Height (px)',
            'param_name' => 'thumb_image_height',
            'description' => 'Set custom image height (px)',
            'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
            'group' => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Enable Info Box',
            'param_name' => 'display_info_box',
            'value' => array(
                'Yes'   => 'yes',
                'No' => 'no'
            ),
            'description' => '',
            'group'       => 'Post Options'
        );

        $params_array[] = array(
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
            'dependency' => array('element' => 'display_info_box', 'value' => array('yes')),
            'group'       => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Category',
            'param_name' => 'display_category',
            'value' => array(
                'Default' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            'description' => '',
            'group'       => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Date',
            'param_name' => 'display_date',
            'value' => array(
                'Default' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            'description' => '',
            'dependency' => array('element' => 'display_info_box', 'value' => array('yes','')),
            'group'       => 'Post Options',
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Date Format',
            'param_name' => 'date_format',
            'description' => 'Enter the date format that you want to display',
            'dependency' => array('element' => 'display_date', 'value' => array('yes')),
            'group'       => 'Post Options',
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Author',
            'param_name' => 'display_author',
            'value' => array(
                'Default' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            'description' => '',
            'dependency' => array('element' => 'display_info_box', 'value' => array('yes')),
            'group'       => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Comments',
            'param_name' => 'display_comments',
            'value' => array(
                'Default' => '',
                'No' => 'no',
                'Yes' => 'yes',
            ),
            'description' => '',
            'dependency' => array('element' => 'display_info_box', 'value' => array('yes')),
            'group'       => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Navigation',
            'param_name' => 'display_navigation',
            'value' => array(
                'Yes' => 'yes',
                'No' => 'no',
            ),
            'description' => '',
            'save_always' => true,
            'group'       => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Slider Control',
            'param_name' => 'display_control',
            'value' => array(
                'No' => 'no',
                'Thumbnails' => 'thumbnails',
                'Paging' => 'paging'
            ),
            'description' => '',
            'save_always' => true,
            'group' => 'Post Options'
        );

        $params_array[] = array(
            "type" => "colorpicker",
            "heading" => "Title Box Background Color",
            "param_name" => "box_background_color",
            'dependency' => array('element' => 'display_info_box', 'value' => array('yes')),
            'group' => 'Post Options'
        );

        // NON-FEATURED POSTS OPTIONS - END

        return $params_array;

    }
}

if(!function_exists('magazinevibe_edge_get_shortcode_params_names')) {
    /**
     * Function that returns array of predefined names which will be used for shortcode
     * This is used just to set default values
     *
     * @param $params_array array with all params for shortcode with empty value
     *
     * @return array of names with empty values
     *
     */
    function magazinevibe_edge_get_shortcode_params_names($params_array){
        $params_names = array();

        foreach($params_array as $param){
            $params_names[$param['param_name']] = '';
        }

        $params_names['offset'] = '';

        return $params_names;
    }
}

if(!function_exists('magazinevibe_edge_get_post_categories_VC')){
    /**
     * Function that returns array of categories formatted for Visual Composer
     *
     * @return array of categories where key is category name and value is category id
     *
     * @see edgt_get_post_categories
     */
    function magazinevibe_edge_get_post_categories_VC(){
        return array_flip(magazinevibe_edge_get_post_categories());
    }
}

if(!function_exists('magazinevibe_edge_get_post_categories')){
    /**
     * Function that returns associative array of post categories,
     * where key is category id and value is category name
     * @return array
     */
    function magazinevibe_edge_get_post_categories() {
        $vc_array = $post_categories = array();
        $vc_array[0] = "All Categories";
        $post_categories = get_categories();
        foreach ($post_categories as $cat) {
            $vc_array[$cat->cat_ID] = $cat->name;
        }
        return $vc_array;
    }
}

if(!function_exists('magazinevibe_edge_get_authors')){
    /**
     * Function that returns associative array of authors,
     * where key is author id and value is author name
     * @return array
     */
    function magazinevibe_edge_get_authors() {
        $vc_array = $authors = array();
        $vc_array[0] = "All Authors";
        $authors = get_users();
        foreach ($authors as $author) {
            $vc_array[$author->ID] = $author->display_name;
        }
        return $vc_array;
    }
}

if(!function_exists('magazinevibe_edge_get_authors_VC')){
    /**
     * Function that returns array of authors formatted for Visual Composer
     *
     * @return array of authors where key is category name and value is category id
     *
     * @see magazinevibe_edge_get_authors
     */
    function magazinevibe_edge_get_authors_VC(){
        return array_flip(magazinevibe_edge_get_authors());
    }
}

if(!function_exists('magazinevibe_edge_get_sort_array')){
    /**
     * Function that returns array of sort properties for list shortcode formatted for Visual Composer
     *
     * @return array of sort properties for formatted for Visual Composer
     *
     */
    function magazinevibe_edge_get_sort_array(){
        $sort_array = array(
            ""	=> "",
            "Latest" => "latest",
            "Random" => "random",
            "Random Posts Today" => "random_today",
            "Random in Last 7 Days" => "random_seven_days",
            "Most Commented" => "comments",
            "Title" => "title",
            "Popular" => "popular",
            "Top Rated" => "top_rated"
        );
        return $sort_array;
    }
}

if(!function_exists('magazinevibe_edge_get_query')){
    /**
     * Function that returns query from params
     *
     * @return WP_Query
     *
     */
    function magazinevibe_edge_get_query($params){
        $params = shortcode_atts(
            array(
                'post_type' => 'post',
                'number_of_posts' => '1',
                'author_id' => '',
                'category_id' => '',
                'category_slug' => '',
                'orderby' => 'date',
                'order' => '',
                'tag_slug' => '',
                'post_in' => '',
                'post_not_in'=> '',
                'sort' => '',
                'offset' => '0',
                'paged' => '',
                'pagination' => 'no',
                'pagination_type' => '',
            ),$params);


        $query_array = array();


        if ($params['category_id'] !== '') {
            $query_array['cat'] = $params['category_id'];
        }
        if($params['category_slug'] !== '') {
            $query_array['category_name'] = $params['category_slug'];
        }
        if ($params['author_id'] != "" ) {
            $query_array['author'] = $params['author_id'];
        }
        if (!empty($params['tag_slug'])) {
            $query_array['tag'] = str_replace(' ', '-', $params['tag_slug']);
        }
        if (!empty($params['post_not_in'])) {
            $query_array['post__not_in'] = explode(",", $params['post_not_in']);
        }
        if (!empty($params['post_in'])) {
            $query_array['post__in'] = explode(",", $params['post_in']);
        }


        switch($params['sort']) {
            case 'latest':
                $query_array['orderby'] = 'date';
                break;

            case 'random':
                $query_array['orderby'] = 'rand';
                break;

            case 'random_today':
                $query_array['orderby'] = 'rand';
                $query_array['year'] = date('Y');
                $query_array['monthnum'] = date('n');
                $query_array['day'] = date('j');
                break;

            case 'random_seven_days':
                $query_array['date_query'] = array(
                    'column' => 'post_date_gmt',
                    'after' => '1 week ago'
                );
                break;

            case 'comments':
                $query_array['orderby'] = 'comment_count';
                $query_array['order'] = 'DESC';
                break;

            case 'title':
                $query_array['orderby'] = 'title';
                $query_array['order'] = 'ASC';
                break;

            case 'popular':
                $query_array['meta_key'] = 'count_post_views';
                $query_array['orderby'] = 'meta_value_num';
                $query_array['order'] = 'ASC';
                break;
            case 'top_rated':
                $query_array['meta_key'] = 'edgtf_post_rating_value';
                $query_array['orderby'] = 'meta_value_num';
                $query_array['order'] = 'DESC';
                break;
        }

        $query_array['posts_per_page'] = $params['number_of_posts'] != '' ? $params['number_of_posts'] : -1;

        if (!empty($params['order'])) {
            $query_array['order'] = $params['order'] ;
        }

        /*
        if(isset($params['display_pagination'])
                && isset($params['pagination_type'])
                && $params['display_pagination'] == "yes"
                && $params['pagination_type'] == "edgtf-next-prev-horizontal"){
            $query_array['posts_per_page'] = -1;
        }
        */

        /* these lines of code need to be here until paging is enabled */

        if($params['paged'] == '') {
            if(get_query_var('paged')) {
                $params['paged'] = get_query_var('paged');
            } elseif(get_query_var('page')) {
                $params['paged'] = get_query_var('page');
            }
        }

        if (!empty($params['paged'])) {
            $query_array['paged'] = $params['paged'];
        } else {
            $query_array['paged'] = 1;
        }

        if (!empty($params['offset'])){
            if ($query_array['paged'] > 1) {
                $query_array['offset'] = $params['offset'] + ( ($params['paged'] - 1) * $params['number_of_posts']) ;
            } else {
                $query_array['offset'] = $params['offset'] ;
            }
        }

        $list_query = new WP_Query($query_array);

        return $list_query;
    }
}

if(!function_exists('magazinevibe_edge_get_filtered_params')){
    /**
     * Function that returns associative array without prefix.
     * This function is used for block shortcodes (prefix_param -> param)
     *
     * @param $params array which need to be filtered
     * @param $prefix string part of key that need to be removed
     *
     * @return array
     */

    function magazinevibe_edge_get_filtered_params($params, $prefix)
    {
        $params_filtered = array();

        foreach ($params as $key => $value) {
            $new_key = substr($key, strlen($prefix) + 1);
            $params_filtered[$new_key] = $value;
        }

        return $params_filtered;
    }
}

if(!function_exists('magazinevibe_edge_get_shortcode_params_default')) {
    #todo delete
    function magazinevibe_edge_get_shortcode_params_default($signature){
        $params_array = array();

        if ($signature != 'edgtf_single_post_layout') {
            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Number of Posts',
                'param_name' => 'number_of_posts',
                'description' => '',
                'value' => '4',
                'save_always' => true
            );
        }

        if ($signature == 'edgtf_block_two' || $signature == 'edgtf_post_layout_boxes') {
            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Number of Columns",
                "param_name" => "column_number",
                "value" => array(
                    "" => "",
                    "One" => 1,
                    "Two" => 2,
                    "Three" => 3,
                    "Four" => 4,
                    "Five" => 5
                ),
                "description" => "This option don't work for rating shortcode"
            );
        }

        if ($signature == 'edgtf_post_split_slider') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Slides Proportion',
                'param_name' => 'slide_proportion',
                'value' => array(
                    '1/1' => 'full_width',
                    '1/2+1/2' => 'two_half',
                    '2/3+1/3' => 'two_third_one_third',
                    '1/3+2/3' => 'one_third_two_third',
                    '1/3+1/3+1/3' => 'three_third',
                ),
                'save_always' => true,
                'description' => ''
            );
        }

        $params_array[] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Category",
            "value" => magazinevibe_edge_get_post_categories_VC(),
            "param_name" => "category_id",
            'save_always' => true,
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Category Slug',
            'param_name' => 'category_slug',
            'description' => 'Leave empty for all or use comma for list'
        );

        $params_array[] = array(
            "type" => "dropdown",
            "admin_label" => true,
            "class" => "",
            "heading" => "Choose Author",
            "param_name" => "author_id",
            "value" => magazinevibe_edge_get_authors_VC(),
            "description" => "",
            'save_always' => true,
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Tag Slug',
            'param_name' => 'tag_slug',
            'description' => 'Leave empty for all or use comma for list'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Include Posts',
            'param_name' => 'post_in',
            'description' => 'Enter the IDs of the posts you want to display'
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Exclude Posts',
            'param_name' => 'post_not_in',
            'description' => 'Enter the IDs of the posts you want to exclude'
        );

        $params_array[] = array(
            "type" => "dropdown",
            "admin_label" => true,
            "class" => "",
            "heading" => "Sort",
            "param_name" => "sort",
            "value" => magazinevibe_edge_get_sort_array(),
            "description" => ""
        );

        // without offset - only for templates and load more

        if ($signature != 'edgtf_post_layout_small'){
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Post Options'
            );
        };

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Image Width (px)',
            'param_name' => 'thumb_image_width',
            'description' => 'Set custom image width (px)',
            'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
            'group' => 'Post Options'
        );


        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Image Height (px)',
            'param_name' => 'thumb_image_height',
            'description' => 'Set custom image height (px)',
            'dependency' => array('element' => 'thumb_image_size', 'value' => array('custom_size')),
            'group' => 'Post Options'
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Title Tag',
            'param_name' => 'title_tag',
            'value' => array(
                'Default' => '',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'description' => '',
            'group' => 'Post Options'
        );

        if ($signature != 'edgtf_post_layout_boxes' && $signature != 'edgtf_post_layout_small') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );
        }

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Display Date',
            'param_name' => 'display_date',
            'value' => array(
                'Default' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            'description' => '',
            'group' => 'Post Options',
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Date Format',
            'param_name' => 'date_format',
            'description' => 'Enter the date format that you want to display',
            'dependency' => array('element' => 'display_date', 'value' => array('yes','')),
            'group' => 'Post Options',
        );

        if ($signature != 'edgtf_single_post_layout' && $signature != 'edgtf_post_layout_one') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );
        }

        if ($signature != 'edgtf_post_layout_boxes' && $signature != 'edgtf_post_layout_small') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Post Options'
            );
        }

        if ($signature == 'edgtf_post_layout_one') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Post Options'
            );
        }

        if ($signature == 'edgtf_post_layout_one') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Like',
                'param_name' => 'display_like',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );
        }

        if ($signature == 'edgtf_post_layout_one' || $signature == 'edgtf_post_layout_small') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Excerpt',
                'param_name' => 'display_excerpt',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Post Options'
            );
            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Max. Excerpt Length',
                'param_name' => 'excerpt_length',
                'value' => '50',
                'description' => 'Enter max of words that can be set for excerpt',
                'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                'group' => 'Post Options',
                'save_always' => true,
            );
        }

        if ($signature == 'edgtf_block_eight' || $signature == 'edgtf_block_three' || $signature == 'edgtf_post_layout_rating' || $signature == 'edgtf_post_layout_four') {
            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Rating",
                "param_name" => "display_rating",
                "value" => array(
                    "Default" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
                'group' => 'Post Options'
            );
        }

        if ($signature == 'edgtf_post_layout_minimal_with_thumb') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Thumb Size',
                'param_name' => 'thumb_size',
                'value' => array(
                    'Default' => '',
                    'Small' => 'small'
                ),
                'save_always' => true,
                'description' => ''
            );
        }

        if ($signature == 'edgtf_post_classic_slider') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Slider Control',
                'param_name' => 'display_control',
                'value' => array(
                    'No' => 'no',
                    'Thumbnails' => 'thumbnails',
                    'Paging' => 'paging'
                ),
                'description' => '',
                'save_always' => true,
                'group' => 'Post Options'
            );
        }

        if ($signature == 'edgtf_post_split_slider' || $signature == 'edgtf_post_classic_slider') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Navigation',
                'param_name' => 'display_navigation',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'save_always' => true,
                'description' => ''
            );
        }

        if ($signature != 'edgtf_post_split_slider') {
            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Pagination",
                "param_name" => "display_pagination",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                'save_always' => true,
                "description" => "",
                'group' => 'Pagination'
            );

            $params_array[] = array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Pagination Type",
                "param_name" => "pagination_type",
                "value" => array(
                    "Horizontal Navigation" => "edgtf-next-prev-horizontal",
                    "Vertical Navigation" => "edgtf-next-prev",
                    "Load More" => "edgtf-load-more",
                    "Infinite Scroll" => "edgtf-infinite-scroll"
                ),
                "description" => "",
                'save_always' => true,
                "dependency" => array('element' => "display_pagination", 'value' => array('yes')),
                'group' => 'Pagination'
            );
        }

        if ($signature == 'edgtf_block_eight' || $signature == 'edgtf_block_three') {
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Featured Post',
                'param_name' => 'display_featured_post',
                'value' => array(
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'save_always' => true,
                'description' => ''
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Image Size',
                'param_name' => 'featured_thumb_image_size',
                'value' => array(
                    'Original' => 'original',
                    'Landscape' => 'landscape',
                    'Portrait' => 'portrait',
                    'Square' => 'square',
                    'Custom' => 'custom_size'
                ),
                'save_always' => true,
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Width (px)',
                'param_name' => 'featured_thumb_image_width',
                'description' => 'Set custom image width',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );


            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Image Height (px)',
                'param_name' => 'featured_thumb_image_height',
                'description' => 'Set custom image height',
                'dependency' => array('element' => 'featured_thumb_image_size', 'value' => array('custom_size')),
                'group' => 'Featured Item'
            );

            // without offset - only for templates and load more
            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Title Tag',
                'param_name' => 'featured_title_tag',
                'value' => array(
                    'Default' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Category',
                'param_name' => 'featured_display_category',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Date',
                'param_name' => 'featured_display_date',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'textfield',
                'heading' => 'Date Format',
                'param_name' => 'featured_date_format',
                'description' => 'Enter the date format that you want to display',
                'dependency' => array('element' => 'featured_display_date   ', 'value' => array('yes','')),
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Author',
                'param_name' => 'featured_display_author',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Comments',
                'param_name' => 'featured_display_comments',
                'value' => array(
                    'Default' => '',
                    'No' => 'no',
                    'Yes' => 'yes',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            $params_array[] = array(
                'type' => 'dropdown',
                'heading' => 'Display Social Share',
                'param_name' => 'featured_display_social_share',
                'value' => array(
                    'Default' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                ),
                'description' => '',
                'group' => 'Featured Item'
            );

            if ($signature == 'edgtf_block_eight' || $signature == 'edgtf_block_three') {
                $params_array[] = array(
                    "type" => "colorpicker",
                    "heading" => "Title Box Background Color",
                    "param_name" => "featured_box_background_color",
                    'group' => 'Featured Item'
                );
            }
        }

        return $params_array;
    }
}