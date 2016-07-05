<div class="edgtf-list-paging-holder">
    <div class="edgtf-list-paging">
        <div data-rel="<?php echo esc_attr($params['query_result']->max_num_pages) ?> " class="edgtf-btn edgtf-list-load-more edgtf-load-more edgtf-btn-solid edgtf-btn-custom-hover-bg">
            <?php echo get_next_posts_link( esc_html__('SHOW MORE', 'magazinevibe'), $params['query_result']->max_num_pages ) ?>
        </div>
    </div>
    <div class="edgtf-list-paging-loading ">
        <div class="edgtf-btn edgtf-list-load-more-loading edgtf-btn-solid edgtf-btn-custom-hover-bg">
            <a href="javascript: void(0)" class="">
                <?php echo esc_html__('LOADING...', 'magazinevibe') ?>
            </a>
        </div>
    </div>
</div>