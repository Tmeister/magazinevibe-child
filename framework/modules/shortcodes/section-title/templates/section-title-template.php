<div class="edgtf-section-title clearfix">
    <div class="edgtf-st-inner">
        <div class="edgtf-st-title-inner">
        <?php if($title != '') { ?>
            <?php echo '<'.esc_html($title_tag) ?> class="edgtf-st-title"><?php echo esc_attr($title); ?><?php echo '</'.esc_html($title_tag) ?>>
        <?php } ?>
        </div>
        <div class="edgtf-st-link-inner">
            <?php if($link_address != '') { ?>
                    <a class="edgtf-st-link"  href="<?php echo esc_url($link_address)?>" target="<?php echo esc_attr($link_target) ?>">
                        <?php echo esc_attr($link_text) ?>
                    </a>
            <?php } ?>
        </div>
    </div>
</div>