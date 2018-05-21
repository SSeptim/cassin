<?php 

add_action('init', 'fly_casino_posts');

function fly_casino_posts() {

// Check it Slug has been set
if (get_theme_option('affiliate-slug')){
	$slug=get_theme_option('affiliate-slug');
   } else { $slug= 'review'; 

}

$args = array(
  'labels' => array(   
         'name' => __( 'Casinos' ),
         'singular_name' => __( 'Casino' ),
        'add_new' => __( 'Add New Casino' ),
	'add_new_item' => __( 'Add New Casino' ),
	'edit' => __( 'Edit Casino' ),
	'edit_item' => __( 'Edit Casino' ),
	'new_item' => __( 'New Casino' ),
	'view' => __( 'View Casino' ),
	'view_item' => __( 'View Casino' ),
	'search_items' => __( 'Search Casinos' ),
	'not_found' => __( 'No Casinos found' ),
	'not_found_in_trash' => __( 'No Casinos found in Trash' ),
	'parent' => __( 'Parent Casino' ),

                ),

  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes','comments','author')
);

register_post_type('casino',$args);

  $labels = array(
    'name' => _x( 'Casino Tags', 'Casino tag' ),
    'singular_name' => _x( 'Casino tag', 'Casino tag' ),
    'search_items' =>  __( 'Search Casino Tags' ),
    'all_items' => __( 'All Casino Tags' ),
    'parent_item' => __( 'Parent Casino Tag' ),
    'parent_item_colon' => __( 'Parent Casino Tag:' ),
    'edit_item' => __( 'Edit Casino Tag' ), 
    'update_item' => __( 'Update Casino Tag' ),
    'add_new_item' => __( 'Add New Casino Tag' ),
    'new_item_name' => __( 'New Casino Tag' ),
    'menu_name' => __( 'Casino Tags' ),
  ); 	

register_taxonomy('casino-tags',array('casino'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'casinotags' ),
  ));

}

add_action('admin_init', 'fly_create_metaboxes');
add_action('save_post','save_blogmetaboxes');
add_action('save_post','save_casinometaboxes');
add_action('save_post','save_subtitle_metaboxes');
 
function fly_create_metaboxes(){  
  add_meta_box("room-meta", __('Casino Properties', 'doubledown'), "fly_casino_metabox", "casino", "normal", "low");
  add_meta_box("blog-meta", __('Blog Page Options', 'doubledown'), "blog_type_metabox", "page", "advanced", "low");
  add_meta_box("subtitle-meta", __('SubTitle Options', 'doubledown'), "subtitle_type_metabox",'post', "advanced", "low");
    add_meta_box("subtitle-meta2", __('SubTitle Options', 'doubledown'), "subtitle_type_metabox",'page', "advanced", "low");
	  add_meta_box("subtitle-meta3", __('SubTitle Options', 'doubledown'), "subtitle_type_metabox",'game', "advanced", "low");
	    add_meta_box("subtitle-meta4", __('SubTitle Options', 'doubledown'), "subtitle_type_metabox",'casino', "advanced", "low");
   }  

function get_distinct_values($key, $excludeArray)
{
	global $wpdb;
	$x = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key='$key'");
	$types = array();
	foreach($x as $y)
	{
		if (!in_array($y, $excludeArray)) {
			$types[] = $y;
		}
	}
	return $types;
}

function fly_casino_metabox($post) {

$custom = get_post_custom($post->ID);  

$roomurl = isset($custom["_as_roomurl"][0]) ? $custom["_as_roomurl"][0] : '';
$redirectkey = isset($custom["_as_redirectkey"][0]) ? $custom["_as_redirectkey"][0] : '';
$bonuscode= isset($custom["_as_bonuscode"][0]) ? $custom["_as_bonuscode"][0] : '';
$rating = isset($custom["_as_rating"][0]) ? $custom["_as_rating"][0] : '';
$bonustext = isset($custom["_as_bonustext"][0]) ? $custom["_as_bonustext"][0] : '';
$subonus = isset($custom["_as_subonus"][0]) ? $custom["_as_subonus"][0] : '';
$bonusper = isset($custom["_as_bonusper"][0]) ? $custom["_as_bonusper"][0] : '';

$mindeposit = isset($custom["_as_mindeposit"][0]) ? $custom["_as_mindeposit"][0] : '';

$thumb1 = isset($custom["_as_thumb1"][0]) ? $custom["_as_thumb1"][0] : '';
$thumb2 = isset($custom["_as_thumb2"][0]) ? $custom["_as_thumb2"][0] : '';
$thumb3 = isset($custom["_as_thumb3"][0]) ? $custom["_as_thumb3"][0] : '';
$thumb4 = isset($custom["_as_thumb4"][0]) ? $custom["_as_thumb4"][0] : '';

$weburl = isset($custom["_as_weburl"][0]) ? $custom["_as_weburl"][0] : '';
$location = isset($custom["_as_location"][0]) ? $custom["_as_location"][0] : '';     
$founded = isset($custom["_as_founded"][0]) ? $custom["_as_founded"][0] : '';      
$support = isset($custom["_as_support"][0]) ? $custom["_as_support"][0] : '';      
$depositopt= isset($custom["_as_support"][0]) ? $custom["_as_depositopt"][0] : '';      
$withopt = isset($custom["_as_withopt"][0]) ? $custom["_as_withopt"][0] : '';      

$customhl1 = isset($custom["_as_customhl1"][0]) ? $custom["_as_customhl1"][0] : '';    
$customhinput1 = isset($custom["_as_customhinput1"][0]) ? $custom["_as_customhinput1"][0] : '';    
$customhl2 = isset($custom["_as_customhl2"][0]) ? $custom["_as_customhl2"][0] : '';    
$customhinput2 = isset($custom["_as_customhinput2"][0]) ? $custom["_as_customhinput2"][0] : '';    
$customhl3 = isset($custom["_as_customhl3"][0]) ? $custom["_as_customhl3"][0] : '';    
$customhinput3 = isset($custom["_as_customhinput3"][0]) ? $custom["_as_customhinput3"][0] : '';    
$customhl4 = isset($custom["_as_customhl4"][0]) ? $custom["_as_customhl4"][0] : '';    
$customhinput4 = isset($custom["_as_customhinput4"][0]) ? $custom["_as_customhinput4"][0] : '';    
$customhl5 = isset($custom["_as_customhl5"][0]) ? $custom["_as_customhl5"][0] : '';    
$customhinput5 = isset($custom["_as_customhinput5"][0]) ? $custom["_as_customhinput5"][0] : '';    

$customrating_name1 = isset($custom["_as_customrating_name1"][0]) ? $custom["_as_customrating_name1"][0] : '';    
$customrating1 = isset($custom["_as_customrating1"][0]) ? $custom["_as_customrating1"][0] : '';    
$customrating_name2 = isset($custom["_as_customrating_name2"][0]) ? $custom["_as_customrating_name2"][0] : '';    
$customrating2 = isset($custom["_as_customrating2"][0]) ? $custom["_as_customrating2"][0] : '';    
$customrating_name3 = isset($custom["_as_customrating_name3"][0]) ? $custom["_as_customrating_name3"][0] : '';    
$customrating3 = isset($custom["_as_customrating3"][0]) ? $custom["_as_customrating3"][0] : '';    
$customrating_name4 = isset($custom["_as_customrating_name4"][0]) ? $custom["_as_customrating_name4"][0] : '';    
$customrating4 = isset($custom["_as_customrating4"][0]) ? $custom["_as_customrating4"][0] : '';    
$customrating_name5 = isset($custom["_as_customrating_name5"][0]) ? $custom["_as_customrating_name5"][0] : '';    
$customrating5 = isset($custom["_as_customrating5"][0]) ? $custom["_as_customrating5"][0] : '';    
$customrating_name6 = isset($custom["_as_customrating_name6"][0]) ? $custom["_as_customrating_name6"][0] : '';    
$customrating6 = isset($custom["_as_customrating6"][0]) ? $custom["_as_customrating6"][0] : '';    

$pros = isset($custom["_as_pros"][0]) ? $custom["_as_pros"][0] : '';    
$cons = isset($custom["_as_cons"][0]) ? $custom["_as_cons"][0] : '';    
	
?>

<style>

.fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>


<input type="hidden" name="fsports_type_noncename" id="fsports_type_noncename" value="<?php echo wp_create_nonce( 'fsports_type'.$post->ID );?>" />

<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Affiliate URL', 'sportsnews'); ?>:</label>
	<?php _e('The referral url from the affiliate program', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_roomurl" value="<?php echo $roomurl; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Redirect Key', 'doubledown'); ?>:</label>
	<?php _e('This is just a word to hide the full affiliate url that you create.  So the new url would be to visit the site would', 'doubledown'); ?>: <?php bloginfo('url'); ?>/visit/yourkey/
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_redirectkey" value="<?php echo $redirectkey; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Screenshot URL (500px x 300px or bigger)', 'doubledown'); ?>:</label>
	<?php _e('The screenshot of the website to be shown on the review page', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" id="upload_image__as_thumb1" name="_as_thumb1" value="<?php echo $thumb1; ?>" />
	<input class="upload_image_button button-primary" id="upload_image_button" type="button" value="<?php _e('Choose Image', 'doubledown'); ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Optional Screenshot 2 URL (500px x 300px or bigger)', 'doubledown'); ?>:</label>
	<?php _e('The screenshot of the website to be shown on the review page', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" id="upload_image__as_thumb2" name="_as_thumb2" value="<?php echo $thumb2; ?>" />
	<input class="upload_image_button button-primary" id="upload_image_button" type="button" value="<?php _e('Choose Image', 'doubledown'); ?>" />
	</div>
</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Optional Screenshot URL 3 (500px x 300px or bigger)', 'doubledown'); ?>:</label>
	<?php _e('The screenshot of the website to be shown on the review page', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" id="upload_image__as_thumb3" name="_as_thumb3" value="<?php echo $thumb3; ?>" />
	<input class="upload_image_button button-primary" id="upload_image_button" type="button" value="<?php _e('Choose Image', 'doubledown'); ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Optional Screenshot 4 URL (500px x 300px or bigger)', 'doubledown'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" id="upload_image__as_thumb4" name="_as_thumb4" value="<?php echo $thumb4; ?>" />
	<input class="upload_image_button button-primary" id="upload_image_button" type="button" value="<?php _e('Choose Image', 'doubledown'); ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Established Date', 'doubledown'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_founded" value="<?php echo $founded; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Website Display URL', 'doubledown'); ?>:</label>
	<?php _e('This is the display URL in the format of www.domain.com', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_weburl" value="<?php echo $weburl; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Location', 'doubledown'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_location" value="<?php echo $location; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Minimum Deposit (with currency)', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_mindeposit" value="<?php echo $mindeposit; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Main Signup Bonus Code', 'doubledown'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_bonuscode" value="<?php echo $bonuscode; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Max Bonus Amount (with currency)', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_subonus" value="<?php echo $subonus; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Support Options', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_support" value="<?php echo $support; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Deposit Options', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_depositopt" value="<?php echo $depositopt; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Withdrawal Options', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_withopt" value="<?php echo $withopt; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Bonus Headline', 'doubledown'); ?>:</label>
	<?php _e('This is the bonus information displayed in the widgets and review.  Include text and numbers..etc', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_bonustext" value="<?php echo $bonustext; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Pros, separate each by |', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_as_pros" value="<?php echo $pros; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Cons, separate each by |', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_as_cons" value="<?php echo $cons; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Editor Rating', 'doubledown'); ?>:</label>
	<?php _e('Select the rating to be show to visitors', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<select name="_as_rating" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($rating == "1") echo 'SELECTED'; ?>>1</option>


<?php $x=0; while ($x<=5){ ?>

<option <?php if ($rating == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<h3><?php _e('Optional Custom Fields to Add to Review Table', 'doubledown'); ?></h3>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 1', 'doubledown'); ?>:</label>
	
	<?php _e('This is a custom field you can add on the review page template 2.  Please enter the value below.', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl1" value="<?php echo $customhl1; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 1', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput1" value="<?php echo $customhinput1; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 2', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl2" value="<?php echo $customhl2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 2', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput2" value="<?php echo $customhinput2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 3', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl3" value="<?php echo $customhl3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 3', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput3" value="<?php echo $customhinput3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 4', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl4" value="<?php echo $customhl4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 4', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput4" value="<?php echo $customhinput4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 5', 'doubledown'); ?>:</label>
	

	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl5" value="<?php echo $customhl5; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 5', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput5" value="<?php echo $customhinput5; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 1', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name1" value="<?php echo $customrating_name1; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 1', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating1" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($customrating1 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating1 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 2', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name2" value="<?php echo $customrating_name2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 2', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating2" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($customrating2 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating2 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 3', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name3" value="<?php echo $customrating_name3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 3', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating3" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($customrating3 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating3 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 4', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name4" value="<?php echo $customrating_name4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 3', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating4" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($customrating4 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating4 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 5', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name5" value="<?php echo $customrating_name5; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 5', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating5" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($customrating5 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating5 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 6', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name6" value="<?php echo $customrating_name6; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 6', 'doubledown'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating6" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($customrating6 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating6 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>


</table>


<script>
var destObj = false;
var oldSendTo;

jQuery(document).ready(function() {

	jQuery('.upload_image_button').click(function() {
	 formfield = jQuery(this).prev().attr('name');
	 destObj = jQuery(this).prev();
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});
	
	oldSendTo = window.send_to_editor;
	window.send_to_editor = function(html) {
		if (destObj != false) {
			 imgurl = jQuery('img',html).attr('src');
			 jQuery(destObj).val(imgurl);
			 jQuery(destObj).parent().find('img').attr('src', imgurl);
			 tb_remove();
			 destObj = false;
		} else {
			oldSendTo(html);
		}
	}
	
	jQuery('.clear_field_button').click( function() {
		jQuery(this).prev().prev().val('');
	});
});
</script>

<?php
      }
	  
	 function subtitle_type_metabox() {
         global $post;  
         $custom = get_post_custom($post->ID); 
	$main_subtitle = isset($custom["_main_subtitle"][0]) ? $custom["_main_subtitle"][0] : '';
   
?>

<style>

.fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>

<input type="hidden" name="subtitle_type_noncename" id="subtitle_type_noncename" value="<?php echo wp_create_nonce('subtitle_type'.$post->ID );?>" />

<div class="fly_box">
	<p class="label">
	<label><?php _e('Top Subtitle ', 'doubledown'); ?>:</label>
	<?php _e('This is the text below the main title in the banner area', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input  type="text" name="_main_subtitle" value="<?php echo $main_subtitle; ?>" />
	</div>

</div>


<?php  } 

function save_subtitle_metaboxes($post_id) {	
	if (isset($_POST['subtitle_type_noncename']) AND !wp_verify_nonce( $_POST['subtitle_type_noncename'], 'subtitle_type'.$post_id )) {
		return $post_id;
	}

$fields = array('_main_subtitle');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}

} 
	 
function blog_type_metabox() {
         global $post;  
         $custom = get_post_custom($post->ID); 
$numblogs = isset($custom["_numblogs"][0]) ? $custom["_numblogs"][0] : '';
 $blogexcerpts = isset($custom["_blogexcerpts"][0]) ? $custom["_blogexcerpts"][0] : '';
$blogcat = isset($custom["_blogcat"][0]) ? $custom["_blogcat"][0] : '';
         

?>


<style>

.fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>

<input type="hidden" name="blog_type_noncename" id="blog_type_noncename" value="<?php echo wp_create_nonce( 'blog_type'.$post->ID );?>" />


<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Excerpts Instead of Full Posts', 'doubledown'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<select name="_blogexcerpts" >
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($blogexcerpts == "Yes") echo 'SELECTED'; ?>><?php _e('Yes', 'doubledown'); ?></option>
        <option <?php if ($blogexcerpts == "No") echo 'SELECTED'; ?>><?php _e('No', 'doubledown'); ?></option>
       </select> 
	</div>

</div>


<?php $terms = get_terms('category');?>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Posts From This Cat Only', 'doubledown'); ?>:</label>
	<?php _e('Choose to only show posts from this category', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<select id="_blogcat" name="_blogcat">
			<option value="">[<?php _e('All', 'doubledown'); ?>]</option>
                            <?php foreach ($terms as $tag) { ?>
                                <option <?php if ($blogcat == $tag->term_id) echo 'SELECTED'; ?> value="<?php echo $tag->term_id;?>"><?php echo $tag->name;?></option>
                            <?php } ?>
	</select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Number of Posts To Show', 'doubledown'); ?>:</label>
	<?php _e('Enter a number here', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input  type="text" name="_numblogs" value="<?php echo $numblogs; ?>" />
	</div>

</div>



<?php  } 

function save_blogmetaboxes($post_id) {	
	if (isset($_POST['blog_type_noncename']) AND !wp_verify_nonce( $_POST['blog_type_noncename'], 'blog_type'.$post_id )) {
		return $post_id;
	}

$fields = array('_numblogs', '_blogexcerpts', '_blogcat');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}

}


function save_casinometaboxes($post_id) {
	global $post;

	if ( isset($_POST['fsports_type_noncename']) AND !wp_verify_nonce( $_POST['fsports_type_noncename'], 'fsports_type'.$post_id )) {
		return $post_id;
	}
	
	//special handling
	

	$fields = array('_as_roomname', '_as_roomurl','_as_redirectkey','_as_usonly' ,'_as_bonusamount','_as_bonuscode','_as_rating','_as_bonustext','_as_mindeposit','_as_subonus','_as_bonusper','_as_thumb1','_as_weburl','_as_payout','_as_founded','_as_customhl1','_as_customhinput1','_as_customhl2','_as_customhinput2','_as_customhl3','_as_customhinput3','_as_customhl4','_as_customhinput4','_as_customhl5','_as_customhinput5','_as_customrating_name1','_as_customrating1','_as_customrating_name2','_as_customrating2','_as_customrating_name3','_as_customrating3','_as_customrating_name4','_as_customrating4','_as_customrating_name5','_as_customrating5','_as_customrating_name6','_as_customrating6','_as_pros','_as_cons','_as_location','_as_withopt','_as_depositopt','_as_support','_as_thumb2','_as_thumb3','_as_thumb4');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}

}	


function modify_post_meta($id, $key, $value)
{
	delete_post_meta($id, $key);
	if ($value != "") {
		add_post_meta($id, $key, $value);
	}

}



?>