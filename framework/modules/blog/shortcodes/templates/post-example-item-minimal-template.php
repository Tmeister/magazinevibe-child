<div class="edgtf-pei-minimal edgtf-post-item">
    <div class="edgtf-pei-text-inner">
        <<?php echo esc_html( $title_tag)?> class="edgtf-pei-title">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self">
                <?php echo esc_attr(get_the_title()) ?>
            </a>
        </<?php echo esc_html($title_tag) ?>>
        <div class="edgtf-pei-info-section">
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