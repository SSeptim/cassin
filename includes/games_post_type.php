<?php 

add_action('init', 'fly_game_ptype');

function fly_game_ptype() {

// Check it Slug has been set
if (get_theme_option('game-slug')){
	$slug=get_theme_option('game-slug');
   } else { $slug= 'game'; 

}

$args = array(
  'labels' => array(   
         'name' => __( 'Games' ),
         'singular_name' => __( 'Games' ),
        'add_new' => __( 'Add New' ),
	'add_new_item' => __( 'Add New Games' ),
	'edit' => __( 'Edit' ),
	'edit_item' => __( 'Edit Games' ),
	'new_item' => __( 'New Games' ),
	'view' => __( 'View Games' ),
	'view_item' => __( 'View Games' ),
	'search_items' => __( 'Search Games' ),
	'not_found' => __( 'No Games found' ),
	'not_found_in_trash' => __( 'No Games found in Trash' ),
	'parent' => __( 'Parent Games' ),

                ),

  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes','comments','author')
);

register_post_type('game',$args);

  $labels = array(
    'name' => _x( 'Games Tags', 'Game tag' ),
    'singular_name' => _x( 'Games Tag', 'Game tag' ),
    'search_items' =>  __( 'Search Games Tags' ),
    'all_items' => __( 'All Games Tags' ),
    'parent_item' => __( 'Parent Games Tag' ),
    'parent_item_colon' => __( 'Parent Games Tag:' ),
    'edit_item' => __( 'Edit Games Tag' ), 
    'update_item' => __( 'Update Games Tag' ),
    'add_new_item' => __( 'Add New Games Tag' ),
    'new_item_name' => __( 'New Games Tag' ),
    'menu_name' => __( 'Games Tags' ),
  ); 	

register_taxonomy('game-tags',array('game'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gametag' ),
  ));
	

register_taxonomy('gametype-tags',array('game'), array(
    'hierarchical' => true,
    'label' => 'Game Type',
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gametype' ),
  ));


}


add_action('admin_init', 'fly_game_meta');

add_action('save_post','save_gamemetaboxes');

function fly_game_meta(){  
  add_meta_box("games-meta", __('Game Properties', 'doubledown'), "games_type_metabox", "game", "normal", "low");


   }  

function games_type_metabox($post) {
         $custom = get_post_custom($post->ID);  

$rating = isset($custom["_gm_rating"][0]) ? $custom["_gm_rating"][0] : '';
$wtp1 = isset($custom["_gm_wtp1"][0]) ? $custom["_gm_wtp1"][0] : '';
   
$demogame = isset($custom["_gm_demogame"][0]) ? $custom["_gm_demogame"][0] : '';
$gameratetext = isset($custom["_gm_gameratetext"][0]) ? $custom["_gm_gameratetext"][0] : '';


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

<input type="hidden" name="game_type_noncename" id="game_type_noncename" value="<?php echo wp_create_nonce( 'game_type'.$post->ID );?>" />


<?php $casinos = getAllPostsByType('casino'); ?>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Default Casino to Link To', 'doubledown'); ?></label>
	<?php _e('Select the casino to link this game to by default', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<select name="_gm_wtp1">
    		<option value=""><?php _e('Select...', 'doubledown'); ?></option>
  		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($h->ID == $wtp1) echo 'SELECTED'?>><?php echo $h->post_title?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game Editor Rating', 'doubledown'); ?>:</label>
	<?php _e('Select the rating to be show to visitors or in Google Markup', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<select name="_gm_rating" class="smallmetatwo">
        <option value=""><?php _e('Select', 'doubledown'); ?></option>
    	<option <?php if ($rating == "1") echo 'SELECTED'; ?>>1</option>


<?php $x=0; while ($x<=5){ ?>

<option <?php if ($rating == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Game Text Rating', 'doubledown'); ?>:</label>
	<?php _e('1 or 2 words to summarize or rate game, example:excellent', 'doubledown'); ?>
	</p>

<div class="inputwrap">
	<input type="text" name="_gm_gameratetext" value="<?php echo $gameratetext; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Embedded Game or Free Game Demo', 'doubledown'); ?></label>
	<?php _e('You can insert you embed code or iframe code here for a game demo', 'doubledown'); ?>
	</p>

	<div class="inputwrap">
	<textarea name="_gm_demogame" cols="10" rows="10"><?php echo $demogame; ?></textarea>
	</div>

</div>

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


function save_gamemetaboxes($post_id) {
	global $post;

	if ( !wp_verify_nonce( $_POST['game_type_noncename'], 'game_type'.$post_id )) {
		return $post_id;
	}
	

	$fields = array('_gm_rating','_gm_wtp1','_gm_demogame','_gm_gameratetext');
	foreach ($fields as $field) {
		modify_post_meta($post_id, $field, $_POST[$field]);
	}

}

//Add Second Editor Area

add_action( 'edit_form_advanced', 'gm_gameinfo_editor' );
add_action( 'save_post', 'ft_save_wpeditgm', 10, 2 );
function gm_gameinfo_editor() {
	// get and set $content somehow...

global $post;

if( 'game' != $post->post_type )
        return;

	$editor1 = get_post_meta( $post->ID, '_ft_gm_editor1', true);
	wp_nonce_field('hotel'.$post->ID,'gamedem_ed' );
	 echo '<h3>' . __('Optional Content Area Below Game Demo', 'doubledown') . '</h3>';
    echo wp_editor( $editor1, 'ft_gm_editor1', array( 'textarea_name' => 'ft_gm_editor1' ) );
}


function ft_save_wpeditgm( $post_id, $post_object )
{
    if( !isset( $post_object->post_type ) || 'game' != $post_object->post_type )
        return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;


  if (isset($_POST['gamedem_ed']) AND !wp_verify_nonce( $_POST['gamedem_ed'], 'hotel'.$post_id )) {
		return;
	}

    if ( isset( $_POST['gamedem_ed'] )  )
        update_post_meta( $post_id, '_ft_gm_editor1', $_POST['ft_gm_editor1'] );
   
}



?>