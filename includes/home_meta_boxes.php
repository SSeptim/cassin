<?php 
add_action('admin_init', 'ftm_listings_metaboxes');
add_action('save_post','ftm_savehome_meta');

function ftm_listings_metaboxes(){  
add_meta_box("homelist-meta", __('Home Page Template Options', 'doubledown'), "ftm_homepage_addmeta", "page", "normal", "low");

   }
   
function ftm_homepage_addmeta($post) {
$custom = get_post_custom($post->ID);  

$hpposts_active = isset($custom["_ddt_hpposts_active"][0]) ? $custom["_ddt_hpposts_active"][0] : '';
$recent_title = isset($custom["_ddt_recent_title"][0]) ? $custom["_ddt_recent_title"][0] : '';
$casino_subtitle = isset($custom["_ddt_casino_subtitle"][0]) ? $custom["_ddt_casino_subtitle"][0] : '';

$featart1 = isset($custom["_ddt_featart1"][0]) ? $custom["_ddt_featart1"][0] : '';
$featart2 = isset($custom["_ddt_featart2"][0]) ? $custom["_ddt_featart2"][0] : '';
$featart3 = isset($custom["_ddt_featart3"][0]) ? $custom["_ddt_featart3"][0] : '';
$featart4 = isset($custom["_ddt_featart4"][0]) ? $custom["_ddt_featart4"][0] : '';

$bonuscasino1 = isset($custom["_ddt_bonuscasino1"][0]) ? $custom["_ddt_bonuscasino1"][0] : '';
$bonuscasino2 = isset($custom["_ddt_bonuscasino2"][0]) ? $custom["_ddt_bonuscasino2"][0] : '';
$bonuscasino3 = isset($custom["_ddt_bonuscasino3"][0]) ? $custom["_ddt_bonuscasino3"][0] : '';
$bonuscasino4 = isset($custom["_ddt_bonuscasino4"][0]) ? $custom["_ddt_bonuscasino4"][0] : '';

$reccas_title = isset($custom["_ddt_reccas_title"][0]) ? $custom["_ddt_reccas_title"][0] : '';
$reccasino1 = isset($custom["_ddt_reccasino1"][0]) ? $custom["_ddt_reccasino1"][0] : '';
$reccasino2 = isset($custom["_ddt_reccasino2"][0]) ? $custom["_ddt_reccasino2"][0] : '';
$reccasino3 = isset($custom["_ddt_reccasino3"][0]) ? $custom["_ddt_reccasino3"][0] : '';
$reccasino4 = isset($custom["_ddt_reccasino4"][0]) ? $custom["_ddt_reccasino4"][0] : '';
$bonus_seeall = isset($custom["_ddt_bonus_seeall"][0]) ? $custom["_ddt_bonus_seeall"][0] : '';

$recgm_title = isset($custom["_ddt_recgm_title"][0]) ? $custom["_ddt_recgm_title"][0] : '';
$recgm1 = isset($custom["_ddt_recgm1"][0]) ? $custom["_ddt_recgm1"][0] : '';
$recgm2 = isset($custom["_ddt_recgm2"][0]) ? $custom["_ddt_recgm2"][0] : '';
$recgm3 = isset($custom["_ddt_recgm3"][0]) ? $custom["_ddt_recgm3"][0] : '';
$recgm4 = isset($custom["_ddt_recgm4"][0]) ? $custom["_ddt_recgm4"][0] : '';
$recgm5 = isset($custom["_ddt_recgm5"][0]) ? $custom["_ddt_recgm5"][0] : '';
$recgm6 = isset($custom["_ddt_recgm6"][0]) ? $custom["_ddt_recgm6"][0] : '';
$game_seeall = isset($custom["_ddt_game_seeall"][0]) ? $custom["_ddt_game_seeall"][0] : '';

$hpcont_active = isset($custom["_ddt_hpcont_active"][0]) ? $custom["_ddt_hpcont_active"][0] : '';

?>

<style>

h3.flyboxh2 {background:#e5e5e5; padding:10px; color:#222; }

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

<input type="hidden" name="ftm_homepage_noncename" id="ftm_homepage_noncename" value="<?php echo wp_create_nonce( 'ftm_homepage'.$post->ID );?>" />

<h3 class="flyboxh2"><?php _e('Top Featured Articles Section', 'doubledown'); ?></h3>	

<div class="fly_box">
	<p class="label">
	<label><?php _e('First featured article', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_ddt_featart1">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart1) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Second featured article (Optional)', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_ddt_featart2">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart2) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Third featured article (Optional)', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_ddt_featart3">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart3) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Fourth featured article (Optional)', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_ddt_featart4">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart4) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<h3 class="flyboxh2"><?php _e('Top Bonuses Section', 'doubledown'); ?></h3>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Title of This Section', 'doubledown'); ?>:</label>
	<?php _e('Default title is Latest articles', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_ddt_recent_title" value="<?php echo $recent_title; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Subtitle of This Section', 'doubledown'); ?>:</label>
	<?php _e('Enter an optional sentence or subtitle for this area', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_ddt_casino_subtitle" value="<?php echo $casino_subtitle; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Hide Top Bonuses Section', 'doubledown'); ?></label>
	<?php _e('Check to hide this section', 'doubledown'); ?>
	</p>
<input type="hidden" name="_ddt_hpposts_active" value="no" />
	<input value="yes" type="checkbox" id="_fts_hpposts_active"  name= "_ddt_hpposts_active" <?php if ($hpposts_active=='yes') { echo "Checked"; } ?> />

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 1', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_bonuscasino1">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $bonuscasino1) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 2', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_bonuscasino2">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $bonuscasino2) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 3', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_bonuscasino3">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $bonuscasino3) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 4', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_bonuscasino4">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $bonuscasino4) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<h3 class="flyboxh2"><?php _e('Recommended Games Section', 'doubledown'); ?></h3>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Title of This Section', 'doubledown'); ?>:</label>
	<?php _e('Default title is Recommended Games', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_ddt_recgm_title" value="<?php echo $recgm_title; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('See All Games Link', 'doubledown'); ?>:</label>
	<?php _e('Enter url for the See All Games', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_ddt_game_seeall" value="<?php echo $game_seeall; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game 1', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllGamesType(); ?>
	<select name="_ddt_recgm1">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $recgm1) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game 2', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllGamesType(); ?>
	<select name="_ddt_recgm2">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $recgm2) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game 3', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllGamesType(); ?>
	<select name="_ddt_recgm3">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $recgm3) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game 4', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllGamesType(); ?>
	<select name="_ddt_recgm4">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $recgm4) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game 5', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllGamesType(); ?>
	<select name="_ddt_recgm5">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $recgm5) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game 6', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllGamesType(); ?>
	<select name="_ddt_recgm6">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $recgm6) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<h3 class="flyboxh2"><?php _e('Recommended Casino Section', 'doubledown'); ?></h3>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Title of This Section', 'doubledown'); ?>:</label>
	<?php _e('Default title is Recommended Casinos', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_ddt_reccas_title" value="<?php echo $reccas_title; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('See All Casino Link', 'doubledown'); ?>:</label>
	<?php _e('Enter url for the See All Casinos', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_ddt_bonus_seeall" value="<?php echo $bonus_seeall; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 1', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_reccasino1">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $reccasino1) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 2', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_reccasino2">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $reccasino2) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 3', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_reccasino3">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $reccasino3) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Casino 4', 'doubledown'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = getAllPostsByType(); ?>
	<select name="_ddt_reccasino4">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $reccasino4) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<h3 class="flyboxh2"><?php _e('Content Area', 'doubledown'); ?></h3>	

<div class="fly_box">
	<p class="label">
	<label><?php _e('Hide Content Area', 'doubledown'); ?></label>
	<?php _e('Check to hide this section', 'doubledown'); ?>
	</p>
<input type="hidden" name="_ddt_hpcont_active" value="no" />
	<input value="yes" type="checkbox" id="_ddt_hpcont_active"  name= "_ddt_hpcont_active" <?php if ($hpcont_active=='yes') { echo "Checked"; } ?> />

</div>

<?php }  

function ftm_savehome_meta($post_id) {
	global $post;

	if (isset($_POST['ftm_homepage_noncename']) AND !wp_verify_nonce( $_POST['ftm_homepage_noncename'], 'ftm_homepage'.$post_id )) {
		return $post_id;
	}
	
	$fields = array('_ddt_featart1','_ddt_featart2','_ddt_featart3','_ddt_featart4','_ddt_recent_title','_ddt_bonuscasino1','_ddt_bonuscasino2','_ddt_bonuscasino3','_ddt_bonuscasino4','recgm_title','_ddt_reccas_title','_ddt_recgm6','_ddt_recgm5','_ddt_recgm4','_ddt_recgm3','_ddt_recgm2','_ddt_recgm1','_ddt_reccasino4','_ddt_reccasino3','_ddt_reccasino2','_ddt_reccasino1','_ddt_casino_subtitle','_ddt_bonus_seeall','_ddt_game_seeall','_ddt_recgm_title','_ddt_hpcont_active');
	foreach ($fields as $field) {
			if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}
	
}
?>