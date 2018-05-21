<?php 

// Adds Bonus Table Shortcode
function fly_bonustable_func($atts) {
	extract(shortcode_atts(array(
		'num' => 10,
		'orderby' => 'date',
		'sort' => 'DESC',
		'tag'=>'',
		
	), $atts));


if ($orderby == 'date'){
	
$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'orderby'=>'date','order' => 'DESC'  )); 

} elseif ($orderby=='random'){	
	
$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'orderby'=>'rand', 'order' => 'ASC' ) );   

} elseif ($orderby=='title'){	
	
$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'orderby'=>'title', 'order' => 'ASC' ) );   

} else if ($orderby == 'order') {

$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'menu_order' )); 

} else {

$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'meta_value_num', 'meta_key'=>$orderby ) );

}

	$i=0;
	$posts = array();
	foreach ($loop->posts as $p) {
		if ($i>=$num) continue;
		
		if ($tag!='' && !has_term($tag, 'casino-tags', $p)) continue;
		$custom = get_post_custom($p->ID);	
		
		$posts[] = $p;
		$i++;
	}

$redirectkey=fly_redirect_slug();

$ret='
<table  class="midsites">
    <tr>
	  <th class="rankcol ">#</th>
      <th class="logocol">'.__('Casino', 'doubledown').'</th>
	   <th  class="ratecol">'.__('Rating', 'doubledown').'</th>
      <th  class="bonuscol">'.__('Bonus', 'doubledown').'</th>
      <th  class="bcodecol">'.__('Bonus Code', 'doubledown').'</th>
      <th   class="visitcol"></th>
    </tr>
';

$x=0;
global $post;
$opost = $post;
foreach ($posts as $post) :
	setup_postdata($post); 
$x=$x+1;
$width=get_post_meta($post->ID, "_as_rating", true)*20;

$ret .= '
	 <tr>
      <td  class="rankcol"><span class="rank">'.$x.'</span></td>
	  <td  class="logocol"><a href="' . get_permalink() . '">'. get_the_post_thumbnail($post->ID,'casino-icon',array('class' => 'logo')).'</a></td>
	     <td  class="ratecol">  <span class="rate cenmar2"><span class="ratetotal" style="width:'.$width.'%;"></span></span><a href=" ' . get_permalink() . ' ">'.__('Read Review', 'doubledown').'</a></td>
	  <td class="bonuscol"> '. get_post_meta($post->ID,"_as_bonustext",true) . '</td>
      <td class="bcodecol">';
	   if (get_post_meta($post->ID, "_as_bonuscode", true)!='') {
		  $ret .= get_post_meta($post->ID,"_as_bonuscode",true) ;
	  } else {
	  
	  $ret .= '
	  <a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectkey .'/'. get_post_meta($post->ID,"_as_redirectkey",true)  .'/" class="">'.__('Use Link', 'doubledown').'</a>';
	  }
	   $ret .= '</td>
      <td class="visitcol">
	  <a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectkey .'/'. get_post_meta($post->ID,"_as_redirectkey",true)  .'/" class="visbutton size1">'.__('Visit', 'doubledown').'</a>

	 </td>
    </tr>';

endforeach;
$post = $opost;

 $ret .='  </table> ';
 
 return $ret;
}

add_shortcode('bonustable', 'fly_bonustable_func');

?>