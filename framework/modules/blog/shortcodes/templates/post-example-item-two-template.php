<div class="edgtf-peit-item edgtf-post-item">
    <?php if(has_post_thumbnail()){ ?>
        <div class="edgtf-peit-image-holder">
            <a itemprop="url" class="edgtf-peit-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'magazinevibe_edge_thumb'); ?>
            </a>
        </div>
    <?php } ?>
    <div class="edgtf-peit-content-holder">
        <div class="edgtf-peit-text-holder">
            <div class="edgtf-peit-text-inner">
                <<?php echo esc_html( $title_tag)?> class="edgtf-peit-title">
                    <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self">
                        <?php echo esc_attr(get_the_title()) ?>
                    </a>
                </<?php echo esc_html($title_tag) ?>>
                <?php if(!($display_author == 'no' && $display_date == 'no' && $display_rating == 'no')) { ?>
                <div class="edgtf-peit-info-section">
                    <?php magazinevibe_edge_post_info_author(array(
                        'author' => $display_author
                    )) ?>
                    <?php magazinevibe_edge_post_info_date(array(
                        'date' => $display_date,
                        'date_format' => $date_format
                    )) ?>
                    <?php magazinevibe_edge_post_info_rating(array(
                        'rating' => $display_rating
                    )) ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>