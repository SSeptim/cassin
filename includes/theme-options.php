<?php
// SETTINGS CONFIGURATION
$theme_options = array();


$theme_options[] = make_advanced_group("Branding Preferences", array(
	make_setting(__('Logo', 'doubledown'), "header-logo", "image", __('The logo for your site.  Recommended size is less than 300px wide and 100px in height.', 'doubledown')),
	make_setting(__('Favicon URL', 'doubledown'), "branding-favicon", "text", __('Enter the full url for your custom favicon.', 'doubledown')),
	make_setting(__('Login Logo', 'doubledown'), "login-logo", "image", __('The logo that is shown on the login page.  Recommended size less than')." 200px x 60px"),
	make_setting(__('Login Logo URL', 'doubledown'), "login-logourl", "text", __('The link url for the logo image.  Where the user goes when they click on the login logo.', 'doubledown')),
	make_setting(__('Login Logo Title', 'doubledown'), "login-logoalt", "text", __('The alternative text for the logo on login page.')),
	
	make_setting(__('Top Heading Background Image', 'doubledown'), "topheading-img", "image", __('Change the background image for the top title area for the theme.Recommended size is near 1400px x 200px', 'doubledown')),
	
));

$theme_options[] = make_advanced_group("Header Preferences", array(
	make_setting(__('Header script', 'doubledown'), "header-script", "textarea", __('Additional information to insert in the page header file like Google Analytics code', 'doubledown')),
   make_setting(__('Disable search', 'doubledown'), "header-search-disable", "checkbox", __('Check to disable searchbox in navigation bar', 'doubledown')),
   
   	make_setting(__('Facebook URL', 'doubledown'), "header_fb_url", "text", __('Enter url to link Facebook icon to. Leaving this blank will hide the icon', 'doubledown')),
	make_setting(__('Twitter URL', 'doubledown'), "header_tw_url", "text", __('Enter url to link Twitter icon to. Leaving this blank will hide the icon', 'doubledown')),
	make_setting(__('Google Plus URL', 'doubledown'), "header_goog_url", "text", __('Enter url to link Google plus icon to. Leaving this blank will hide the icon.', 'doubledown')),
	make_setting(__('Pinterest URL', 'doubledown'), "header_pint_url", "text", __('Enter url to link Pinterest icon to. Leaving this blank will hide the icon.', 'doubledown')),
	make_setting(__('Instagram URL', 'doubledown'), "header_insta_url", "text", __('Enter url to link Instagram icon to. Leaving this blank will hide the icon.', 'doubledown')),
	make_setting(__('Contact URL', 'doubledown'), "header_contact_url", "text", __('Enter url to link contact envelope icon to. Leaving this blank will hide the icon.', 'doubledown')),
   
));

$themecolors=array("Green"=>"Green", "Blue"=>"Blue", "Orange"=>"Orange");

$theme_options[] = make_advanced_group("General Options", array(
	
		make_setting(__('Theme Color', 'doubledown'), "theme-color", $themecolors, __('Choose a preset theme design style other than default.', 'doubledown')),
       make_setting(__('Casino Review Page Slug', 'doubledown'), "affiliate-slug","text", __('The casino review site slug, default is review.  Example - http://www.yoursite.com/slug/casinoname/.  You will need to reset your permalinks by resaving them if you change this, otherwise you will see a 404 page.', 'doubledown')),
	    make_setting(__('Game Page Slug', 'doubledown'), "game-slug","text", __('The game review site slug, default is review.  Example - http://www.yoursite.com/slug/gamename/.  You will need to reset your permalinks by resaving them if you change this, otherwise you will see a 404 page.', 'doubledown')),
		
		 make_setting(__('Disable Social Icons', 'doubledown'), "social-disable", "checkbox", __('Check to disable the share icons under titles', 'doubledown')),

));

$theme_options[] = make_advanced_group("Bylines", array(
	make_setting(__('Hide Entire Bylines', 'doubledown'), "bylines-hide-all", "checkbox",__('Check to hide all bylines including post date, category, author and comments from all areas.', 'doubledown')),
	make_setting(__('Hide Date', 'doubledown'), "bylines-hide-date", "checkbox"),
	make_setting(__('Hide Category', 'doubledown'), "bylines-hide-category", "checkbox"),
	make_setting(__('Hide Comments Link', 'doubledown'), "bylines-hide-comment", "checkbox", __('Check to hide comments link and comments number in bylines.'))
));


$theme_options[] = make_advanced_group("Footer Options", array(
	make_setting(__('Footer script', 'doubledown'), "footer-script", "textarea"),
	make_setting(__('Hide Top Footer Widget Area', 'doubledown'), "footer-toparea", "checkbox"),
	make_setting(__('Hide Bottom Footer Area', 'doubledown'), "footer-bottomhide", "checkbox"),
	make_setting(__('Hide theme credit', 'doubledown'), "footer-credit", "checkbox"),
	make_setting(__('Copyright Text', 'doubledown'), "copyright-text", "textarea", __('Enter copyright, theme credit, and site link in the footer.', 'sportnews')),	
		
));

$theme_options[] = make_advanced_group("Redirect Options", array(
	make_setting(__('Link Redirect Options', 'doubledown'), "redirect-new-window", "checkbox", __('Check to have affiliate redirect links open in new windows when clicked', 'doubledown')),
	make_setting(__('Banner Redirect Options', 'doubledown'), "redirect-banner-window", "checkbox", __('Check to have banners open in new windows when clicked', 'doubledown')),
	make_setting(__('Outbound Redirect Slug','doubledown'), "redirect-slug","text", __('Enter the outbound affiliate slug to replace "visit".  Use one word', 'doubledown'))

));

$theme_options[] = make_advanced_group("Excerpts", array(
	make_setting(__('Excerpt length', 'doubledown'), "excerpt-length", "text")
));


// END SETTINGS CONFIGURATION

//ADMINISTRATION SCREEN
add_action('admin_menu', 'theme_options_add_menu', 100);
function theme_options_add_menu()
{
	add_submenu_page('design-options', __('Theme Options', 'doubledown'), __('Theme Options', 'doubledown'), 'update_themes', 'theme-options', 'theme_options_show_ui');
}

function get_theme_options()
{
	$opc = get_option('theme-options-settings');
	if ($opc != "") return unserialize($opc);
	
	return array();
}

function get_theme_option($key)
{
	$options = get_theme_options();
	if (array_key_exists($key, $options)) {
		return $options[$key];
	}
	
	return false;
}

function theme_options_show_ui()
{
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "Reset to Default") {
		//delete the option
		delete_option('theme-options-settings');
	}
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "save-settings") {
		$tos = $_REQUEST["theme_options"];
		delete_option('theme-options-settings');
		add_option('theme-options-settings', serialize($tos));
	}	
	
	$existing_values = @unserialize(get_option('theme-options-settings'));	
	
	if (!is_array($existing_values)) $existing_values = array();
	
	global $theme_options;
	$theme_options = apply_filters('theme_options', $theme_options);

?>
<style>
	.inside-left, .inside-right {
		width: 48%; float: left;
		margin: 0 5px 0 5px; }
	
	.halfpostbox { margin: 5px 0 5px 0; }
	
	.upload_image_button, .clear_field_button {
		width: auto !important; }
		
	input.farbtastic_color { width: 200px !important; }
	.farbtastic_container { display: none; }
	
	.postbox .inside { display: none; }
</style>
<script>
jQuery(document).ready( function() {
	jQuery('.handlediv').toggle( 
		function() {
			jQuery(this).siblings('.inside').slideDown();
		},
		function() {
			jQuery(this).siblings('.inside').slideUp();
		}
	);
});
</script>
	<div class="wrap meta-box-sortables">
    	<div class="icon32" id="icon-themes"><br></div>
        <h2><?php _e('Theme Options', 'doubledown'); ?></h2>
        
        <div id="poststuff">
        
<p><?php _e('update the different options of the themes here', 'doubledown'); ?>.</p>
<form class="form-wrap" method="post" action="?page=theme-options">  
<input type="hidden" name="action" value="save-settings" />    

<div class="inside-left">
<?php 
$toS = ceil(count($theme_options)/2);
if ($toS<1)$toS=1;

for($j=0;$j<$toS;$j++) : 
	$s = $theme_options[$j];
	$fields = $s["fields"]; ?>

         <div class="postbox halfpostbox" id="">
               <button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: <?php echo $s["title"];?></span><span class="toggle-indicator" aria-hidden="true"></span></button>
<h2 class="hndle ui-sortable-handle"><span><?php echo $s["title"];?></span></h2>
            <div class="inside">
                    <?php
                        for ($i=0;$i<count($fields);$i++) {
                            $f = $fields[$i];
                        ?>
                            <div class="form-field form-required">

<?php if (isset($existing_values[$f["slug"]]))  { $myslug = $existing_values[$f["slug"]]; } else { $myslug = '';}  ?>
           
                                <?php design_do_field($f, $myslug, "theme_options"); ?>


                            </div>
                        <?php
                        }
                    ?>
            </div>                
        </div>
<?php endfor; ?>
</div>
<div class="inside-right">
<?php
for($j=$toS;$j<count($theme_options);$j++) : 
	$s = $theme_options[$j];
	$fields = $s["fields"]; ?>

         <div class="postbox halfpostbox" id="quick-settings">
               <button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: <?php echo $s["title"];?></span><span class="toggle-indicator" aria-hidden="true"></span></button>
<h2 class="hndle ui-sortable-handle"><span><?php echo $s["title"];?></span></h2>
            <div class="inside">
                    <?php
                        for ($i=0;$i<count($fields);$i++) {
                            $f = $fields[$i];
                        ?>
                            <div class="form-field form-required">
                                
<?php if (isset($existing_values[$f["slug"]]))  { $myslug = $existing_values[$f["slug"]]; } else { $myslug = '';}  ?>
           
                                <?php design_do_field($f, $myslug, "theme_options"); ?>
                            </div>
                        <?php
                        }
                    ?>
            </div>                
        </div>
<?php endfor; ?>
</div>
<div class="clear"></div>
<input type="submit" value="<?php _e('Save Changes', 'doubledown'); ?>" accesskey="p" tabindex="5" id="publish" class="button-primary" name="publish">
<input type="submit" name="action" value="<?php _e('Reset to Default', 'doubledown'); ?>" class="button-secondary">
</form>
		</div><!--poststuff-->
        
    </div><!--wrap-->

<?php
}





function theme_options_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('design-upload', get_bloginfo('template_url').'/includes/design-options.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('design-upload');
	

}

function theme_options_admin_styles() {
	wp_enqueue_style('thickbox');
	
}

if (isset($_GET['page']) && $_GET['page'] == 'theme-options') {
	add_action('admin_print_scripts', 'theme_options_admin_scripts');
	add_action('admin_print_styles', 'theme_options_admin_styles');
}



//END ADMINISTRATION SCREEN


function theme_options_show_breadcrumbs()
{
	if (!function_exists('show_breadcrumbs')) return;
	if (get_theme_option('breadcrumbs-enable')=="") return;
	
	if ((is_page() || get_post_type() == 'casino') && get_theme_option("bread-crumbs-hide-pages")!="") return;
	if (is_single() && get_post_type() != 'casino'  && get_theme_option("bread-crumbs-hide-posts")!="") return;
	if (is_front_page() && get_theme_option("bread-crumbs-hide-home")!="") return;
	if (is_404() && get_theme_option("bread-crumbs-hide-404")!="") return;
	if (is_archive() && get_theme_option("bread-crumbs-hide-archive")!="") return;
	
	show_breadcrumbs();
}

?>