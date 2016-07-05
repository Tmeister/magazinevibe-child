<li class="edgtf-pcs-slide" data-thumb="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()))?>">
    <a class="edgtf-pcs-slide-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"></a>
    <div class="edgtf-pcs-image-holder">
        <?php
        if($thumb_image_size != 'custom_size') {
            echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
        }
        elseif($thumb_image_width != '' && $thumb_image_height != ''){
            echo magazinevibe_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
        }
        ?>
    </div>
    <div class="edgtf-pcs-content-holder">
        <?php magazinevibe_edge_post_info_category(array(
            'category' => $display_category
        )) ?>
        <?php if($display_info_box == 'yes'){ ?>
            <div class="edgtf-pcs-text-holder">
                <<?php echo esc_html( $title_tag)?> class="edgtf-post-example-item-single-title">
                    <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self" >
                        <?php echo esc_attr(get_the_title()) ?>
                    </a>
                </<?php echo esc_html($title_tag) ?>>
                <div class="edgtf-pcs-info-section">
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
                </div>
            </div>
        <?php } ?>
    </div>
</li>