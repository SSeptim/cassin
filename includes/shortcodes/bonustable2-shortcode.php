<?php 

// Adds Bonus Table Shortcode
function fly_bonustable2_func($atts) {
	extract(shortcode_atts(array(
		'site1' => '',
		'site2' => '',
		'site3' => '',
		'site4' => '',
		'site5' => '',
		'site6' => '',
		'site7' => '',
		'site8' => '',
		'site9' => '',
		'site10' => '',
		
	), $atts));

$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10);

$redirectkey=fly_redirect_slug();

$x=0;
$ret = '';
global $post;

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

foreach ($sites as $casino) {

if ($casino !='') {

$x=$x+1;
$width=get_post_meta($casino, "_as_rating", true)*20;


$ret .= '
	 <tr>
      <td  class="rankcol"><span class="rank">'.$x.'</span></td>
	  <td  class="logocol"><a href="' . get_permalink($casino) . '">'. get_the_post_thumbnail($casino,'casino-icon',array('class' => 'logo')).'</a></td>
	     <td  class="ratecol">  <span class="rate cenmar2"><span class="ratetotal" style="width:'.$width.'%;"></span></span><a href=" ' . get_permalink($casino) . ' ">'.__('Read Review', 'doubledown').'</a></td>
	  <td class="bonuscol"> '. get_post_meta($casino,"_as_bonustext",true) . '</td>
      <td class="bcodecol">';
	   if (get_post_meta($casino, "_as_bonuscode", true)!='') {
		  $ret .= get_post_meta($casino,"_as_bonuscode",true) ;
	  } else {
	  
	  $ret .= '
	  <a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectkey .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'/" class="">'.__('Use Link', 'doubledown').'</a>';
	  }
	   $ret .= '</td>
      <td class="visitcol">
	  <a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectkey .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'/" class="visbutton size1">'.__('Visit', 'doubledown').'</a>

	 </td>
    </tr>';

} // End of if exists loop

} // End of for loop

 $ret .=' </table> ';
 
 return $ret;
}

add_shortcode('bonustable_fixed', 'fly_bonustable2_func');

?>