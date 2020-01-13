<?php get_header();?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class= "container">
			<h1><?php the_title();?></h1>
			<?php if (have_posts()) : while(have_posts()) : the_post();?>
				<?php the_content();?>

			<?php endwhile; endif;?>

		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<div id="secondary" class="remaining-content-area">
	<main id="s-main" class="site-main-sidebar">
		<div class="main-widget-wrapper">
			<div class="esn-fixed-width-wrapper">
				<?php
				if( is_active_sidebar( 'post-page-sidebar-1' ) ){
					dynamic_sidebar( 'post-page-sidebar-1' );
				}?>
			</div>
		</div>
	</main><!-- #s-main -->
</div><!-- #secondary -->

<?php
get_footer();