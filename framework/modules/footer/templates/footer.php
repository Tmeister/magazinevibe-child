<?php
/**
 * Footer template part
 */
?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<footer <?php magazinevibe_edge_class_attribute($footer_classes); ?>>
	<div class="edgtf-footer-inner clearfix">

		<?php

		if($display_footer_top) {
			magazinevibe_edge_get_footer_top();
		}
		if($display_footer_bottom) {
			magazinevibe_edge_get_footer_bottom();
		}
		?>

	</div>
</footer>

</div> <!-- close div.edgtf-wrapper-inner  -->
</div> <!-- close div.edgtf-wrapper -->
<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45112534-1', 'vapingcheap.com');
  ga('send', 'pageview');

</script>
</body>
</html>
