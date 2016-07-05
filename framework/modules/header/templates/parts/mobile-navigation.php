<?php do_action('magazinevibe_edge_before_mobile_navigation'); ?>

<nav class="edgtf-mobile-nav">
    <div class="edgtf-grid">
        <?php wp_nav_menu(array(
            'theme_location' => 'mobile-navigation' ,
            'container'  => '',
            'container_class' => '',
            'menu_class' => '',
            'menu_id' => '',
            'fallback_cb' => 'mobile_navigation_fallback',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'walker' => new MagazineVibeMobileNavigationWalker()
        )); ?>
    </div>
</nav>

<?php
    /* If menu not exist, show fallback function */
    function mobile_navigation_fallback() {
        print '<ul id="menu-mobile_menu"><li class="menu-item"><a href="'.esc_url(home_url('/')).'wp-admin/nav-menus.php?action=locations">'.esc_html__('Click here - to select or create a mobile menu','magazinevibe').'</a></li></ul>';
    }
?>

<?php do_action('magazinevibe_edge_after_mobile_navigation'); ?>