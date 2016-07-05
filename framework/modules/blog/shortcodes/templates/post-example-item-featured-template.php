<div class="edgtf-post-example-item-featured-image edgtf-post-item">
    <a itemprop="url" class="edgtf-post-example-item-featured-slide-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
        <?php
        if($thumb_image_size != 'custom_size') {
            echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
        }
        elseif($thumb_image_width != '' && $thumb_image_height != ''){
            echo magazinevibe_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
        }
        ?>
    </a>
    <?php magazinevibe_edge_post_info_category(array(
        'category' => $display_category
    )) ?>
    <div class="edgtf-post-example-item-featured-text-holder" <?php magazinevibe_edge_inline_style($box_styles); ?>>
        <<?php echo esc_html( $title_tag)?> class="edgtf-post-example-item-single-title">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self" >
                <?php echo esc_attr(get_the_title()) ?>
            </a>
        </<?php echo esc_html($title_tag) ?>>
        <div class="edgtf-post-example-item-featured-info-section">
            <?php magazinevibe_edge_post_info_date(array(
                'date' => $display_date,
                'date_format' => $date_format
            )) ?>
            <?php magazinevibe_edge_post_info_author(array(
                'author' => $display_author
            )) ?>
            <?php magazinevibe_edge_post_info_comments(array(
                'comments' => $display_comments
            )) ?>
            <?php magazinevibe_edge_post_info_share(array(
                'share' => $display_social_share
            )) ?>
        </div>
    </div>
</div>