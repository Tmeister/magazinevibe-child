<?php

/***** Get current category page ID and meta boxes options from category admin panel *****/
$current_cat_id = magazinevibe_edge_get_current_object_id();
$cat_array = get_option( "post_tax_term_$current_cat_id");

$blog_page_range = magazinevibe_edge_get_blog_page_range();
$max_number_of_pages = magazinevibe_edge_get_max_number_of_pages();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

/***** Get number of posts per page for current category *****/

$postsPerPage = intval(get_option('posts_per_page'));

/***** Get unique category template layout *****/

$template = 'type1';
if(isset($cat_array['template']) && $cat_array['template'] != ''){
	$template = $cat_array['template'];
}

$column_number = 2;
if(isset($cat_array['column_number']) && !empty($cat_array['column_number'])){
	$column_number = $cat_array['column_number'];
}

$feature_excerpt_length = 10;
if(isset($cat_array['feature_excerpt_length']) && $cat_array['feature_excerpt_length'] != ''){
	$feature_excerpt_length = $cat_array['feature_excerpt_length'];
}

$excerpt_length = 24;
if(isset($cat_array['excerpt_length']) && $cat_array['excerpt_length'] != ''){
	$excerpt_length = $cat_array['excerpt_length'];
}

$feature_thumb_image_width = '';
if(isset($cat_array['feature_thumb_image_width']) && $cat_array['feature_thumb_image_width'] != ''){
	$feature_thumb_image_width = $cat_array['feature_thumb_image_width'];
}

$feature_thumb_image_height = '';
if(isset($cat_array['feature_thumb_image_height']) && $cat_array['feature_thumb_image_height'] != ''){
	$feature_thumb_image_height = $cat_array['feature_thumb_image_height'];
}

$thumb_image_width = '';
if(isset($cat_array['thumb_image_width']) && $cat_array['thumb_image_width'] != ''){
	$thumb_image_width = $cat_array['thumb_image_width'];
}

$thumb_image_height = '';
if(isset($cat_array['thumb_image_height']) && $cat_array['thumb_image_height'] != ''){
	$thumb_image_height = $cat_array['thumb_image_height'];
}

/***** Set params for feature posts on category page *****/

$params_featured = '';
$params_featured .= ' category_id="'.$current_cat_id.'"';

if($template == "type1"){
	$featured_number_of_posts = $column_number;
	$params_featured .= ' number_of_posts="'.$featured_number_of_posts.'"';

	if($column_number != ''){
		$params_featured .= ' column_number="'.$column_number.'"';
	}
} else if ($template == "type2") {
	$featured_number_of_posts = 4;
	$params_featured .= ' number_of_posts="'.$featured_number_of_posts.'"';
	$params_featured .= ' display_navigation="yes"';
	$params_featured .= ' display_control="paging"';
} else if ($template == "type3") {
	$featured_number_of_posts = 4;
	$params_featured .= ' number_of_posts="'.$featured_number_of_posts.'"';

	if($feature_thumb_image_width != '' && $feature_thumb_image_height != '') {
		$params_featured .= ' featured_thumb_image_size="custom_size"';
		$params_featured .= ' featured_thumb_image_width="'.$feature_thumb_image_width.'"';
		$params_featured .= ' featured_thumb_image_height="'.$feature_thumb_image_height.'"';
	}
	if($thumb_image_width != '' && $thumb_image_height != '') {
		$params_featured .= ' thumb_image_size="custom_size"';
		$params_featured .= ' thumb_image_width="'.$thumb_image_width.'"';
		$params_featured .= ' thumb_image_height="'.$thumb_image_height.'"';
	}
} else if ($template == "type4") {
	$featured_number_of_posts = 4;
	$params_featured .= ' number_of_posts="'.$featured_number_of_posts.'"';
	
	if($feature_thumb_image_width != '' && $feature_thumb_image_height != '') {
		$params_featured .= ' featured_thumb_image_size="custom_size"';
		$params_featured .= ' featured_thumb_image_width="'.$feature_thumb_image_width.'"';
		$params_featured .= ' featured_thumb_image_height="'.$feature_thumb_image_height.'"';
	}
	if($thumb_image_width != '' && $thumb_image_height != '') {
		$params_featured .= ' thumb_image_size="custom_size"';
		$params_featured .= ' thumb_image_width="'.$thumb_image_width.'"';
		$params_featured .= ' thumb_image_height="'.$thumb_image_height.'"';
	}
}

if($feature_excerpt_length != ''){
	$params_featured .= ' excerpt_length="'.$feature_excerpt_length.'"';
}

/***** Set params for non-feature posts on category page *****/

$params = '';
$params .= ' category_id="'.$current_cat_id.'"';
$params .= ' offset="'.$featured_number_of_posts.'"';

/***** Get number of posts from current category *****/

$query_params = array();
$query_params['cat'] = $current_cat_id;
$category_query = new WP_Query($query_params);
$postInCategory = $category_query->found_posts;
wp_reset_postdata();


if($postInCategory > $postsPerPage){
	$number_of_posts = $postsPerPage - intval($featured_number_of_posts);
	$params .= ' number_of_posts="'.$number_of_posts.'"';	
} else {
	$number_of_posts = $postInCategory - intval($featured_number_of_posts);
	$params .= ' number_of_posts="'.$number_of_posts.'"';
}

$display_pagination = 'yes';
$params .= ' display_pagination="'.$display_pagination.'"';

$pagination_type = 'edgtf-next-prev-horizontal';
$params .= ' pagination_type="'.$pagination_type.'"';

if ($postInCategory > $featured_number_of_posts && ($template == "type2" || $template == "type3")) {

	if($column_number != ''){
		$params .= ' column_number="'.$column_number.'"';
	}
}

if($excerpt_length != ''){
	$params .= ' excerpt_length="'.$excerpt_length.'"';
}
?>

<div class="edgtf-unique-category-layout clearfix">
	<?php
		switch ($template) {								 
			case 'type1':						
				echo do_shortcode("[edgtf_block_two $params_featured]"); // XSS OK
			break;
			case 'type2':						
				echo do_shortcode("[edgtf_post_classic_slider $params_featured]"); // XSS OK
			break;
			case 'type3':						
				echo do_shortcode("[edgtf_block_one $params_featured]"); // XSS OK
			break;
			case 'type4':						
				echo do_shortcode("[edgtf_block_one $params_featured]"); // XSS OK
			break;
		}
    ?>

    <?php
    	switch ($template) {								 
			case 'type1':
				if($postInCategory > intval($column_number)){
					echo do_shortcode("[edgtf_post_layout_small $params]"); // XSS OK
				}									
			break;
			case 'type2':
				if($postInCategory > 4){
					echo do_shortcode("[edgtf_block_two $params]"); // XSS OK
				}									
			break;
			case 'type3':
				if($postInCategory > 4){
					echo do_shortcode("[edgtf_block_two $params]"); // XSS OK
				}									
			break;
			case 'type4':
				if($postInCategory > 4){
					echo do_shortcode("[edgtf_block_nine $params]"); // XSS OK
				}									
			break;
		}
	?>
</div>