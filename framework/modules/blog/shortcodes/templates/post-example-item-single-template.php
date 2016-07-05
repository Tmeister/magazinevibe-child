<div class="edgtf-post-example-item-single edgtf-post-item">
    <div class="edgtf-post-example-item-single-inner">
        <?php if(has_post_thumbnail()){ ?>
        <div class="edgtf-post-example-item-single-image-holder">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                <div class="edgtf-post-example-item-single-image-inner-holder">
                    <?php
                    if($thumb_image_size != 'custom_size') {
                        echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                    }
                    elseif($thumb_image_width != '' && $thumb_image_height != ''){
                        echo magazinevibe_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
                    }
                    ?>
                </div>
            </a>
            <?php magazinevibe_edge_post_info_category(array(
                'category' => $display_category
            )) ?>
        </div>
        <?php } ?>
        <div class="edgtf-post-example-item-single-text-holder">
            <<?php echo esc_html( $title_tag)?> class="edgtf-post-example-item-single-title">
                <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self" >
                    <?php echo esc_attr(get_the_title()) ?>
                </a>
            </<?php echo esc_html($title_tag) ?>>
            <div class="edgtf-post-example-item-single-info-section">
                <?php magazinevibe_edge_post_info_date(array(
                    'date' => $display_date,
                    'date_format' => $date_format
                )) ?>
                <?php magazinevibe_edge_post_info_comments(array(
                    'comments' => $display_comments
                )) ?>
            </div>
            <div class="edgtf-post-example-item-single-info-content">
                <?php the_content();?>
            </div>
        </div>
    </div>
</div>