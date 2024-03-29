<?php do_action('magazinevibe_edge_before_mobile_header'); ?>

<header class="edgtf-mobile-header">
    <div class="edgtf-mobile-header-inner">
        <?php do_action( 'magazinevibe_edge_after_mobile_header_html_open' ) ?>
        <div class="edgtf-mobile-header-holder">
            <div class="edgtf-grid">
                <div class="edgtf-vertical-align-containers">
                    <?php if($show_navigation_opener) : ?>
                        <div class="edgtf-mobile-menu-opener">
                            <a href="javascript:void(0)">
                                <span class="edgtf-mobile-opener-icon-holder">
                                    <?php if($enable_mobile_menu_icon) {
                                        print $menu_opener_icon;
                                    } else { ?>
                                        <span class="edgtf-mobile-menu-icon"></span>
                                    <?php } ?>
                                    <?php if($mobile_menu_title !== '') { ?>
                                        <span class="edgtf-mobile-menu-text <?php echo esc_attr($mobile_menu_title_class); ?>"><?php echo esc_attr($mobile_menu_title); ?></span>
                                    <?php } ?>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($show_logo) : ?>
                        <div class="edgtf-position-center">
                            <div class="edgtf-position-center-inner">
                                <?php magazinevibe_edge_get_mobile_logo(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="edgtf-position-right">
                        <div class="edgtf-position-right-inner">
                            <?php if(is_active_sidebar('edgtf-right-from-mobile-logo')) {
                                dynamic_sidebar('edgtf-right-from-mobile-logo');
                            } ?>
                        </div>
                    </div>
                </div> <!-- close .edgtf-vertical-align-containers -->
            </div>
        </div>
        <?php magazinevibe_edge_get_mobile_nav(); ?>
    </div>
</header> <!-- close .edgtf-mobile-header -->

<?php do_action('magazinevibe_edge_after_mobile_header'); ?>