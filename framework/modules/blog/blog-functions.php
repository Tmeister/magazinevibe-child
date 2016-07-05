<?php
if( !function_exists('magazinevibe_edge_get_blog') ) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function magazinevibe_edge_get_blog($type) {

		$sidebar = magazinevibe_edge_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar" => $sidebar
		);
		magazinevibe_edge_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}
}

if( !function_exists('magazinevibe_edge_get_blog_type') ) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function magazinevibe_edge_get_blog_type($type) {
		global $wp_query;

		$id = magazinevibe_edge_get_page_id();
		$category = get_post_meta($id, "edgtf_blog_category_meta", true);
		$post_number = esc_attr(get_post_meta($id, "edgtf_show_posts_per_page_meta", true));

		$paged = magazinevibe_edge_paged();

		if(!is_archive()) {
			$blog_query = new WP_Query('post_type=post&paged=' . $paged . '&cat=' . $category . '&posts_per_page=' . $post_number);
		}else{
			$blog_query = $wp_query;
		}

		if(magazinevibe_edge_options()->getOptionValue('blog_page_range') != ""){
			$blog_page_range = esc_attr(magazinevibe_edge_options()->getOptionValue('blog_page_range'));
		} else{
			$blog_page_range = $blog_query->max_num_pages;
		}
		$params = array(
			'blog_query' => $blog_query,
			'paged' => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type' => $type
		);

		magazinevibe_edge_get_module_template_part('templates/lists/' .  $type, 'blog', '', $params);
	}
}

if( !function_exists('magazinevibe_edge_get_post_format_html') ) {

	/**
	 * Function which return html for post formats
	 * @param $type
	 * @return post hormat template
	 */

	function magazinevibe_edge_get_post_format_html($type = "") {

		$post_format = get_post_format();
		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		
		if(in_array($post_format, $supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$slug = '';
		if($type !== ""){
			$slug = $type;
		}

		$params = array();

		$chars_array = magazinevibe_edge_blog_lists_number_of_chars();
		if(isset($chars_array[$type])) {
			$params['excerpt_length'] = $chars_array[$type];
		} else {
			$params['excerpt_length'] = '';
		}


		magazinevibe_edge_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
	}
}

if( !function_exists('magazinevibe_edge_get_default_blog_list') ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function magazinevibe_edge_get_default_blog_list() {

		$blog_list = magazinevibe_edge_options()->getOptionValue('blog_list_type');

		return $blog_list;
	}
}

if( !function_exists('magazinevibe_edge_get_category_blog_list') ) {
	/**
	 * Function which return blog list for category post types
	 *
	 * @return post format template
	 */

	function magazinevibe_edge_get_category_blog_list() {

		$blog_list = magazinevibe_edge_options()->getOptionValue('blog_list_type');
		
		if(magazinevibe_edge_options()->getOptionValue('unigue_category_layout') === 'yes'){
			$blog_list = 'unique-category-layout';
		}

		return $blog_list;
	}
}

if( !function_exists('magazinevibe_edge_get_author_blog_list') ) {
	/**
	 * Function which return blog list for author post types
	 *
	 * @return post format template
	 */

	function magazinevibe_edge_get_author_blog_list() {

		$blog_list = magazinevibe_edge_options()->getOptionValue('blog_list_type');
		
		if(magazinevibe_edge_options()->getOptionValue('unigue_author_layout') === 'yes'){
			$blog_list = 'unique-author-layout';
		}

		return $blog_list;
	}
}

if (!function_exists('magazinevibe_edge_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function magazinevibe_edge_pagination($pages = '', $range = 4, $paged = 1){

		$showitems = $range+1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}
		if(1 != $pages){

			echo '<span class="edgtf-pagination-new-holder">'. get_the_posts_pagination().'</span>';

			echo '<div class="edgtf-pagination">';
				echo '<ul>';
					if($paged > 2 && $paged > $range+1 && $showitems < $pages){
						echo '<li class="edgtf-pagination-first-page"><a href="'.esc_url(get_pagenum_link(1)).'"><i class="edgtf-icon-linea-icon icon-arrows-left-double-32"></i></a></li>';
					}
					if ($paged > 1) {
						echo "<li class='edgtf-pagination-prev'><a href='".esc_url(get_pagenum_link($paged - 1))."'><i class='edgtf-icon-linea-icon icon-arrows-left'></i></a></li>";
					}
					for ($i=1; $i <= $pages; $i++){
						if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
							echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
						}
					}
					if ($paged !== intval($pages)){
						echo '<li class="edgtf-pagination-next"><a href="';
						if($pages > $paged){
							echo esc_url(get_pagenum_link($paged + 1));
						} else {
							echo esc_url(get_pagenum_link($paged));
						}
						echo '"><i class="edgtf-icon-linea-icon icon-arrows-right"></i></a></li>';
					}

					if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
						echo '<li class="edgtf-pagination-last-page"><a href="'.esc_url(get_pagenum_link($pages)).'"><i class="edgtf-icon-linea-icon icon-arrows-right-double"></i></a></li>';
					}
				echo '</ul>';
			echo "</div>";
		}
	}
}

if(!function_exists('magazinevibe_edge_post_info')){
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 */
	function magazinevibe_edge_post_info($config){
		$default_config = array(
			'date' => '',
			'category' => '',
			'author' => '',
			'comments' => '',
			'like' => '',
			'share' => ''
		);

		extract(shortcode_atts($default_config, $config));

		if($date == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/post-info-date', 'blog');
		}
		if($author == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/post-info-author', 'blog');
		}
		if($category == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/post-info-category', 'blog');
		}
		if($comments == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/post-info-comments', 'blog');
		}
		if($like == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/post-info-like', 'blog');
		}
		if($share == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/post-info-share', 'blog');
		}
	}
}

if(!function_exists('magazinevibe_edge_post_single_info')){
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. time
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. count
	 * 7. share
	 *
	 * @param $config array of sections to load
	 */
	function magazinevibe_edge_post_single_info($config){
		$default_config = array(
			'date' => '',
			'category' => '',
			'time' => '',
			'author' => '',
			'comments' => '',
			'like' => '',
			'count' => '',
			'share' => ''
		);

		extract(shortcode_atts($default_config, $config));

		if($date == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-date', 'blog');
		}
		if($time == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-time', 'blog');
		}
		if($category == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-category-single', 'blog');
		}
		if($author == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-author', 'blog');
		}
		if($comments == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-comments', 'blog');
		}
		if($like == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-like', 'blog');
		}
		if($count == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-count', 'blog');
		}
		if($share == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single/post-info-share', 'blog');
		}
	}
}

if(!function_exists('magazinevibe_edge_post_info_category')){
	/**
	 * Function that loads parts of blog post category info section
	 *
	 * @param $config array of sections to load
	 */
	function magazinevibe_edge_post_info_category($config){
		$default_config = array(
			'category' => ''
		);

        $params = (shortcode_atts($default_config, $config));

		if($params['category'] == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-category-single', 'blog', '', $params);
		}
	}
}

if(!function_exists('magazinevibe_edge_post_info_date')){
	/**
	 * Function that loads parts of blog post date info section
	 *
	 * @param $config array of sections to load
	 */
	function magazinevibe_edge_post_info_date($config){
		$default_config = array(
			'date' => '',
            'date_format' => ''
		);

		$params = (shortcode_atts($default_config, $config));

		if($params['date'] == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-date-single', 'blog', '', $params);
		}
	}
}

if(!function_exists('magazinevibe_edge_post_info_author')){
	/**
	 * Function that loads parts of blog post author info section
	 *
	 * @param $config array of sections to load
	 */
	function magazinevibe_edge_post_info_author($config){
		$default_config = array(
			'author' => ''
		);

        $params = (shortcode_atts($default_config, $config));

		if($params['author'] == 'yes'){
			magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-author-single', 'blog', '', $params);
		}
	}
}

if(!function_exists('magazinevibe_edge_post_info_comments')){
	/**
	 * Function that loads parts of blog post comments info section
	 *
	 * @param $config array of sections to load
	 */
	function magazinevibe_edge_post_info_comments($config){
		$default_config = array(
			'comments' => '',
            'type' => ''
		);

        $params = (shortcode_atts($default_config, $config));

        if($params['comments'] == 'yes'){
            if($params['type'] == 'icon') {
                magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-comments-single-with-icon', 'blog', '', $params);
            }
            else{
                magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-comments-single', 'blog', '', $params);
            }
		}
	}
}

if(!function_exists('magazinevibe_edge_post_info_like')){
    /**
     * Function that loads parts of blog post author info section
     *
     * @param $config array of sections to load
     */
    function magazinevibe_edge_post_info_like($config){
        $default_config = array(
            'like' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if($params['like'] == 'yes'){
            magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-like-single', 'blog', '', $params);
        }
    }
}

if(!function_exists('magazinevibe_edge_post_info_share')){
    /**
     * Function that loads parts of blog post share info section
     *
     * @param $config array of sections to load
     */
    function magazinevibe_edge_post_info_share($config){
        $default_config = array(
            'share' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if($params['share'] == 'yes'){
            magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-share-single', 'blog', '', $params);
        }

    }
}

if(!function_exists('magazinevibe_edge_post_info_rating')){
    /**
     * Function that loads parts of blog post rating info section
     *
     * @param $config array of sections to load
     */
    function magazinevibe_edge_post_info_rating($config){
        $default_config = array(
            'rating' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if($params['rating'] == 'yes'){
            magazinevibe_edge_get_module_template_part('templates/parts/single-function/post-info-rating-single', 'blog', '', $params);
        }
    }
}

if(!function_exists('magazinevibe_edge_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in edgt_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function magazinevibe_edge_excerpt($excerpt_length) {
		global $post;

		if(post_password_required()) {
			echo get_the_password_form();
		}

		//does current post has read more tag set?
		elseif(magazinevibe_edge_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		}

		//is word count set to something different that 0?
		elseif($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '45';
			if(isset($excerpt_length) && $excerpt_length != "") {
				$word_count = $excerpt_length;
			} elseif (magazinevibe_edge_options()->getOptionValue('number_of_chars') != '') {
				$word_count = esc_attr(magazinevibe_edge_options()->getOptionValue('number_of_chars'));
			}

			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode (' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

				//and finally implode words together
				$excerpt = implode (' ', $excerpt_word_array);

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p class="edgtf-post-excerpt">'.wp_kses_post($excerpt).'</p>';
				}
			}
		}
	}
}

if(!function_exists('magazinevibe_edge_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function magazinevibe_edge_get_blog_single() {
		$sidebar = magazinevibe_edge_sidebar_layout();

		$params = array(
			"sidebar" => $sidebar
		);

		magazinevibe_edge_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if( !function_exists('magazinevibe_edge_get_single_html') ) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function magazinevibe_edge_get_single_html() {

		$post_format = get_post_format();
		if($post_format === false){
			$post_format = 'standard';
		}

		$post_id = magazinevibe_edge_get_page_id();

		//Related posts
		$related_posts_params = array();
		$show_related = (magazinevibe_edge_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
		if ($show_related) {
			$hasSidebar = magazinevibe_edge_sidebar_layout();
			$related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
			$related_posts_options = array('posts_per_page' => $related_post_number);
			$related_posts_image_size = (magazinevibe_edge_options()->getOptionValue('blog_single_related_image_size') !== '') ? intval(magazinevibe_edge_options()->getOptionValue('blog_single_related_image_size')) : '';
			$related_posts_params = array('related_posts' => magazinevibe_edge_get_related_post_type($post_id, $related_posts_options), 'related_posts_image_size' => $related_posts_image_size);
		}

		magazinevibe_edge_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog');
		magazinevibe_edge_get_module_template_part('templates/single/parts/single-navigation', 'blog');
		magazinevibe_edge_get_module_template_part('templates/single/parts/author-info', 'blog');
		$show_ratings = (magazinevibe_edge_options()->getOptionValue('blog_single_ratings') == 'yes') ? true : false;
        if($show_ratings){
            magazinevibe_edge_get_module_template_part('templates/single/parts/ratings', 'blog', '');
        }
		if ($show_related) {
			magazinevibe_edge_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
		}
		if(magazinevibe_edge_show_comments()){
			comments_template('', true);
		}
	}
}

if( !function_exists('magazinevibe_edge_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function magazinevibe_edge_additional_post_items() {

		if(has_tag()){
			magazinevibe_edge_get_module_template_part('templates/single/parts/tags', 'blog');
		}


		$args_pages = array(
			'before'           => '<div class="edgtf-single-links-pages"><div class="edgtf-single-links-pages-inner">',
			'after'            => '</div></div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'pagelink'         => '%'
		);

		wp_link_pages($args_pages);

	}
	add_action('magazinevibe_edge_before_blog_article_closed_tag', 'magazinevibe_edge_additional_post_items');
}

if (!function_exists('magazinevibe_edge_comment')) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */

	function magazinevibe_edge_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment  = $post->post_author == $comment->user_id;

		$comment_class = 'edgtf-comment clearfix';

		if($is_author_comment) {
			$comment_class .= ' edgtf-post-author-comment';
		}

		if($is_pingback_comment) {
			$comment_class .= ' edgtf-pingback-comment';
		}

		?>

		<li>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="edgtf-comment-image"> <?php echo magazinevibe_edge_kses_img(get_avatar($comment, 114)); ?> </div>
			<?php } ?>
			<div class="edgtf-comment-text">
				<div class="edgtf-comment-info">
					<h6 class="edgtf-comment-name">
						<?php if($is_pingback_comment) { esc_html_e('Pingback:', 'magazinevibe'); } ?><span class="edgtf-comment-author"><?php echo wp_kses_post(get_comment_author_link()); ?></span>
						<span class="edgtf-comment-date"><?php comment_time(get_option('date_format')); ?></span>
					</h6>
				</div>
				<?php if(!$is_pingback_comment) { ?>
					<div class="edgtf-text-holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
				<?php } ?>
				<div class="edgtf-comment-text-links">
					<?php
						comment_reply_link( array_merge( $args, array('reply_text' => esc_html__('Leave reply', 'magazinevibe'), 'depth' => $depth, 'max_depth' => $args['max_depth']) ) );
						edit_comment_link(esc_html__('Edit comment','magazinevibe'));
					?>
				</div>	
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>

		<?php
	}
}

if( !function_exists('magazinevibe_edge_blog_archive_pages_classes') ) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function magazinevibe_edge_blog_archive_pages_classes($blog_type) {

		$classes = array();
		if(in_array($blog_type, magazinevibe_edge_blog_full_width_types())){
			$classes['holder'] = 'edgtf-full-width';
			$classes['inner'] = 'edgtf-full-width-inner';
		} elseif(in_array($blog_type, magazinevibe_edge_blog_grid_types())){
			$classes['holder'] = 'edgtf-container';
			$classes['inner'] = 'edgtf-container-inner clearfix';
		}

		return $classes;
	}
}

if( !function_exists('magazinevibe_edge_blog_full_width_types') ) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function magazinevibe_edge_blog_full_width_types() {

		$types = array();

		return $types;

	}

}

if( !function_exists('magazinevibe_edge_blog_grid_types') ) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function magazinevibe_edge_blog_grid_types() {

		$types = array('standard', 'standard-whole-post', 'unique-category-layout', 'unique-author-layout');

		return $types;

	}

}

if( !function_exists('magazinevibe_edge_blog_types') ) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function magazinevibe_edge_blog_types() {

		$types = array_merge(magazinevibe_edge_blog_grid_types(), magazinevibe_edge_blog_full_width_types());

		return $types;

	}

}

if( !function_exists('magazinevibe_edge_blog_templates') ) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function magazinevibe_edge_blog_templates() {

		$templates = array();
		$grid_templates = magazinevibe_edge_blog_grid_types();
		$full_templates = magazinevibe_edge_blog_full_width_types();
		foreach($grid_templates as $grid_template){
			array_push($templates, 'blog-'.$grid_template);
		}
		foreach($full_templates as $full_template){
			array_push($templates, 'blog-'.$full_template);
		}

		return $templates;

	}

}

if( !function_exists('magazinevibe_edge_blog_lists_number_of_chars') ) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function magazinevibe_edge_blog_lists_number_of_chars() {

		$number_of_chars = array();
		if(magazinevibe_edge_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = magazinevibe_edge_options()->getOptionValue('standard_number_of_chars');
		}

		return $number_of_chars;
	}
}

if (!function_exists('magazinevibe_edge_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 * @param $length int original value
	 * @return int changed value
	 */
	function magazinevibe_edge_excerpt_length( $length ) {

		if(magazinevibe_edge_options()->getOptionValue('number_of_chars') !== ''){
			return esc_attr(magazinevibe_edge_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'magazinevibe_edge_excerpt_length', 999 );
}

if(!function_exists('magazinevibe_edge_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function magazinevibe_edge_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('magazinevibe_edge_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function magazinevibe_edge_post_has_title() {
		return get_the_title() !== '';
	}
}

if (!function_exists('magazinevibe_edge_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function magazinevibe_edge_modify_read_more_link() {
		$link = '<div class="edgtf-more-link-container">';
		$link .= magazinevibe_edge_get_button_html(array(
			'link' => get_permalink().'#more-'.get_the_ID(),
			'text' => esc_html__('Continue reading', 'magazinevibe')
		));

		$link .= '</div>';

		return $link;
	}

	add_filter( 'the_content_more_link', 'magazinevibe_edge_modify_read_more_link');
}

if(!function_exists('magazinevibe_edge_has_blog_shortcode')) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function magazinevibe_edge_has_blog_shortcode() {
		$blog_shortcodes = array(
            'edgtf_blog_list',
            'edgtf_post_list',
			'edgtf_post_split_slider',
			'edgtf_post_classic_slider',
			'edgtf_post_layout_one',
			'edgtf_block_eight',
			'edgtf_block_two',
			'edgtf_single_post_layout',
		);

		$slider_field = get_post_meta(magazinevibe_edge_get_page_id(), 'edgtf_page_slider_meta', true); //TODO change

		foreach ($blog_shortcodes as $blog_shortcode) {
			$has_shortcode = magazinevibe_edge_has_shortcode($blog_shortcode) || magazinevibe_edge_has_shortcode($blog_shortcode, $slider_field);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('magazinevibe_edge_load_blog_assets')) {
	/**
	 * Function that checks if blog assets should be loaded
	 *
	 * @see edgt_is_blog_template()
	 * @see is_home()
	 * @see is_single()
	 * @see edgt_has_blog_shortcode()
	 * @see is_archive()
	 * @see is_search()
	 * @see edgt_has_blog_widget()
	 * @return bool
	 */
	function magazinevibe_edge_load_blog_assets() {
		return magazinevibe_edge_is_blog_template() || is_home() || is_single() || magazinevibe_edge_has_blog_shortcode() || is_archive() || is_search();
	}
}

if(!function_exists('magazinevibe_edge_is_blog_template')) {
	/**
	 * Checks if current template page is blog template page.
	 *
	 *@param string current page. Optional parameter.
	 *
	 *@return bool
	 *
	 * @see magazinevibe_edge_get_page_template_name()
	 */
	function magazinevibe_edge_is_blog_template($current_page = '') {

		if($current_page == '') {
			$current_page = magazinevibe_edge_get_page_template_name();
		}

		$blog_templates = magazinevibe_edge_blog_templates();

		return in_array($current_page, $blog_templates);
	}
}

if(!function_exists('magazinevibe_edge_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function magazinevibe_edge_read_more_button($option = '', $class = '') {
		if($option != '') {
			$show_read_more_button = magazinevibe_edge_options()->getOptionValue($option) == 'yes';
		}else {
			$show_read_more_button = 'yes';
		}
		if($show_read_more_button && !magazinevibe_edge_post_has_read_more() && !post_password_required()) {
			echo magazinevibe_edge_get_button_html(array(
				'size'         => 'small',
				'type'         => 'shadow',
				'link'         => get_the_permalink(),
				'text'         => esc_html__('READ MORE', 'magazinevibe'),
				'custom_class' => $class
			));
		}
	}
}

if(!function_exists('magazinevibe_edge_update_post_count_views')) {

	function magazinevibe_edge_update_post_count_views(){
		$postID = magazinevibe_edge_get_page_id();
		if(is_singular('post')){	
			if(isset($_COOKIE['edgt-post-views_'. $postID])){
				return;
			} else {
				$count = get_post_meta($postID, 'count_post_views', true);
				if ($count === ''){
					update_post_meta($postID, 'count_post_views', 1);
					setcookie('edgt-post-views_'. $postID, $postID, time()*20, '/');
				} else {
					$count++;
					update_post_meta($postID, 'count_post_views', $count);
					setcookie('edgt-post-views_'. $postID, $postID, time()*20, '/');
				}	
			}		
		}
	}

	add_action('wp', 'magazinevibe_edge_update_post_count_views');
}

if(!function_exists('magazinevibe_edge_get_post_count_views')) {

	function magazinevibe_edge_get_post_count_views($postID){
		$count = get_post_meta($postID, 'count_post_views', true);
		if($count === ''){
			update_post_meta($postID, 'count_post_views', '0');
			return 0;
		}
		return $count;
	}
}

if(!function_exists('magazinevibe_edge_post_rating_ajax_function')) {
    function magazinevibe_edge_post_rating_ajax_function()
    {

        $post_ID = '';
        $rating_value = '';
        if (!empty($_POST['postID'])) {
            $post_ID = $_POST['postID'];
        }
        if (!empty($_POST['value'])) {
            $rating_value = $_POST['value'];
        }

        $rateResponse = magazinevibe_edge_set_post_rating($rating_value, $post_ID); //update total count of rates

        $newRateCount = magazinevibe_edge_get_post_rating($post_ID); // get total count of votes

        $return_obj = array(
            'newCount' => $newRateCount,
            'rateAnswer' => $rateResponse
        );

        echo json_encode($return_obj);
        exit;

    }

    add_action('wp_ajax_magazinevibe_edge_post_rating_ajax_function', 'magazinevibe_edge_post_rating_ajax_function');
    add_action('wp_ajax_nopriv_magazinevibe_edge_post_rating_ajax_function', 'magazinevibe_edge_post_rating_ajax_function' );
}


if(!function_exists('magazinevibe_edge_get_post_rating')) {

    function magazinevibe_edge_get_post_rating($post_id = false){

        if($post_id == false) {
            $post_id = get_the_ID();
        }

        $rating_value = get_post_meta($post_id, 'edgtf_post_rating_value' , true);
        $rating_number_of_rates = get_post_meta($post_id, 'edgtf_post_rating_number' , true);
        if($rating_value == '' || $rating_number_of_rates == ''){
            update_post_meta($post_id, 'edgtf_post_rating_value' , '0');
            update_post_meta($post_id, 'edgtf_post_rating_number' , '0');
        }

        if($rating_number_of_rates > 0 && $rating_value > 0){
            return round($rating_value/$rating_number_of_rates, 2);
        }
        else{
            return 0;
        }
    }
}

if(!function_exists('magazinevibe_edge_set_post_rating')) {
/*
 * return string message in html
 */
    function magazinevibe_edge_set_post_rating($new_rating_value, $post_id = false){

        if($post_id == false){
            $post_id = get_the_ID();
        }

        if(isset($_COOKIE['edgtf_post_rating_'. $post_id])){
            return '<span>'. esc_html__('You already rate this post!', 'magazinevibe').'</span>';
        }
        else{

            $rating_number_of_rates = get_post_meta($post_id, 'edgtf_post_rating_number' , true);
            $rating_value = get_post_meta($post_id, 'edgtf_post_rating_value', true);

            if ($rating_number_of_rates == ''){
                update_post_meta($post_id, 'edgtf_post_rating_number' , 1);
            } else {
                $rating_number_of_rates++;
                update_post_meta($post_id, 'edgtf_post_rating_number', $rating_number_of_rates);
            }

            if ($rating_value == ''){
                update_post_meta($post_id, 'edgtf_post_rating_value' , $new_rating_value);
                setcookie('edgtf_post_rating_'. $post_id, $post_id, time()*20, '/');
                return '<span>'. esc_html__('Thank you! You have succesfully rated this post!', 'magazinevibe').'</span>';
            } else {
                $rating_value += $new_rating_value ;
                update_post_meta($post_id, 'edgtf_post_rating_value', $rating_value);
                setcookie('edgtf_post_rating_'. $post_id, $post_id, time()*20, '/');
                return '<span>'. esc_html__('Thank you! You have succesfully rated this post!', 'magazinevibe').'</span>';
            }
        }
    }
}

function magazinevibe_edge_taxonomy_custom_fields($tag) {
    $t_id = $tag->term_id; // Get the ID of the category you're editing  
	$term_meta = get_option( "post_tax_term_$t_id" );
    ?>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Template', 'magazinevibe'); ?></label>
        </th>
        <td>
            <select name="term_meta[template]" id="term_meta[template]">
                <option <?php if( isset($term_meta['template']) && $term_meta['template'] == 'type1' ){ echo "selected='selected'"; } ?> value='type1'>Type 1</option>
				<option <?php if( isset($term_meta['template']) && $term_meta['template'] == 'type2' ){ echo "selected='selected'"; } ?> value='type2'>Type 2</option>
				<option <?php if( isset($term_meta['template']) && $term_meta['template'] == 'type3' ){ echo "selected='selected'"; } ?> value='type3'>Type 3</option>
				<option <?php if( isset($term_meta['template']) && $term_meta['template'] == 'type4' ){ echo "selected='selected'"; } ?> value='type4'>Type 4</option>
            </select>
        </td>
    </tr>
	<tr class="form-field">
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Post Column Number', 'magazinevibe'); ?></label>
        </th>
        <td>
            <select name="term_meta[column_number]" id="term_meta[column_number]">
				<option value='0'>Default</option>
                <option <?php if( isset($term_meta['column_number']) && $term_meta['column_number'] == 1 ){ echo "selected='selected'"; } ?> value='1'>One Column</option>
				<option <?php if( isset($term_meta['column_number']) && $term_meta['column_number'] == 2 ){ echo "selected='selected'"; } ?> value='2'>Two Columns</option>
				<option <?php if( isset($term_meta['column_number']) && $term_meta['column_number'] == 3 ){ echo "selected='selected'"; } ?> value='3'>Three Columns</option>
				<option <?php if( isset($term_meta['column_number']) && $term_meta['column_number'] == 4 ){ echo "selected='selected'"; } ?> value='4'>Four Columns</option>
            </select>
        </td>
    </tr>
    <tr class="form-field">
		<th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Featured Post Settings', 'magazinevibe'); ?></label>
        </th>
        <td>
			<div style="display: inline;">
				<label style="margin-right:5px" for="shortcode"><?php esc_html_e('Excerpt Length', 'magazinevibe'); ?></label>
				<input style="width:100px" type="text" name="term_meta[feature_excerpt_length]" id="term_meta[feature_excerpt_length]" size="3" value="<?php if( isset($term_meta['feature_excerpt_length']) && $term_meta['feature_excerpt_length'] != '' ){ echo esc_attr($term_meta['feature_excerpt_length']); } ?>">
			</div>
			<div style="display: inline;">
				<label style="margin-right:5px" for="shortcode"><?php esc_html_e('Custom Image Width(px)', 'magazinevibe'); ?></label>
				<input style="width:100px" type="text" name="term_meta[feature_thumb_image_width]" id="term_meta[feature_thumb_image_width]" size="3" value="<?php if( isset($term_meta['feature_thumb_image_width']) && $term_meta['feature_thumb_image_width'] != '' ){ echo esc_attr($term_meta['feature_thumb_image_width']); } ?>">
			</div>
			<div style="display: inline;">
				<label style="margin-right:5px" for="shortcode"><?php esc_html_e('Custom Image Height(px)', 'magazinevibe'); ?></label>
				<input style="width:100px" type="text" name="term_meta[feature_thumb_image_height]" id="term_meta[feature_thumb_image_height]" size="3" value="<?php if( isset($term_meta['feature_thumb_image_height']) && $term_meta['feature_thumb_image_height'] != '' ){ echo esc_attr($term_meta['feature_thumb_image_height']); } ?>">
			</div>
		</td>
    </tr>
    <tr class="form-field">
		<th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Non-Featured Post Settings', 'magazinevibe'); ?></label>
        </th>
        <td>
			<div style="display: inline;">
				<label style="margin-right:5px" for="shortcode"><?php esc_html_e('Excerpt Length', 'magazinevibe'); ?></label>
				<input style="width:100px" type="text" name="term_meta[excerpt_length]" id="term_meta[excerpt_length]" size="3" value="<?php if( isset($term_meta['excerpt_length']) && $term_meta['excerpt_length'] != '' ){ echo esc_attr($term_meta['excerpt_length']); } ?>">
			</div>
			<div style="display: inline;">
				<label style="margin-right:5px" for="shortcode"><?php esc_html_e('Custom Image Width(px)', 'magazinevibe'); ?></label>
				<input style="width:100px" type="text" name="term_meta[thumb_image_width]" id="term_meta[thumb_image_width]" size="3" value="<?php if( isset($term_meta['thumb_image_width']) && $term_meta['thumb_image_width'] != '' ){ echo esc_attr($term_meta['thumb_image_width']); } ?>">
			</div>
			<div style="display: inline;">
				<label style="margin-right:5px" for="shortcode"><?php esc_html_e('Custom Image Height(px)', 'magazinevibe'); ?></label>
				<input style="width:100px" type="text" name="term_meta[thumb_image_height]" id="term_meta[thumb_image_height]" size="3" value="<?php if( isset($term_meta['thumb_image_height']) && $term_meta['thumb_image_height'] != '' ){ echo esc_attr($term_meta['thumb_image_height']); } ?>">
			</div>
		</td>
    </tr>
<?php
}

function magazinevibe_edge_save_taxonomy_custom_fields( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;		
		$term_meta = get_option( "post_tax_term_$t_id" );
		
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ){
            if ( isset( $_POST['term_meta'][$key] ) ){
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
		update_option( "post_tax_term_$t_id", $term_meta );		
    }
}

add_action( 'category_edit_form_fields', 'magazinevibe_edge_taxonomy_custom_fields', 10, 2 );
add_action( 'edited_term', 'magazinevibe_edge_save_taxonomy_custom_fields', 10, 2 );

?>