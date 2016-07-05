<div class="edgtf-related-posts-holder">
	<?php if ( $related_posts && $related_posts->have_posts() ) : ?>
		<div class="edgtf-related-posts-title">
			<h6><?php esc_html_e('RELATED ARTICLES', 'magazinevibe' ); ?></h6>
		</div>
		<div class="edgtf-related-posts-inner clearfix">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
				<div class="edgtf-related-post">
					<div class="edgtf-related-post-image">
						<?php if (has_post_thumbnail()) { ?>
							<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php if($related_posts_image_size !== '') {
									the_post_thumbnail(array($related_posts_image_size, 0));
								} else {
									the_post_thumbnail('magazinevibe_edge_post_feature_image');
								} ?>
							</a>	
						<?php }	?>
					</div>
					<div class="edgtf-related-post-title">
						<h5 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					</div>
					<div class="edgtf-related-post-info">
						<?php magazinevibe_edge_post_info_date(array(
							'date' => 'yes',
							'date_format' => 'M d, Y'
						)) ?>
						<?php magazinevibe_edge_post_single_info(array(							
							'comments' => 'yes',
							'like' => 'yes'
						)) ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; 
	wp_reset_postdata();
	?>
</div>