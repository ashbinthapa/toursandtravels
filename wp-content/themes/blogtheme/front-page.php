<?php get_header();?>

<!--<div class= "container">
	<?php if (have_posts()) : while(have_posts()) : the_post();?>
		<div class= "card mb-4">
			<div class= "card-body">
				<h2><?php the_title();?></h2>
				<?php if(has_post_thumbnail()):?>
					<img src="<?php the_post_thumbnail_url('largest');?>" class="image">
				<?php endif;?>

				<?php the_excerpt();?>
				<a href="<?php the_permalink();?> class="btn btn-success">Read More</a>
			</div>
		</div>
	<?php endwhile; endif;?>

</div>
-->


<div class="tours-bac-image">
	<?php
		do_action( 'header_slider' );
	?>
</div>

<div class="main-widget-wrapper">
	<?php
	echo '<div class="esn-fixed-width-wrapper">';
		if( is_active_sidebar( 'home-page-sidebar-1' ) ){
			dynamic_sidebar( 'home-page-sidebar-1' );
		}
	echo '</div>';
echo '</div>';
get_footer();
?>