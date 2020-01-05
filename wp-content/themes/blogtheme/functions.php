<?php


// function to load the css and bootstrap starts

function load_stylesheets(){
	
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('bootstrap');

	wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
	wp_enqueue_style('style');

    wp_register_style('owlcss', get_template_directory_uri() . '/css/owl.carousel.css', array(), false, 'all');
    wp_enqueue_style('owlcss');

    wp_register_style('owlcsstheme', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), false, 'all');
    wp_enqueue_style('owlcsstheme');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

// function to load the css and bootstrap ends


// function to load the js starts
function include_jquery(){

	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery3.4.1.min.js', '', 1, true);
	add_action('wp_enqueue_scripts', 'jquery');

}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs(){
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/scripts.js', 'jquery', 1, true);
    wp_enqueue_script('owljs', get_template_directory_uri() . '/js/owl.carousel.js', 'jquery', 1, false);
}
add_action('wp_enqueue_scripts', 'loadjs');
// function to load the js ends


//adding theme support

add_theme_support('menus');

add_theme_support('post-thumbnails');

add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

//registering the menu
register_nav_menus(

	array(
		'top-menu' => __('Top Menu', 'theme'),
		'footer-menu' => __('Footer Menu', 'theme'),
	)
);


//fixing image smallest and largest size
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);


//function to register sidebar
function toursandtravels_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Home Page Sidebar', 'toursandtravels' ),
        'id'            => 'home-page-sidebar-1',
        'description'   => 'This sidebar shows the post in home page.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer', 'toursandtravels' ),
        'id'            => 'footer-area',
        'description'   => 'This sidebar shows the post in home page.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => __( 'Post Page Sidebar', 'toursandtravels' ),
        'id'            => 'post-page-sidebar-1',
        'description'   => 'This sidebar shows the post in home page.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));


    register_sidebar( array(
        'name'          => __( 'single/Page Sidebar', 'toursandtravels' ),
        'id'            => 'page-sidebar-1',
        'description'   => 'This sidebar shows the post in home page.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}    
add_action('widgets_init', 'toursandtravels_widgets_init');



/**
 * Registering widgets
 */
require get_template_directory() . '/widgets/tours-and-travels-custom-widget.php';
require get_template_directory() . '/widgets/video-upload-widget.php';




// function to create silder
function sli_slider_section(){
    ?>
    <section id="slider-section" class="owl-carousel owl-theme">

    <?php $slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 3)); ?>
    <?php foreach($slider as $slide): ?>
          <div class="item">
            <a href="<?php echo get_post_field('post_content', $slide->ID); ?>">
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)); ?> ">
            </a>
          </div>
    <?php endforeach; ?>
    </section>
    <script type="text/javascript">
        jQuery('.owl-carousel').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true
        });
    </script>
<?php
}
add_action('header_slider','sli_slider_section', 10);





/**
 * Register a Custom post type for.
**/
function custom_bootstrap_slider() {
    $labels = array(
        'name'               => _x( 'Slider', 'post type general name'),
        'singular_name'      => _x( 'Slide', 'post type singular name'),
        'menu_name'          => _x( 'Ashbin Slider', 'admin menu'),
        'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
        'add_new'            => _x( 'Add New', 'Slide'),
        'add_new_item'       => __( 'Name'),
        'new_item'           => __( 'New Slide'),
        'edit_item'          => __( 'Edit Slide'),
        'view_item'          => __( 'View Slide'),
        'all_items'          => __( 'All Slide'),
        'featured_image'     => __( 'Featured Image', 'text_domain' ),
        'search_items'       => __( 'Search Slide'),
        'parent_item_colon'  => __( 'Parent Slide:'),
        'not_found'          => __( 'No Slide found.'),
        'not_found_in_trash' => __( 'No Slide found in Trash.'),
    );

    $args = array(
        'labels'             => $labels,
        'menu_icon'          => 'dashicons-format-gallery',
        'description'        => __( 'Description.'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    );

    register_post_type( 'slider', $args );
}
add_action( 'init', 'custom_bootstrap_slider' );


// function for content of the post
if ( ! function_exists( 'tsn_words_count' ) ) :
    function tsn_words_count( $esn_content = null, $length = 1000 ) {
        $length = absint( $length );
        $source_content = preg_replace( '`\[[^\]]*\]`', '', $esn_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '...' );
        return $trimmed_content;
    }
endif;

