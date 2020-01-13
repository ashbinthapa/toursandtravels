	
	</div> <!-- #content -->
	</div> <!-- .body-wrapper -->

	<footer id="colophon" class="site-footer">
		<div class="all-fixed-width-wrapper">
			<div class="footer-wrapper">
				<?php
				if( is_active_sidebar( 'footer-area' ) ){
					dynamic_sidebar( 'footer-area' );
				}
				?>
			</div>
		</div>
	</footer> <!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
