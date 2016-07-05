<?php

$enable_single_excerpt = true;
if(magazinevibe_edge_options()->getOptionValue('enable_single_excerpt') === 'no'){
	$enable_single_excerpt = false;
}

$single_excerpt_length = 35;
if(magazinevibe_edge_options()->getOptionValue('single_excerpt_length') !== ''){
	$single_excerpt_length = magazinevibe_edge_options()->getOptionValue('single_excerpt_length');
}

$display_category = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_category') !== ''){
	$display_category = magazinevibe_edge_options()->getOptionValue('blog_single_category');
}

$display_date = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_date') !== ''){
	$display_date = magazinevibe_edge_options()->getOptionValue('blog_single_date');
}

$display_time = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_time') !== ''){
	$display_time = magazinevibe_edge_options()->getOptionValue('blog_single_time');
}

$display_author = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_author') !== ''){
	$display_author = magazinevibe_edge_options()->getOptionValue('blog_single_author');
}

$display_comments = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_comment') !== ''){
	$display_comments = magazinevibe_edge_options()->getOptionValue('blog_single_comment');
}

$display_like = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_like') !== ''){
	$display_like = magazinevibe_edge_options()->getOptionValue('blog_single_like');
}

$display_count = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_count') !== ''){
	$display_count = magazinevibe_edge_options()->getOptionValue('blog_single_count');
}

$display_share = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_single_share') !== ''){
	$display_share = magazinevibe_edge_options()->getOptionValue('blog_single_share');
}

$id = magazinevibe_edge_get_page_id();

$feature_image_style = '';
if(get_post_meta($id, "edgtf_post_feature_image_style", true) !== "") {
    $feature_image_style = get_post_meta($id, "edgtf_post_feature_image_style", true);
}

$display_feature_image = true;
if(get_post_meta($id, "edgtf_post_disable_feature_image", true) === "yes") {
    $display_feature_image = false;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<?php if ($feature_image_style !== 'edgtf-data-and-image-are-disabled') { ?>
			<?php if ($feature_image_style === 'edgtf-data-inside-title') { ?>
				<div class="edgtf-post-content-inner <?php echo esc_attr($feature_image_style); ?>">
			<?php } ?>

				<?php if($display_feature_image && $feature_image_style === 'edgtf-data-inside-title') { magazinevibe_edge_get_module_template_part('templates/single/parts/image', 'blog'); } ?>

				<div class="edgtf-post-title-area">
					<?php magazinevibe_edge_post_info_category(array('category' => $display_category)) ?>

					<?php magazinevibe_edge_get_module_template_part('templates/single/parts/title', 'blog'); ?>

					<?php if($enable_single_excerpt){ ?>
						<?php magazinevibe_edge_excerpt($single_excerpt_length); ?>
					<?php } ?>

					<div class="edgtf-post-info">
						<?php magazinevibe_edge_post_single_info(array(
							'date' => $display_date, 
							'time' => $display_time,  
							'author' => $display_author, 
							'comments' => $display_comments, 
							'like' => $display_like, 
							'count' => $display_count, 
							'share' => $display_share
						)) ?>
					</div>
				</div>

				<div class="top-content">
					<?php echo do_shortcode('[bsa_pro_ad_space id=8 if_empty=17 crop=no]'); ?>
				</div>

				<?php if($display_feature_image && $feature_image_style !== 'edgtf-data-inside-title') { magazinevibe_edge_get_module_template_part('templates/single/parts/image', 'blog'); } ?>

			<?php if ($feature_image_style === 'edgtf-data-inside-title') { ?>
				</div>
			<?php } ?>
		<?php } ?>	
		
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php do_action('magazinevibe_edge_before_blog_article_closed_tag'); ?>
</article>