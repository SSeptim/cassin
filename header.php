<?php
/**
* Header File for theme
*
* Displays all of the <head> section, header and top navigation areas
*
* @package Sportsbook Theme from Flytonic
*
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if (get_theme_option('branding-favicon') == "") { ?>
	<link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<?php } else { ?>
	<link rel="Shortcut Icon" href="<?php echo get_theme_option('branding-favicon'); ?>" type="image/x-icon" />
	<?php } ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>"> 
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/includes/js/html5.js"></script>
	<![endif]-->

	<?php 

	//Show Theme Options Header Scripts here
	echo trim(stripslashes(get_theme_option('header-script'))); 
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class('custom'); ?>>

<div id="outerwrap" class="outside">

<header id="header" class="main-header">

	<button id="mobile-menu-btn">
	<i>&nbsp;</i>
	<i>&nbsp;</i>
	<i>&nbsp;</i></button>

	<nav id="mobile-menu">  
	
		<div class="logomobile">
	
		<?php if (get_theme_option('header-logo') != ""): ?>
			<img width="200" alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_option('header-logo'); ?>" />
			<?php else: ?>
			<span><?php bloginfo('name'); ?></span>
  		<?php endif;?>
		</div>
		
				<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'mobilenav','menu_id'=> 'mobilenav')); ?>
	</nav><!--End of Mobile Navbar-->

	<div class="wrap">
  		<div class="header-logo">
		<?php if (get_theme_option('header-logo') != ""): ?>
   		<a title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>">
   		<img alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_option('header-logo'); ?>" /></a>
  		<?php else: ?>
  		<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>

  		<?php endif;?>
  	</div><!--.header-logo-->
	<?php if ( is_active_sidebar( 'headertop-widgets' ) ) : ?>
			<div class="headerwidgets">
				<?php dynamic_sidebar('headertop-widgets'); ?>
			</div><!--.Widgets Heading-->
	<?php endif; ?>
				 
	<nav class="navbar"  id="navigation">
	
	<div class="socialmediatop">
		
		<?php if (!get_theme_option('header-search-disable')) { ?>

		<div class="searchgo" id="searchgo">
		<form method="get" class="searchform" action="<?php bloginfo('url'); ?>">
			<input class="searchinput" value="" name="s" type="text" placeholder="<?php _e('Search', 'doubledown'); ?>...">
			<input name="submit" class="searchsubmit" value="<?php _e('Search', 'doubledown'); ?>" type="submit">
		</form>
		</div>

		<?php } ?>
			
		<ul>
			
		<?php if (get_theme_option('header_fb_url')!='') {?>
			<li><a href="<?php echo get_theme_option('header_fb_url'); ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_tw_url')!='') {?>

			<li><a href="<?php echo get_theme_option('header_tw_url'); ?>" title="Twitter"><i class="fa fa-twitter"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_goog_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_goog_url'); ?>" title="Google Plus"><i class="fa fa-google-plus"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_pint_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_pint_url'); ?>" title="Pinterest"><i class="fa fa-pinterest"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_insta_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_insta_url'); ?>" title="Instagram"><i class="fa fa-instagram"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_contact_url')!='') {?>
		
			 <li><a href="mailto:<?php echo get_theme_option('header_contact_url'); ?>" title="Contact"><i class="fa fa-envelope"></i></a></li> 
		<?php } ?>
						 
		<?php if (!get_theme_option('header-search-disable')) { ?>
			<li><a href="#" id="sbutton" title="Search"><i class="fa fa-search"> </i></a></li>
		<?php } ?>
				
		</ul>
		</div>	<!--.topnavigation-->
	
			<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'nav','menu_id'=> 'nav','fallback_cb' => 'fly_default_menu','link_before'  => '<span>',
	'link_after'      => '</span>',) ); ?>
	
		</nav><!--Nav--> 
		
		
		 <div class="clearboth"></div>
		 </div><!--.wrap-->
	</header><!--End of Header-->