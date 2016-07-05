<div class="edgtf-tabs clearfix <?php echo esc_attr($tabs_layout) ?>">
    <div class="edgtf-tabs-nav">
    <?php if($tabs_title != '') { ?>
        <div class="edgtf-tabs-title-holder">
        <?php echo '<'.esc_html($title_tag) ?> class="edgtf-tabs-title">
            <?php echo esc_attr($tabs_title); ?>
        <?php echo '</'.esc_html($title_tag) ?>>
        </div>
    <?php } ?>
        <ul>
            <?php foreach ($tabs_titles as $tab_title) { ?>
                <li>
                    <a href="#tab-<?php echo sanitize_title($tab_title)?>"><?php echo esc_attr($tab_title)?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php echo do_shortcode($content) ?>
</div>