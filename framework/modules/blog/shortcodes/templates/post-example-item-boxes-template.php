<div class="edgtf-post-example-item-boxes edgtf-post-item">
    <div class="edgtf-post-example-item-boxes-image">
        <a itemprop="url" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
            <?php
            if($thumb_image_size != 'custom_size') {
                echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
            }
            elseif($thumb_image_width != '' && $thumb_image_height != ''){
                echo magazinevibe_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
            }
            ?>

        </a>
    </div>
    <div class="edgtf-post-example-item-boxes-content">
        <div class="edgtf-post-example-item-boxes-title">
            <<?php echo esc_html($title_tag)?> class="edgtf-post-example-item-three-title">
                <a itemprop="url" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo esc_attr(get_the_title()) ?></a>
            </<?php echo esc_html($title_tag) ?>>
        </div>
        <div class="edgtf-post-example-item-boxes-info">
            <?php magazinevibe_edge_post_info_author(array(
                'author' => $display_author
            )) ?>
            <?php magazinevibe_edge_post_info_date(array(
                'date' => $display_date,
                'date_format' => $date_format
            )) ?>
        </div>
    </div>
</div>    