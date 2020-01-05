<?php get_header();?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class= "container">
			<h1><?php single_cat_title();?></h1>
			<?php if (have_posts()) : while(have_posts()) : the_post();?>
				<div class= "card mb-4">
					<div class= "card-body">
						<h2><?php the_title();?></h2>
						<?php if(has_post_thumbnail()):?>
							<img src="<?php the_post_thumbnail_url('largest');?>" class="image">
						<?php endif;?>

						<?php the_excerpt();?>
					</div>
				</div>
			<?php endwhile; endif;?>

		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<div id="secondary" class="remaining-content-area">
	<main id="s-main" class="site-main-sidebar">
		<div class="main-widget-wrapper">
			<?php
			echo '<div class="esn-fixed-width-wrapper">';
				if( is_active_sidebar( 'page-sidebar-1' ) ){
					dynamic_sidebar( 'page-sidebar-1' );
				}
			echo '</div>';
		echo '</div>';?>
	</main><!-- #s-main -->
</div><!-- #secondary -->
<?php

get_footer();
