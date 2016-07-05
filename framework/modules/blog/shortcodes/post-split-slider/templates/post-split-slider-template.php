<div class="edgtf-pss">
    <div class="edgtf-pss-inner">
        <div class="edgtf-pss-image-holder">
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
            <?php magazinevibe_edge_post_info_category(array(
                    'category' => $display_category
            )) ?>
        </div>
        <div class="edgtf-pss-text-holder">
            <<?php echo esc_html( $title_tag)?> class="edgtf-pss-title">
                <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" >
                    <?php echo esc_attr(get_the_title()) ?>
                </a>
            </<?php echo esc_html($title_tag) ?>>

            <div class="edgtf-pss-info-section">
                <?php magazinevibe_edge_post_info_date(array(
                    'date' => $display_date,
                    'date_format' => $date_format
                )) ?>
                <?php magazinevibe_edge_post_info(array(
                    'category' => 'no',
                    'author' => $display_author,
                    'comments' => $display_comments,
                    'like' => 'no',
                    'share' => 'no'
                )) ?>
            </div>
        </div>
    </div>
</div>