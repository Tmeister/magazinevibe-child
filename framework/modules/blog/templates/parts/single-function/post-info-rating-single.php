<?php $post_rating = magazinevibe_edge_get_post_rating()*20; ?>
<div class="edgtf-post-info-rating">
    <span class="edgtf-post-info-rating-inactive">
        <span class="edgtf-post-info-rating-active" style="width: <?php echo esc_attr($post_rating) ?>%"></span>
    </span>
    <div class="edgtf-post-info-rating-value"></div>
    <div class="edgtf-post-info-rating-message"></div>
</div>