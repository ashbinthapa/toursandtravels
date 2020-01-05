<!DOCTYPE html>
<html>
<head>
	<link crossorigin='anonymous' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' rel='stylesheet'/>
	<?php wp_head();?>
</head>
<body <?php body_class();?>>
<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="blog-fixed-width-wrapper">
				<div class="blog-logo-and-menu">
					<div class="logo-wrapper">
						<?php
							//if ( function_exists( 'the_custom_logo' ) ) {
		 						the_custom_logo();
							//}
						?>
					</div>
					<div class="menu-wrapper">
						<?php wp_nav_menu (
						array(
							'theme_location' => 'top-menu',
							'container_class' => 'navigation-bar'
						)
						);?>
					</div>		
				</div> <!-- End of logo -->	
			</div>
		</header> 
		<div class="body-wrapper">
		<div id="content" class="site-content">