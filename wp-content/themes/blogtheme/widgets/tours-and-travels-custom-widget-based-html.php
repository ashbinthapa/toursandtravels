<?php

if ( ! class_exists( 'tours_and_travels' ) ) {
	class tours_and_travels extends WP_Widget {
		public function __construct() {
			$widget_options = array( 
			  'classname' => 'tours_and_travels',
			  'description' => 'This widget display the title, image and content!',
			);
			parent::__construct( 'tours_and_travels', 'Toursandtravels: widget of tours and travels', $widget_options );
		}
		
		/* widget function displays the widget in the front end */
		public function widget( $args, $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$news_count = ! empty( $instance['news_count'] ) ? $instance['news_count'] : '';
			$tsn_selected_cat = ! empty( $instance['esn_cat'] ) ? esc_attr( $instance['esn_cat']) : '';


			if( $tsn_selected_cat != -1 ){
	            $sticky = get_option( 'sticky_posts' );
				$tsn_cat_post_args = array(
					'posts_per_page'      => $news_count,
					'cat'				  => $tsn_selected_cat,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'post__not_in' => $sticky
				);
			}						
			$news_query = new WP_Query($tsn_cat_post_args);
			if ($news_query->have_posts()){
				?>
				<div class="widget-title"> <?php echo $title; ?> </div>
				<div class="widget-main-wrapper-all">
					<?php
					while ($news_query->have_posts()): $news_query->the_post();
						if (has_post_thumbnail()) {
							$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
						} else {
							$image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
						}
						?>
						<div class="news-wrapper">
							<div class="title-image-wrapper">
								<div class="news-title-wrapper">
									<?php the_title('<h4 class="title"><a href="'.get_permalink().'">','</a></h4>'); ?>
								</div>
								<div class="image-wrapper">	
									<a href="<?php get_permalink()?>">
										<img src="<?php echo $image_url[0]; ?>">
									</a>		
								</div>
							</div>
							<?php		
							$content = tsn_words_count( get_the_excerpt() ,100);
							?>
							<div class="content-wrapper">
								<p><?php echo esc_html( $content );?></p>
							</div>
						</div>
					<?php		
					endwhile;
					?>
				</div> <!--end of main-wrapper -->	
				<?php	
			}
		}
		
		/* form function displays the widget in the back end */
		public function form( $instance ) {			
			$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; //for title
			$news_count = ! empty( $instance['news_count'] ) ? $instance['news_count'] : ''; //for title
			$tsn_selected_cat = ! empty( $instance['esn_cat'] ) ? esc_attr( $instance['esn_cat']) : '';
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'news_count' ); ?>">Count:</label>
				<input type="number" id="<?php echo $this->get_field_id( 'news_count' ); ?>" name="<?php echo $this->get_field_name( 'news_count' ); ?>" value="<?php echo esc_attr( $news_count ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('esn_cat'); ?>"><?php _e('Select Category', 'esn'); ?></label>
				<?php
				$esn_dropown_cat = array(
					'show_option_none'   => __('From Recent Posts','esn'),
					'orderby'            => 'name',
					'order'              => 'asc',
					'show_count'         => 1,
					'hide_empty'         => 1,
					'echo'               => 1,
					'selected'           => $esn_selected_cat,
					'hierarchical'       => 1,
					'name'               => $this->get_field_name('esn_cat'),
					'id'                 => $this->get_field_name('esn_cat'),
					'class'              => 'widefat',
					'taxonomy'           => 'category',
					'hide_if_empty'      => false,
				);
				wp_dropdown_categories($esn_dropown_cat);
				?>
			</p>


			<?php 
		}
		
		public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
            $instance['news_count'] = ( isset( $new_instance['news_count'] ) ) ? $new_instance['news_count'] : '';
            $instance['esn_cat'] = ( isset( $new_instance['esn_cat'] ) ) ? esc_attr( $new_instance['esn_cat'] ) : '';

            return $instance;
        }
	
	  
	} // class tours_and_travels ends here
}

if ( ! function_exists( 'tours_and_travels' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0.0
     *
     * @param null
     * @return void
     *
     */
    function tours_and_travels() {
        register_widget( 'tours_and_travels' );
    }
endif;
add_action( 'widgets_init', 'tours_and_travels' );

