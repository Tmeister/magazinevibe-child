<?php do_action('magazinevibe_edge_before_page_header'); ?>

<header class="edgtf-page-header <?php echo esc_attr($header_type_class); ?>" <?php magazinevibe_edge_inline_style($header_area_styles); ?>>
    <div class="edgtf-logo-area" <?php magazinevibe_edge_inline_style($logo_area_background_color_header_type3); ?>>
        <?php if($logo_area_in_grid) : ?>
        <div class="edgtf-grid">
        <?php endif; ?>
            <?php if($header_type_two_is_set) { ?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            magazinevibe_edge_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <?php if(is_active_sidebar('edgtf-right-from-logo-area')) : ?>
                            <?php dynamic_sidebar('edgtf-right-from-logo-area'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-center">
                    <div class="edgtf-position-center-inner">
                        <?php if(!$hide_logo) {
                            magazinevibe_edge_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php if($logo_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        <div class="edgtf-fixed-wrapper">
    <?php endif; ?>
    <div class="edgtf-menu-area" <?php magazinevibe_edge_inline_style($menu_area_background_color_header_type3); ?>>
        <?php if($menu_area_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php magazinevibe_edge_get_main_menu(); ?>
                    </div>
                </div>

                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <?php if(is_active_sidebar('edgtf-right-from-main-menu')) : ?>
                            <?php dynamic_sidebar('edgtf-right-from-main-menu'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($menu_area_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        magazinevibe_edge_get_sticky_header();
    } ?>
</header>

<?php do_action('magazinevibe_edge_after_page_header'); ?>