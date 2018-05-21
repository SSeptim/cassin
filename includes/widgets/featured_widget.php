<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_featuredwidget' );

/* Function that registers our widget. */
function fly_featuredwidget() {
	register_widget( 'Featured_Room_Widget' );
}

class Featured_Room_Widget extends WP_Widget {
	
function __construct() {
		parent::__construct(
			'featuredroom-widget', // Base ID
			__( 'Featured Casino', 'doubledown' ), // Name
			array( 'description' => __( 'Displays a featured casino in widget.', 'doubledown' ), ) // Args
		);
	}	
	

public function widget( $args, $instance ) {
		extract( $args );
		$roomfilter = $instance["roomfilter"];
                $title = apply_filters('widget_title', $instance['title'] );
		/* User-selected settings. */
		if (substr($roomfilter, 0, 2)=="RT") {
			$type = explode("|", $roomfilter);
			$type = $type[1];
			$loop = new WP_Query( array( 'post_type' =>'casino', 'posts_per_page' => -1, 'orderby'=>'title', 'meta_key'=>'_as_roomtype', 'meta_value'=>$type ) ); 
			$posts = $loop->posts;
			shuffle($posts);
		} elseif (substr($roomfilter, 0, 1)=="P") {
			$id = explode("|", $roomfilter);
			$id = $id[1];
			$p = get_post($id);
			$posts = array($p);
		} else {
			$loop = new WP_Query( array( 'post_type' =>'casino', 'posts_per_page' => -1, 'orderby'=>'title') );
			$posts = $loop->posts;
			shuffle($posts); 
		}
		$post = $posts[0];
		setup_postdata($post); 
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
        if ( $title )
			echo $before_title . $title . $after_title;
           $redirectkey=fly_redirect_slug();

		$dcontent = ' 
		
		<div class="bonus-area-right">
            	<div class="bottomarea">
                        <figure><a href=" '.get_permalink($post->ID).' ">'. get_the_post_thumbnail($post->ID,'casino-icon',array('class' => 'logo')).'</a></figure>
                        <h4><a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h4>
                        <strong> '. get_post_meta($post->ID, '_as_subonus', true).' </strong>
                        <small> '. get_post_meta($post->ID, '_as_bonustext', true).' </small>
                        <a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'.$redirectkey.'/'. get_post_meta($post->ID,"_as_redirectkey",true)  .'" class="visbutton lg">Visit Now</a>
                 </div>
		</div>

             ';

		$content = apply_filters('featured-widget', array($post));		

		if (!is_array($content) && $content != "") {
			echo $content;
		} else {
			echo $dcontent;
		}

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
           
		/* Strip tags (if needed) and update the widget settings. */
                $instance['title'] = strip_tags( $new_instance['title'] );
		$instance['roomfilter'] = strip_tags( $new_instance['roomfilter'] );
		
		return $instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Featured Casino');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'doubledown'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" style="width:100%;" />
</p>


<p>
<label for="<?php echo $this->get_field_id('roomfilter'); ?>"><?php _e('Featured Casino', 'doubledown'); ?>:</label><br />
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('roomfilter'); ?>">
	<option style="font-weight:bold" value="random"><?php _e('Random', 'doubledown'); ?></option>
<?php
	$loop = new WP_Query( array( 'post_type' =>'casino', 'posts_per_page' => -1, 'orderby'=>'title') ); 

	foreach ($loop->posts as $p) {
		var_dump($p);
		echo "<option " . ($instance['roomfilter']=="P|".$p->ID?'SELECTED':'') . " style=\"padding-left: 15px\" value=\"P|".$p->ID."\">" . $p->post_title . "</option>";	
	}

?>
</select>
</p>
  <?php
    }
 }

?>