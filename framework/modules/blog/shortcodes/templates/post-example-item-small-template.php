<div class="edgtf-peis-item edgtf-post-item">
    <?php if(has_post_thumbnail()){ ?>
        <div class="edgtf-peis-image-holder">
            <a itemprop="url" class="edgtf-peis-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'magazinevibe_edge_search_page_image'); ?>
            </a>
        </div>
    <?php } ?>
    <div class="edgtf-peis-content-holder">
        <<?php echo esc_html( $title_tag)?> class="edgtf-peis-title">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self">
                <?php echo esc_attr(get_the_title()) ?>
            </a>
        </<?php echo esc_html($title_tag) ?>>
        <div class="edgtf-peis-info-section">
            <?php magazinevibe_edge_post_info_author(array(
                'author' => $display_author
            )) ?>
            <?php magazinevibe_edge_post_info_date(array(
                'date' => $display_date,
                'date_format' => $date_format
            )) ?>
        </div>
        <?php if($display_excerpt == 'yes'){ ?>
            <div class="edgtf-peis-excerpt">
                <?php magazinevibe_edge_excerpt($excerpt_length); ?>
            </div>
        <?php } ?>
    </div>
</div>