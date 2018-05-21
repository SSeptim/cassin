<?php

/*
	Run the bonuscode_button function when WP initialization
*/

/*
	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here
*/
add_action('in_admin_footer', 'bcb_add_editor');
function bcb_add_editor()
{
		
		$tags = get_terms('casino-tags');
		
?>
<style>
  .flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:3px !important; margin:0 0 10px 0; height:27px;  }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	
</style>
	<div id="bcb_editor" class="flytonic_sc_editor" title="<?php _e('Casino Listings Shortcode', 'doubledown'); ?>"  style="display:none">
        	
	<div>
    	<label><?php _e('Number of sites', 'doubledown'); ?></label>
    	<input class="fly_textinput" type="text" name="bcb_num" id="bcb_num" size="10">
    	<p><?php _e('Enter number of sites to display', 'doubledown'); ?></p>
   	</div>	 


	<div>
    	<label><?php _e('Order By', 'doubledown'); ?></label>
    	<select class="fly_textinput" name="bcb_orderby" id="bcb_orderby">
    	     	<option value="">[<?php _e('Default', 'doubledown'); ?>]</option>
                 <option value="title"><?php _e('Title', 'doubledown'); ?></option>
                 <option value="order"><?php _e('Menu Order', 'doubledown'); ?></option>
                 <option value="date"><?php _e('Date', 'doubledown'); ?></option>
                 <option value="_as_rating"><?php _e('Rating', 'doubledown'); ?></option>
		<option value="random"><?php _e('Random', 'doubledown'); ?></option>
    	</select>
	</div>

	<div>
    	<label><?php _e('Sort Order', 'doubledown'); ?></label>
    	<select class="fly_textinput" name="bcb_sort" id="bcb_sort">
    	     	<option value="">[<?php _e('Default', 'doubledown'); ?>]</option>
		<option value="asc"><?php _e('Ascending', 'doubledown'); ?></option>
		<option value="desc"><?php _e('Descending', 'doubledown'); ?></option>
    	</select>
	</div>

	<div>
    	<label><?php _e('Filter by Tag', 'doubledown'); ?></label>
    	<select class="fly_textinput" name="bcb_tag" id="bcb_tag">
    	     	<option value="">[<?php _e('None', 'doubledown'); ?>]</option>
		   <?php foreach ($tags as $tag) { ?>
                       <option><?php echo $tag->name;?></option>
                  <?php } ?>
    	</select>
	</div>

     
    </div>

    <script>
	jQuery(document).ready( function() {
		jQuery('#bcb_editor').dialog({
			buttons: {
				Ok: function() {
					var str = '[bonustable ';
					
					
					if (jQuery('#bcb_num').val()!='') str += 'num=' + jQuery('#bcb_num').val() + ' '; //a normal input
					
					if (jQuery('#bcb_orderby :selected').val()!='') str += 'orderby=\'' + jQuery('#bcb_orderby :selected').val() + '\' '; //a select box
					if (jQuery('#bcb_sort :selected').val()!='') str += 'sort=\'' + jQuery('#bcb_sort :selected').val() + '\' '; //a select box
					if (jQuery('#bcb_tag :selected').val()!='') str += 'tag=\'' + jQuery('#bcb_tag :selected').val() + '\' '; //a select box
					
	
					str += ']';
					
					tinyMCE.activeEditor.selection.getContent();

					tinyMCE.activeEditor.selection.setContent(str);
					
					jQuery( this ).dialog( "close" );
				},
				Cancel: function() {
					jQuery( this ).dialog( "close" );
				}
			},
			autoOpen:false,
			draggable: false,
			modal: true,
			resizable: false
		});
	});
	</script>
<?php
}

?>