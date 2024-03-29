<?php
$month = get_the_time('m');
$year = get_the_time('Y');
?>
<div itemprop="dateCreated" class="edgtf-post-info-date entry-date updated">
    <?php if(!magazinevibe_edge_post_has_title()) { ?>
        <a itemprop="url" href="<?php the_permalink() ?>">
    <?php } else { ?>
    	<a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
    <?php }
    $format = isset($date_format) && $date_format !== '' ? $date_format : get_option('date_format'); ?>
    <span><?php the_time($format); ?></span>
    <?php if(!magazinevibe_edge_post_has_title()) { ?>
        </a>
    <?php } else { ?>
    	</a>
    <?php } ?>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(magazinevibe_edge_get_page_id()); ?>"/>
</div>