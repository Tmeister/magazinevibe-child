<?php do_action('magazinevibe_edge_before_mobile_logo'); ?>

<div class="edgtf-mobile-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php magazinevibe_edge_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="mobile-logo"/>
    </a>
</div>

<?php do_action('magazinevibe_edge_after_mobile_logo'); ?>