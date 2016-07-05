<div class="edgtf-post-example-item-one-item edgtf-post-item">
    <?php if(has_post_thumbnail()){ ?>
    <div class="edgtf-post-example-item-one-image-holder">
        <div class="edgtf-post-example-item-one-image-holder-inner">
            <?php
            if($thumb_image_size != 'custom_size') {
                echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
            }
            elseif($thumb_image_width != '' && $thumb_image_height != ''){
                echo magazinevibe_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
            }
            ?>
            <a itemprop="url" class="edgtf-post-example-item-one-slide-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"></a>
        </div>
    </div>
    <?php } ?>
    <div class="edgtf-post-example-item-one-content-holder">
        <?php
            magazinevibe_edge_post_info_category(array(
                'category' => $display_category
            ));
        ?>
        <div class="edgtf-post-example-item-one-title-holder">
            <<?php echo esc_html($title_tag)?> class="edgtf-post-example-item-one-title">
                <a itemprop="url" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo esc_attr(get_the_title()) ?></a>
            </<?php echo esc_html($title_tag) ?>>
        </div>
        <?php if($display_excerpt == 'yes'){ ?>
        <div class="edgtf-post-example-item-one-excerpt">
            <div class="edgtf-post-excerpt">
            <?php
//                magazinevibe_edge_excerpt($excerpt_length);
                echo str_replace('&nbsp;', '', get_the_excerpt());
            ?>
            </div>
        </div>
        <?php } ?>
        <div class="edgtf-post-example-item-one-info-section-holder">
            <div class="edgtf-post-example-item-one-info-section">
                <?php magazinevibe_edge_post_info_date(array(
                    'date' => $display_date,
                    'date_format' => $date_format
                )) ?>
                <?php magazinevibe_edge_post_info_comments(array(
                    'comments' => $display_comments,
                    'type' => 'icon'
                )) ?>
                <?php magazinevibe_edge_post_info_like(array(
                    'like' => $display_like
                )) ?>
                <?php magazinevibe_edge_post_info_share(array(
                    'share' => $display_social_share
                )) ?>
            </div>
        </div>
    </div>
</div>