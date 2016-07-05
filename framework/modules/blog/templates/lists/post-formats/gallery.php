<?php

$display_category = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_category') !== ''){
	$display_category = magazinevibe_edge_options()->getOptionValue('blog_list_category');
}

$display_date = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_date') !== ''){
	$display_date = magazinevibe_edge_options()->getOptionValue('blog_list_date');
}

$display_time = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_time') !== ''){
	$display_time = magazinevibe_edge_options()->getOptionValue('blog_list_time');
}

$display_author = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_author') !== ''){
	$display_author = magazinevibe_edge_options()->getOptionValue('blog_list_author');
}

$display_comments = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_comment') !== ''){
	$display_comments = magazinevibe_edge_options()->getOptionValue('blog_list_comment');
}

$display_like = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_like') !== ''){
	$display_like = magazinevibe_edge_options()->getOptionValue('blog_list_like');
}

$display_share = 'yes';
if(magazinevibe_edge_options()->getOptionValue('blog_list_share') !== ''){
	$display_share = magazinevibe_edge_options()->getOptionValue('blog_list_share');
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		
		<?php magazinevibe_edge_get_module_template_part('templates/lists/parts/gallery', 'blog'); ?>

		<div class="edgtf-post-title-area">
			<?php magazinevibe_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>

			<div class="edgtf-post-info">
				<?php magazinevibe_edge_post_single_info(array(
					'date' => $display_date, 
					'category' => $display_category,
					'time' => $display_time,  
					'author' => $display_author, 
					'comments' => $display_comments, 
					'like' => $display_like,
					'share' => $display_share
				)) ?>
			</div>
		</div>

		<?php magazinevibe_edge_excerpt($excerpt_length); ?>

		<div class="edgtf-post-read-more-holder">
			<?php magazinevibe_edge_read_more_button(); ?>
		</div>
	</div>
	<?php do_action('magazinevibe_edge_before_blog_article_closed_tag'); ?>
</article>