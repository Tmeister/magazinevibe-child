<div class="edgtf-evp-holder">
	<?php
    if ($query_result->have_posts()):
        while ($query_result->have_posts()) : $query_result->the_post(); ?>

        	<?php 
				$featured_image = '';
				if ( has_post_thumbnail() ) {
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
					$featured_image = "background-image: url('".$thumb_url[0]."');";
				} 
			?>
            <div class="edgtf-evp-image-holder">
            	<div class="edgtf-evp-image-inner" <?php magazinevibe_edge_inline_style($featured_image); ?>>
            		<span class="edgtf-evp-image-icon arrow_triangle-right_alt"></span>
            		<div class="edgtf-evp-image">
            			<?php
							 echo get_the_post_thumbnail(get_the_ID(), 'full');
						?>	
            		</div>
            		<div class="edgtf-evp-image-text">
						<div class="edgtf-evp-image-text-outer">
            				<div class="edgtf-evp-image-text-inner">
		            			<?php magazinevibe_edge_post_info_category(array(
									'category' => $display_category
								)) ?>
								<<?php echo esc_html( $title_tag)?> class="edgtf-evp-title">
									<span><?php echo esc_attr(get_the_title()); ?></span>
								</<?php echo esc_html($title_tag) ?>>
		            			<div class="edgtf-evp-info-section">
			            			<?php magazinevibe_edge_post_info(array(
										'date' => $display_date
									)) ?>
								</div>	
		            		</div>
		            	</div>		
            		</div>
        		</div>	
            </div>
            <div class="edgtf-evp-video-holder">
            	<div class="edgtf-evp-video-close"><a href="#" class="icon_close"></a></div>
		    	<?php $_video_type = get_post_meta(get_the_ID(), "edgtf_video_type_meta", true);?>
				<?php if($_video_type == "youtube") { ?>
					<iframe  src="http://www.youtube.com/embed/<?php echo esc_attr(get_post_meta(get_the_ID(), "edgtf_post_video_id_meta", true));  ?>?wmode=transparent" wmode="Opaque" width="500" height="281" frameborder="0" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "vimeo"){ ?>
					<iframe src="http://player.vimeo.com/video/<?php echo esc_attr(get_post_meta(get_the_ID(), "edgtf_post_video_id_meta", true));  ?>?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } elseif ($_video_type == "self"){ ?>
					<div class="edgtf-self-hosted-video-holder">
						<div class="edgtf-mobile-video-image" style="background-image: url(<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_image_meta", true));  ?>);"></div>
						<div class="edgtf-video-wrap">
							<video class="edgtf-self-hosted-video" poster="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_image_meta", true));  ?>" preload="auto">
								<?php if(get_post_meta(get_the_ID(), "edgtf_post_video_webm_link_meta", true) != "") { ?> <source type="video/webm" src="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_webm_link_meta", true));  ?>"> <?php } ?>
								<?php if(get_post_meta(get_the_ID(), "edgtf_post_video_mp4_link_meta", true) != "") { ?> <source type="video/mp4" src="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_mp4_link_meta", true));  ?>"> <?php } ?>
								<?php if(get_post_meta(get_the_ID(), "edgtf_post_video_ogv_link_meta", true) != "") { ?> <source type="video/ogg" src="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_ogv_link_meta", true));  ?>"> <?php } ?>
								<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url(get_template_directory_uri().'/assets/js/flashmediaelement.swf'); ?>">
									<param name="movie" value="<?php echo esc_url(get_template_directory_uri().'/assets/js/flashmediaelement.swf'); ?>" />
									<param name="flashvars" value="controls=true&amp;file=<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_mp4_link_meta", true));  ?>" />
									<img src="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_video_image_meta", true));  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
								</object>
							</video>
						</div>
					</div>
				<?php } ?>
		    </div>
		    <a class="edgtf-evp-link" itemprop="url" href="<?php the_permalink(); ?>" target="_self"></a>
            <?php
        endwhile;
    else: ?>
   		<div class="edgtf-evp-messsage">
			<p><?php esc_html_e('No posts were found.', 'magazinevibe'); ?></p>
		</div>
	<?php endif;
		wp_reset_postdata();
	?>
</div>