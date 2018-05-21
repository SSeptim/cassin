<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_load_topsites' );

/* Function that registers our widget. */
function fly_load_topsites() {
	register_widget( 'Top_Site_Widget' );
}

class Top_Site_Widget extends WP_Widget {
	
function __construct() {
		parent::__construct(
			'topsites-widget', // Base ID
			__( 'Top Casinos Widget', 'doubledown' ), // Name
			array( 'description' => __( 'Display top casinos in widget.', 'doubledown' ), ) // Args
		);
	}		
	

public function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$site1=$instance['ts_casinoname1'];
		$site2=$instance['ts_casinoname2'];
		$site3=$instance['ts_casinoname3'];
		$site4=$instance['ts_casinoname4'];
		$site5=$instance['ts_casinoname5'];
		$site6=$instance['ts_casinoname6'];
		$site7=$instance['ts_casinoname7'];
        $site8=$instance['ts_casinoname8'];
		$site9=$instance['ts_casinoname9'];
		$site10=$instance['ts_casinoname10'];
		
		$site11=$instance['ts_casinoname11'];
		$site12=$instance['ts_casinoname12'];
		$site13=$instance['ts_casinoname13'];
		$site14=$instance['ts_casinoname14'];
		$site15=$instance['ts_casinoname15'];
		$site16=$instance['ts_casinoname16'];
		$site17=$instance['ts_casinoname17'];
		$site18=$instance['ts_casinoname18'];
		$site19=$instance['ts_casinoname19'];
		$site20=$instance['ts_casinoname20'];
      
$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10,$site11,$site12,$site13,$site14,$site15,$site16,$site17,$site18,$site19,$site20);	  

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;


		

?>

<div class="ratingwidget">

<?php
$redirectkey=fly_redirect_slug();
global $post;
$opost = $post;
foreach ($sites as $site) :

if ($site !='') {
	
$rateper=get_post_meta($site,"_as_rating",true)*20;

?>     
	<div class="siterow">
              	<div class="logocol">
					<a href="<?php echo get_the_permalink($site); ?>" title="<?php echo get_the_title($site); ?>">      
							<?php echo get_the_post_thumbnail($site,'siteicon', array('class' => 'logo')); ?>
					</a>
				</div>	
              <div class="bonus">
				   <h4><a href="<?php echo get_the_permalink($site); ?>" title="<?php echo get_the_title($site); ?>"><?php echo get_the_title($site); ?></a></h4>
				   <span class="rate"><span class="ratetotal" style="width:<?php echo $rateper; ?>%;"></span></span>
				  <span class="bonusamt"><?php echo get_post_meta($site,"_as_bonustext",true); ?></span>
				   <span><a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/" class="vislink">Visit Now</a> </span>
			  </div>
		
		<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/" class="full"></a>

    </div><!--.siterow--> 	

<?php 
} // End of if exists loop

endforeach;
?>
		 
</div><!--.ratingwidget-->   

	  <?php  
	  
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ts_casinoname1'] = strip_tags( $new_instance['ts_casinoname1'] );
		$instance['ts_casinoname2'] = strip_tags( $new_instance['ts_casinoname2'] );
		$instance['ts_casinoname3'] = strip_tags( $new_instance['ts_casinoname3'] );
		$instance['ts_casinoname4'] = strip_tags( $new_instance['ts_casinoname4'] );
		$instance['ts_casinoname5'] = strip_tags( $new_instance['ts_casinoname5'] );
		$instance['ts_casinoname6'] = strip_tags( $new_instance['ts_casinoname6'] );
		$instance['ts_casinoname7'] = strip_tags( $new_instance['ts_casinoname7'] );
		$instance['ts_casinoname8'] = strip_tags( $new_instance['ts_casinoname8'] );
		$instance['ts_casinoname9'] = strip_tags( $new_instance['ts_casinoname9'] );
		$instance['ts_casinoname10'] = strip_tags( $new_instance['ts_casinoname10'] );
		
		$instance['ts_casinoname11'] = strip_tags( $new_instance['ts_casinoname11'] );
		$instance['ts_casinoname12'] = strip_tags( $new_instance['ts_casinoname12'] );
		$instance['ts_casinoname13'] = strip_tags( $new_instance['ts_casinoname13'] );
		$instance['ts_casinoname14'] = strip_tags( $new_instance['ts_casinoname14'] );
		$instance['ts_casinoname15'] = strip_tags( $new_instance['ts_casinoname15'] );
		$instance['ts_casinoname16'] = strip_tags( $new_instance['ts_casinoname16'] );
		$instance['ts_casinoname17'] = strip_tags( $new_instance['ts_casinoname17'] );
		$instance['ts_casinoname18'] = strip_tags( $new_instance['ts_casinoname18'] );
		$instance['ts_casinoname19'] = strip_tags( $new_instance['ts_casinoname19'] );
		$instance['ts_casinoname20'] = strip_tags( $new_instance['ts_casinoname20'] );
               
		return $instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Top Sites');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'doubledown'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" style="width:100%;" />
</p>

  <?php $casinos = getAllPostsByType('casino'); ?>
<p>
<label for="<?php echo $this->get_field_id('ts_casinoname1'); ?>"><?php _e('Select Casino 1', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname1'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname1'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname2'); ?>"><?php _e('Select Casino 2', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname2'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname2'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('ts_casinoname3'); ?>"><?php _e('Select Casino 3', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname3'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname3'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('ts_casinoname4'); ?>"><?php _e('Select Casino 4', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname4'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname4'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname5'); ?>"><?php _e('Select Casino 5', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname5'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname5'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname6'); ?>"><?php _e('Select Casino 6', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname6'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname6'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname7'); ?>"><?php _e('Select Casino 7', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname7'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname7'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname8'); ?>"><?php _e('Select Casino 8', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname8'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname8'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname9'); ?>"><?php _e('Select Casino 9', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname9'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname9'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname10'); ?>"><?php _e('Select Casino 10', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname10'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname10'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname11'); ?>"><?php _e('Select Casino 11', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname11'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname11'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname12'); ?>"><?php _e('Select Casino 12', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname12'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname12'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname13'); ?>"><?php _e('Select Casino 13', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname13'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname13'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname14'); ?>"><?php _e('Select Casino 14', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname14'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname14'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname15'); ?>"><?php _e('Select Casino 15', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname15'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname15'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname16'); ?>"><?php _e('Select Casino 16', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname16'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname16'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname17'); ?>"><?php _e('Select Casino 17', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname17'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname17'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname18'); ?>"><?php _e('Select Casino 18', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname18'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname18'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname19'); ?>"><?php _e('Select Casino 19', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname19'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname19'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname20'); ?>"><?php _e('Select Casino 20', 'doubledown'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname20'); ?> ">
 <option value=""><?php _e('Select', 'doubledown'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname20'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>



  <?php
    }
 }

?>