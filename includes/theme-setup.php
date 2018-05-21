<?php


/*--------------------------------------------------------------*/
/*                   Theme Setup Here                           */                      
/*--------------------------------------------------------------*/

load_theme_textdomain( 'doubledown', TEMPLATEPATH .'/languages' );

//----------Include General Functions-------------------------

include_once(TEMPLATEPATH .'/includes/options.lib.php');
//---Add Helper Functions
include_once(TEMPLATEPATH .'/includes/helper-functions.php');

//----------Include Option Panels-----------------------------

include_once(TEMPLATEPATH .'/includes/theme-options.php');
include_once(TEMPLATEPATH .'/includes/design-options.php');

//---Redirect URLs and Hide Affiliate Links
include_once(TEMPLATEPATH .'/includes/redirects.php');

// Hit counter on affiliate links
include_once(TEMPLATEPATH .'/includes/hitcounter.php');               

//---Banner Panel and Widget
include_once(TEMPLATEPATH .'/includes/banner-manager.php');

//---Add Affiliate Post Type and Meta Boxes
include_once(TEMPLATEPATH .'/includes/custom_meta_boxes.php');




// Add Color picker to all admin pages
add_action( 'admin_enqueue_scripts', 'cdf_enqueue_scripts' );
	function cdf_enqueue_scripts( $hook_suffix ) {
  		wp_enqueue_style( 'wp-color-picker' );
         	wp_enqueue_script( 'flytonic-colors', get_bloginfo('template_url').'/includes/js/flytonic_color_picker.js', array( 'wp-color-picker' ), false, true );
 		wp_enqueue_script('jquery-ui-dialog');        
    		wp_enqueue_style('wp-jquery-ui-dialog');

			wp_enqueue_script('template-hide', get_bloginfo('stylesheet_directory').'/includes/js/templatehide.js', array('jquery'));
	}


// Set outbound affiliate redirect slug, default is "visit"

function fly_redirect_slug() {
	if (get_theme_option('redirect-slug')){
	$redirectkey=get_theme_option('redirect-slug');
 	  
	} else { $redirectkey = 'visit'; 	 
     	}

    	 return $redirectkey;
}


//Add Columns to Fantasy Post Type
function casino_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Title",
    "description" => "Description",
    "bonustext" => "Bonus Info",
    "rating" => "Rating",
  "roomurl" => "Affiliate URL",
  'date' => "Post Date"
  );
 
  return $columns;
}

//Add Columns to Casino Post Type
function casino_custom_columns($column){
  global $post;
 
  switch ($column) {
    case 'description':
        the_excerpt();
      break;
 
    case 'bonustext':
         echo get_post_meta( $post->ID , '_as_bonustext' , true ); 
      break;
    case 'rating':
       echo get_post_meta( $post->ID , '_as_rating' , true ); 
      break;

 case 'roomurl':
       echo get_post_meta( $post->ID , '_as_roomurl' , true ); 
	    echo '<br />';
		echo '<a target="_blank" href="      '.get_bloginfo('url').'/'.fly_redirect_slug().'/'.get_post_meta( $post->ID , '_as_redirectkey' , true ).'/            ">'.get_bloginfo('url').'/'.fly_redirect_slug().'/'.get_post_meta( $post->ID , '_as_redirectkey' , true ).'/</a>'; 
      break;

  }
}
add_action("manage_posts_custom_column",  "casino_custom_columns");
add_filter("manage_edit-casino_columns", "casino_edit_columns");


//-------------------------Widget Setup----------------------------

function flytonic_widgets() {
	// Sidebar 1
	register_sidebar( array(
		'name' => __('Right Sidebar', 'doubledown'),
		'id' => 'sidebar1-widgets',
		'description' =>  __('Main Sidebar Area', 'doubledown'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Footer Widget 1
	register_sidebar( array(
		'name' => __('Footer Widget 1', 'doubledown'),
		'id' => 'footer1-widgets',
		'description' =>  __('Footer Widget Area 1', 'doubledown'),
        'before_widget' => '<section class="footerwidget">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Footer Widget 2
	register_sidebar( array(
	'name' => __('Footer Widget 2', 'doubledown'),
		'id' => 'footer2-widgets',
		'description' =>  __('Footer Widget Area 2', 'doubledown'),
        'before_widget' => '<section class="footerwidget">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Footer Widget 3
	register_sidebar( array(
	'name' => __('Footer Widget 3', 'doubledown'),
		'id' => 'footer3-widgets',
		'description' =>  __('Footer Widget Area 3', 'doubledown'),
       'before_widget' => '<section class="footerwidget">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

        // Footer Widget 4
	register_sidebar( array(
	'name' => __('Footer Widget 4', 'doubledown'),
		'id' => 'footer4-widgets',
		'description' =>  __('Footer Widget Area 4', 'doubledown'),
		'before_widget' => '<section class="footerwidget">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	        // Footer Widget 5
	register_sidebar( array(
	'name' => __('Footer Widget 5', 'doubledown'),
		'id' => 'footer5-widgets',
		'description' =>  __('Footer Widget Area 5', 'doubledown'),
		'before_widget' => '<section class="footerwidget last">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


	// Header Widgets
	register_sidebar( array(
	'name' => __('Header Widgets', 'doubledown'),
		'id' => 'headertop-widgets',
		'description' =>  __('Top Banner Widget Area', 'doubledown'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div><!--.widget-->',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
}

add_action('widgets_init', 'flytonic_widgets');

//Theme Support for Thumbnails
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	    add_theme_support( 'post-thumbnails' );
	    set_post_thumbnail_size( 150, 150, true ); // Normal post thumbnails
	}

//  Add image sizes for casino logos
if ( function_exists( 'add_image_size' ) ) { 
	   add_image_size( 'casino-icon', 120, 120, false );  
	   add_image_size( 'casino-logo', 200, 200, false );  
	   add_image_size( 'slideimg', 800, 800, false ); 
	   add_image_size( 'articlemed', 400, 300, false ); 
	}


//Add menus
add_theme_support( 'menus' );// Added in 3.0

//Add gallery theme support
add_theme_support( 'html5', array( 'gallery') );

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'doubledown' ),
	) );

// Menu fallback
function fly_default_menu() { ?>
 	<ul class="nav" id="nav">                
 	<li class="current-menu-item"><a href="<?php bloginfo('url'); ?>/wp-admin/nav-menus.php"><span><?php _e('Please Set Up Your Menu', 'dailyfantasy'); ?></span></a></li>
	</ul>

<?php }

// Add Comments HTML5 Support
function fly_comments_setup() {
    add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
add_action( 'after_setup_theme', 'fly_comments_setup' );


// -----------------------Excerpt Length-------------------------

function custom_excerpt_length( $length ) {

$exc=30;

if (get_theme_option ('excerpt-length') != ""):
$exc= get_theme_option ('excerpt-length');
endif;
return $exc;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Show Home Page on Menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

//---------------------Add Scripts----------------------

function flytonic_add_scripts() {
   
wp_enqueue_script('flexslider', get_bloginfo('stylesheet_directory').'/includes/js/jquery.flexslider-min.js', array('jquery'));
wp_enqueue_script('themescripts', get_bloginfo('stylesheet_directory').'/includes/js/theme_scripts.js', array('jquery'));

if ( is_singular('casino') ) {

wp_enqueue_script('carosel', get_bloginfo('stylesheet_directory').'/includes/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'));
wp_enqueue_script('carosel-init', get_bloginfo('stylesheet_directory').'/includes/js/jquerycarousel.js', array('jquery', 'carosel'));
    
}

}
add_action('wp_enqueue_scripts', 'flytonic_add_scripts');


//---------------------Add Stylesheets----------------------

function flytonic_my_stylesheets() {

	// Main Stylsheet
	wp_enqueue_style('flytonic_style', get_stylesheet_uri() );
     wp_enqueue_style('shortcode-css', get_template_directory_uri() . '/includes/css/shortcode.css');
    // Flexslider stylesheet - saved when user saves design options
    wp_enqueue_style('flex_style', get_bloginfo('stylesheet_directory').'/flexslider.css');
	
    // Font awesome
    	wp_enqueue_style('fontawesome_style', get_bloginfo('stylesheet_directory').'/font-awesome.min.css');
	// Custom stylesheet - saved when user saves design options
    	wp_enqueue_style('custom_style', get_bloginfo('stylesheet_directory').'/includes/custom.css');

}
add_action('wp_enqueue_scripts', 'flytonic_my_stylesheets');

// Add Alternative Stylsheets
function flytonic_sb_stylesheetsalt() {
	if (get_theme_option('theme-color') == 'Green') {
	// Green Stylesheet
    	wp_enqueue_style('green_style', get_bloginfo('stylesheet_directory').'/styles/green.css');
	} 
	
	if (get_theme_option('theme-color') == 'Blue') {
    	wp_enqueue_style('green_style', get_bloginfo('stylesheet_directory').'/styles/blue.css');
	} 
	
	if (get_theme_option('theme-color') == 'Orange') {
    	wp_enqueue_style('green_style', get_bloginfo('stylesheet_directory').'/styles/orange.css');
	} 
	
 	
}
add_action('wp_enqueue_scripts', 'flytonic_sb_stylesheetsalt','12');

//---------------------Check Custom.css----------------------

/* Installation Check */
function flytonict_showMessage($message, $errormsg = false)
{
	if ($errormsg) {
		echo '<div id="message" class="error">';
	}
	else {
		echo '<div id="message" class="updated fade">';
	}

	echo "<p><strong>$message</strong></p></div>";
}    

function flytonict_showAdminMessages()
{
    // Shows as an error message. You could add a link to the right page if you wanted.
	if (!file_exists(get_stylesheet_directory() . '/includes/custom.css')) {
		flytonict_showMessage(__('WARNING - A file with the name custom.css must be created and writeable in the includes directory for custom design options to be saved', 'doubledown'), true);
	} elseif (!is_writeable(get_stylesheet_directory() . '/includes/custom.css')) {
		flytonict_showMessage(__('WARNING - The file custom.css in the doubledown /includes directory must be made writeable for custom design options to be saved.','doubledown'), true);
	}   
}

add_action('admin_notices', 'flytonict_showAdminMessages'); 


//---------------------- Pagination ---------------

function kriesi_pagination($pages = '', $range = 4)
{  
     $showitems = ($range)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'> &laquo;</a>";
         if($paged > 1 ) echo "<a class='last' href='".get_pagenum_link($paged - 1)."'>PREVIOUS</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages ) echo "<a class='last' href='".get_pagenum_link($paged + 1)."'>NEXT</a>";  
         //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'></a>";
         echo "</div>\n";
     }
}


//---------------------- Adjust Login Logo and URL ---------------


function ft_login_logo() {
   $logo = get_theme_option('login-logo');


        echo '<style type="text/css">
            body.login div#login h1 a {
                background-image: url('. $logo .');
                padding-bottom: 20px;
                background-size: auto !important;
		width: auto !important;
		
            }
        </style>';

    
}
add_action( 'login_enqueue_scripts', 'ft_login_logo' );



function ft_login_logo_url() {
    $logourl = get_theme_option('login-logourl');
    
    if(!empty($logourl)) { 
        return $logourl;
    } else {
        return get_bloginfo('url');
    }
    
}
add_filter( 'login_headerurl', 'ft_login_logo_url' );

function ft_login_logo_url_title() {
    $logoalt = get_theme_option('login-logoalt');
    
    if(!empty($logoalt)) { 
        return $logoalt;
    } else {
        return get_bloginfo()." Login";
    }
}
add_filter( 'login_headertitle', 'ft_login_logo_url_title' );

//Add category to Pages
add_action('init', 'ftsn_reg_tax');
function ftsn_reg_tax() {
      register_taxonomy_for_object_type('category', 'page');
      add_post_type_support('page', 'category');
}

?>