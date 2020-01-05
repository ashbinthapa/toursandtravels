<?php 


	echo '</div>';//<!-- #content -->
	echo '</div>';//<!-- .body-wrapper -->

	echo '<footer id="colophon" class="site-footer">';
		echo '<div class="all-fixed-width-wrapper">';
			echo '<div class="footer-wrapper">';
				if( is_active_sidebar( 'footer-area' ) ){
					dynamic_sidebar( 'footer-area' );
				}
			echo '</div>';
		echo '</div>';
	echo '</footer>';//<!-- #colophon -->
echo '</div>';//<!-- #page -->

wp_footer(); ?>

</body>
</html>
