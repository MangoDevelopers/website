<?php
/*
 * Use a child theme for customization (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes).
 * @package WordPress - n/a
 * @subpackage wport
 * @since wport 0.2
 * © 2015 Larry Judd Oliver, Tradesouthwest.com
 */
include_once get_template_directory() . '/include/theme-customizer.php';

function wport_setup() {
    
    // set width of external linked media players not defined
     global $content_width;
    if ( !isset( $content_width  ) ) {
        $content_width  = 720;
    }

    // custom editor style support
    add_editor_style( 'editor-style.css' );
    
    // This theme uses Featured Images (change size below by removing comment element)
    add_theme_support( 'post-thumbnails' ); 
        //set_post_thumbnail_size( 250, 250 );

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // for WordPress 4.1 and above only
    add_theme_support( 'title-tag' ); 

    // language support - add your translation
    load_theme_textdomain('wport', get_template_directory() . '/languages');

    // This theme uses wp_nav_menu in one location.
    register_nav_menus( array(
        'primary' => __( 'Main Primary Navigation', 'wport' )
        ) );     

    // Add HTML5 elements
    add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
  
    //Enable support for site background
    add_theme_support( 'custom-background', array(
	'default-color'          => 'fcfcfc',
    ));

    // custom header image support  - small logo in top left corner
    add_theme_support( 'custom-header' ); 
    $args = array(
	'width'          => 60,
	'height'         => 60,
	'header-text'    => false,
        'uploads'        => true,
	'random-default' => false,
    );
    add_theme_support( 'custom-header', $args );

}
add_action('after_setup_theme', 'wport_setup');

function wport_add_theme_scripts() {    
   
    // Loads default main stylesheet.
    wp_enqueue_style( 'style', get_stylesheet_uri() ); 
    
    // Loads JavaScript file with functionality for mobile menu.
    wp_enqueue_script( 'wport-mobinav', get_template_directory_uri() . '/js/mobilenav.js', array( 'jquery' ) );

     /*
      * Adds JavaScript to pages with the comment form to support
      * sites with threaded comments (when in use).
      */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );  
}
add_action( 'wp_enqueue_scripts', 'wport_add_theme_scripts' );

    // Add ie conditional html5 shim to header
function wport_add_ie_html5_shim () {
      echo "<!--[if lt IE 9]>\n";
        echo '<script src="', get_template_directory_uri() .'/js/html5.js"></script>'."\n";
        echo '<meta http-equiv="X-UA-Compatible" content="IE=9"/>'."\n";
        echo "<![endif]-->\n";
}
    add_action('wp_head', 'wport_add_ie_html5_shim');

/**
 * Filters the page title appropriately depending on the current page
 *
 * @uses	get_bloginfo()
 * @uses	is_home()
 * @uses	is_front_page()
 *
 * @since wport 0.1
 */
function wport_filter_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wport' ), max( $paged, $page ) );

	return $title;
}
  
// init widgets 
function wport_widgets_init() {
    register_sidebar(array(
            'name' => __('Primary Footer Widget Right Side', 'wport'),
            'id' => 'sidebar',
            'description' => __('The main footer widget area', 'wport'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>',
        ));
}
add_action( 'widgets_init', 'wport_widgets_init' );

/**
 * Function to show comment count in header and footers
 * @uses get_comment_number
 */
function wport_show_comments_count() {
    $commentscount = get_comments_number();
        if( $commentscount < 1 ) { 
		    echo ""; } else { 
			echo $commentscount; } 
}
add_action ( 'wport_show_comments_count', 'wport_show_comments_count' );

/**
 * Add pagination
 *
 * @uses	paginate_links()
 * @uses	add_query_arg()
 *
 * @since wport 0.1
 */
function wport_pagination() {
	global $wp_query;

	$current = max( 1, get_query_var('paged') );
	$big = 999999999; // need an unlikely integer

	$pagination_return = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => $current,
		'total' => $wp_query->max_num_pages,
		'next_text' => '&raquo;',
		'prev_text' => '&laquo;'
	) );

	if ( ! empty( $pagination_return ) ) {
		echo '<div id="navigation">';
		echo '<div class="total-pages">';
		printf( __( 'Page %1$s of %2$s', 'wport' ), $current, $wp_query->max_num_pages );
		echo '<div class="sep"> </div></div>';
		echo $pagination_return;
		echo '</div>';
	}
} 

?>