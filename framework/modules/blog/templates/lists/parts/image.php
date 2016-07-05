<?php

$display_custom_feature_image_width = '';
if(magazinevibe_edge_options()->getOptionValue('blog_list_feature_image_max_width') !== ''){
	$display_custom_feature_image_width = intval(magazinevibe_edge_options()->getOptionValue('blog_list_feature_image_max_width'));
}
?>
<?php if ( has_post_thumbnail() ) { ?>
	<div class="edgtf-post-image">
		<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php if(!empty($display_custom_feature_image_width) && $display_custom_feature_image_width !== '') {
				the_post_thumbnail(array($display_custom_feature_image_width, 0));
			} else {
				the_post_thumbnail('magazinevibe_edge_post_feature_image');
			} ?>
		</a>
	</div>
<?php } ?>