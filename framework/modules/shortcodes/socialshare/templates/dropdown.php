<div class="edgtf-social-share-holder edgtf-dropdown <?php echo esc_attr($type); ?>">
	<a href="javascript:void(0)" target="_self" class="edgtf-social-share-dropdown-opener">
		<span class="edgtf-social-share-title"><?php esc_html_e('SHARE', 'magazinevibe') ?></span>
	</a>
	<div class="edgtf-social-share-dropdown">
		<ul>
			<?php foreach ($networks as $net) {
				print $net;
			} ?>
		</ul>
	</div>
</div>