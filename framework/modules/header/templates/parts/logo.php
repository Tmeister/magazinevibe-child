<?php do_action('magazinevibe_edge_before_site_logo'); ?>

<div class="edgtf-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php magazinevibe_edge_inline_style($logo_styles); ?>>
        <img class="edgtf-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="logo"/>
    </a>
</div>

<?php do_action('magazinevibe_edge_after_site_logo'); ?>