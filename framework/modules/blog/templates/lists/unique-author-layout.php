<?php

/***** Get current author page ID and meta boxes options from author admin panel *****/
$author_id = magazinevibe_edge_get_current_object_id();

$blog_page_range = magazinevibe_edge_get_blog_page_range();
$max_number_of_pages = magazinevibe_edge_get_max_number_of_pages();

$paged = magazinevibe_edge_paged();

/***** Get number of posts per page for current category *****/

$postsPerPage = intval(get_option('posts_per_page'));

/***** Set params for posts on author page *****/

$params = '';
$params .= ' author_id="'.$author_id.'"';

$number_of_posts = $postsPerPage;
$params .= ' number_of_posts="'.$number_of_posts.'"';

$column_number = 2;
$params .= ' column_number="'.$column_number.'"';

$excerpt_length = 24;
$params .= ' excerpt_length="'.$excerpt_length.'"';
?>

<div class="edgtf-unique-author-layout clearfix">
	<div class="edgtf-author-description">
		<div class="edgtf-author-description-inner">
			<div class="edgtf-author-description-image">
				<?php echo magazinevibe_edge_kses_img(get_avatar(get_the_author_meta( 'ID' ), 114)); ?>
			</div>
			<div class="edgtf-author-description-text-holder">
				<h6 class="edgtf-author-name vcard author">
					<?php
						if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
							echo esc_attr(get_the_author_meta('first_name')) . " " . esc_attr(get_the_author_meta('last_name'));
						} else {
							echo esc_attr(get_the_author_meta('display_name'));
						}
					?>
					<span class="edgtf-author-post-number"><?php the_author_posts(); ?><span><?php esc_html_e('POSTS', 'magazinevibe'); ?></span></span>
				</h6>
				<?php if(is_email(get_the_author_meta('email'))){ ?>
					<p class="edgtf-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
				<?php } ?>
				<?php if(get_the_author_meta('description') != "") { ?>
					<div class="edgtf-author-text">
						<p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
    <?php
    	echo do_shortcode("[edgtf_block_two $params]");
	?>
	<?php
		if(magazinevibe_edge_options()->getOptionValue('pagination') == 'yes') {
			magazinevibe_edge_pagination($max_number_of_pages, $blog_page_range, $paged);
		}
	?>
</div>