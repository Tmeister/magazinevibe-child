<div class="edgtf-block-slider-navigation-holder">
    <div class="edgtf-block-slider-navigation">
        <a class="edgtf-block-nav-prev icon-arrows-left"></a>
        <div class="edgtf-block-slider-paging">
            <?php
            $counter = 1;
            while($counter <= $max_pages){ ?>
                <a class="edgtf-block-slider-paging-page" href="#"><?php echo esc_attr($counter++) ?></a>

            <?php } ?>
        </div>
        <a class="edgtf-block-nav-next icon-arrows-right"></a>
    </div>
</div>