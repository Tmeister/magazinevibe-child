<?php 
$featured_image = '';
if ( has_post_thumbnail() ) {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
	$featured_image = "background-image: url('".$thumb_url[0]."');";
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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content" <?php magazinevibe_edge_inline_style($featured_image); ?>>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<div class="edgtf-post-mark">
					<span class="icon_link_alt"></span>
				</div>
				<div class="edgtf-post-title">
					<h2 class="edgtf-link-text"><span><?php the_title(); ?></span></h2>
				</div>
			</div>
		</div>
		<a class="edgtf-post-link-link" href="<?php echo esc_html(get_post_meta(get_the_ID(), "edgtf_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>

	<?php the_content(); ?>

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
</article>