<?php



# custom excerpt length
function custom_excerpt_length( $length ) {
    return 35; # character limit
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

# change excerpt more text
function custom_excerpt_more( $more ) {
    return '...'; 
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );



# truncate titles
/* function max_title_length( $title ) {
	$max = 40;

	if ( strlen($title) > $max ) {
		return substr($title, 0, $max). " …";
	} else {
		return $title;
	}
}
	 
add_filter( 'the_title', 'max_title_length'); */



# enqueue stylesheets 
function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bs/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-reboot_css', get_template_directory_uri() . '/css/bs/bootstrap-reboot.min.css' );
	wp_enqueue_style( 'bootstrap-grid_css', get_template_directory_uri() . '/css/bs/bootstrap-grid.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/css/theme.css' );
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');
	wp_enqueue_style( 'googlefont_css', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );



# enqueue javascript and jquery
function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap_bundle', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array('jquery'), '', true );
	#wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '', true );
	#wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), 'bootstrap_js', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js' );



# add support for menus and post thumbnails
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );



# register navwalker for menus
require_once('bs4navwalker.php');

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'	=> __( 'Header Menu' ),
			'footer_menu'	=> __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );


add_filter('widget_text','execute_php',100);
function execute_php($html){
    if(strpos($html,"<"."?php")!==false){
        ob_start();
        eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
};



# custom login screen
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/AccDev_logo_blue.png);
          height: auto;
          width: 100%;
          background-size: 15rem auto;
          background-repeat: no-repeat;
          padding-bottom: 4rem;
        }
        #login #wp-submit {
          background-color: #00549E !important;
          text-shadow: none !important;
          border: none !important;
		  outline: none !important;
		  padding: 0rem 2rem;
    	  border-radius: 0.5rem;
		  font-size: 1rem;
		  font-weight: 600;
		  color: #F2F2F2;
        }
		#login #wp-submit:hover {
          background-color: #00549E !important;
          text-shadow: none !important;
          border: none !important;
		  color: #FAFAFA;
        }
        .login {
        	background-color: #F2F2F2;
			font-family: "Open Sans", sans-serif;
        }
        #nav a,
		#backtoblog a {
        	color: #00549E !important;
        }

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
add_filter( 'http_request_host_is_external', '__return_true' );



# pagination for blog posts
function post_pagination() {
  
    if( is_singular() )
        return;
  
    global $wp_query;
  
    /* stop execution if there's only 1 page (set how many posts to show in Settings > Reading on WP dashboard) */
    if( $wp_query->max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
  
    /* add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
  
    /* add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
  
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  
    echo '<div class="pagination"><ul>' . "\n";
  
    /* previous post link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
  
    /* link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
  
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
  
    /* link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
    /* link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
  
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
  
    /* next post link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
  
    echo '</ul></div>' . "\n";
  
}



# button shortcode
function button_shortcode($atts, $content = null) {

    /* set default text and href */
    $atts = shortcode_atts(
        array(
            'text' => 'Button',
            'href' => '#',
        ),
        $atts,
        'button'
    );

    $text = esc_attr($atts['text']);
    $href = esc_url($atts['href']);

    // output html
    $output = '<a href="' . $href . '" class="btn btn-blue" target="_blank">' . $text . '</a>';
    return $output;

}
add_shortcode('button', 'button_shortcode');



?>