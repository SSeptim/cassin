<?php
/*
Template Name: Home Slider Template
*/
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <?php $redirectkey=fly_redirect_slug(); ?>
<!--banner-area-->
<section class="banner-area hometem clearfix">
	<div class="banner">
    	
		 <div class="flexslider">
          <ul class="slides">
		  <?php
		   $args = array('posts_per_page' => 5,'post_type'=>'slider','orderby'=> 'date','order' => 'desc'	); 
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) { setup_postdata( $post );
		?>
		  
            <li>
			<a href="<?php echo get_post_meta($post->ID,"_slider_url",true);?>">
  	    	    <?php echo get_the_post_thumbnail($post->ID,'slideimg');?>
			</a>
              <div class="flex-caption">	
            <h2><?php the_title();?></h2>
            <span class="moreinfoslide"><?php echo get_post_meta($post->ID,"_sub_title",true);?></span>
            <a href="<?php echo get_post_meta($post->ID,"_slider_url",true);?>" class="visbutton"><?php echo get_post_meta($post->ID,"_button_text",true);?></a>
			</div>
    		</li>
		<?php }  ?>
  	    	 
			 
          </ul>
        </div>
		
	</div>	
	
	<?php wp_reset_query(); 
			$fpost1 = get_post_meta($post->ID,"_ddt_featart1",true);
			$fpost2 = get_post_meta($post->ID,"_ddt_featart2",true);
			$fpost3 = get_post_meta($post->ID,"_ddt_featart3",true);
			$fpost4 = get_post_meta($post->ID,"_ddt_featart4",true);
	
	?>
	
    <div class="play-games clearfix">
    	<ul>
		
		<?php if ($fpost1!='') { ?>
        	<li>
            	<h3><?php echo get_the_title($fpost1); ?></h3>
         
				<div class="topimgwrap">
					<a href="<?php echo get_the_permalink($fpost1);?>" title="<?php echo get_the_title($fpost1); ?>"><?php echo get_the_post_thumbnail($fpost1,'articlemed');?></a>
				</div>
                <a href="<?php echo get_the_permalink($fpost1);?>" title="<?php echo get_the_title($fpost1); ?>" class="pbutton"><?php _e('Read More', 'doubledown'); ?></a>
            </li>
		<?php }?>
		
		<?php if ($fpost2!='') { ?>
        	<li>
            	<h3><?php echo get_the_title($fpost2); ?></h3>
         
				<div class="topimgwrap">
					<a href="<?php echo get_the_permalink($fpost2);?>" title="<?php echo get_the_title($fpost2); ?>"><?php echo get_the_post_thumbnail($fpost2,'articlemed');?></a>
				</div>
                <a href="<?php echo get_the_permalink($fpost2);?>" title="<?php echo get_the_title($fpost2); ?>" class="pbutton"><?php _e('Read More', 'doubledown'); ?></a>
            </li>
		<?php }?>
		
		<?php if ($fpost3!='') { ?>
        	<li>
            	<h3><?php echo get_the_title($fpost3); ?></h3>
         
				<div class="topimgwrap">
					 <a href="<?php echo get_the_permalink($fpost3);?>" title="<?php echo get_the_title($fpost3); ?>"><?php echo get_the_post_thumbnail($fpost3,'articlemed');?></a>
				</div>
                <a href="<?php echo get_the_permalink($fpost3);?>" title="<?php echo get_the_title($fpost3); ?>" class="pbutton"><?php _e('Read More', 'doubledown'); ?></a>
            </li>
		<?php }?>
		
		<?php if ($fpost4!='') { ?>
        	<li>
            	<h3><?php echo get_the_title($fpost4); ?></h3>
         
				<div class="topimgwrap">
					 <a href="<?php echo get_the_permalink($fpost4);?>" title="<?php echo get_the_title($fpost4); ?>"><?php echo get_the_post_thumbnail($fpost4,'articlemed');?></a>
				</div>
                <a href="<?php echo get_the_permalink($fpost4);?>" title="<?php echo get_the_title($fpost4); ?>" class="pbutton"><?php _e('Read More', 'doubledown'); ?></a>
            </li>
		<?php }?>

        </ul>
    </div>
	
		<div class="clearboth"></div>
</section><!--banner-area-->

	<?php wp_reset_query(); 
			$bcasino1 = get_post_meta($post->ID,"_ddt_bonuscasino1",true);
			$bcasino2 = get_post_meta($post->ID,"_ddt_bonuscasino2",true);
			$bcasino3 = get_post_meta($post->ID,"_ddt_bonuscasino3",true);
			$bcasino4 = get_post_meta($post->ID,"_ddt_bonuscasino4",true);
			$headline=get_post_meta($post->ID,"_ddt_recent_title",true);

	?>

<!--bonus-area-->
<section class="bonus-area clearfix">
	<div class="wrap">
        <h2><?php if ($headline !='') { echo $headline; } else {  _e('Top Casino Bonuses', 'doubledown');  } ?></h2>
        <p>
            <?php echo get_post_meta($post->ID,"_ddt_casino_subtitle",true);?>
        </p>
        
        <ul>
		<?php if ($bcasino1!='') { ?>
        	<li>
            	<figure>
					 <a href="<?php echo get_the_permalink($bcasino1);?>"  title="<?php echo get_the_title($bcasino1); ?>"><?php echo get_the_post_thumbnail($bcasino1,'casino-logo');?></a>
				</figure>
                <span><a href="<?php echo get_the_permalink($bcasino1);?>"  title="<?php echo get_the_title($bcasino1); ?>"><?php echo get_the_title($bcasino1); ?></a></span>
                <strong><?php echo get_post_meta($bcasino1,"_as_subonus",true);?></strong>
                <small><?php echo get_post_meta($bcasino1,"_as_bonustext",true);?></small>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($bcasino1,"_as_redirectkey",true);?>/" class="visbutton"><?php _e('Visit Now', 'doubledown'); ?></a>
            </li>
		<?php } ?>
		
		<?php if ($bcasino2!='') { ?>
        	<li>
            	<figure>
					 <a href="<?php echo get_the_permalink($bcasino2);?>"  title="<?php echo get_the_title($bcasino2); ?>"><?php echo get_the_post_thumbnail($bcasino2,'casino-logo');?></a>
				</figure>
                <span><a href="<?php echo get_the_permalink($bcasino2);?>"  title="<?php echo get_the_title($bcasino2); ?>"><?php echo get_the_title($bcasino2); ?></a></span>
                <strong><?php echo get_post_meta($bcasino2,"_as_subonus",true);?></strong>
                <small><?php echo get_post_meta($bcasino2,"_as_bonustext",true);?></small>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($bcasino2,"_as_redirectkey",true);?>/" class="visbutton"><?php _e('Visit Now', 'doubledown'); ?></a>
            </li>
		<?php } ?>
		
		<?php if ($bcasino3!='') { ?>
        	<li>
            	<figure>
					 <a href="<?php echo get_the_permalink($bcasino3);?>"  title="<?php echo get_the_title($bcasino3); ?>"><?php echo get_the_post_thumbnail($bcasino3,'casino-logo');?></a>
				</figure>
                <span><a href="<?php echo get_the_permalink($bcasino3);?>"  title="<?php echo get_the_title($bcasino3); ?>"><?php echo get_the_title($bcasino3); ?></a></span>
                <strong><?php echo get_post_meta($bcasino3,"_as_subonus",true);?></strong>
                <small><?php echo get_post_meta($bcasino3,"_as_bonustext",true);?></small>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($bcasino3,"_as_redirectkey",true);?>/" class="visbutton"><?php _e('Visit Now', 'doubledown'); ?></a>
            </li>
		<?php } ?>
		
		<?php if ($bcasino4!='') { ?>
        	<li>
            	<figure>
					 <a href="<?php echo get_the_permalink($bcasino4);?>"  title="<?php echo get_the_title($bcasino4); ?>"><?php echo get_the_post_thumbnail($bcasino4,'casino-logo');?></a>
				</figure>
                <span><a href="<?php echo get_the_permalink($bcasino4);?>"  title="<?php echo get_the_title($bcasino4); ?>"><?php echo get_the_title($bcasino4); ?></a></span>
                <strong><?php echo get_post_meta($bcasino4,"_as_subonus",true);?></strong>
                <small><?php echo get_post_meta($bcasino4,"_as_bonustext",true);?></small>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($bcasino4,"_as_redirectkey",true);?>/" class="visbutton"><?php _e('Visit Now', 'doubledown'); ?></a>
            </li>
		<?php } ?>
  
        </ul>
		
		<div class="clearboth"></div>

    </div>
</section><!--bonus-area-->


	<?php wp_reset_query(); 
			$gm1 = get_post_meta($post->ID,"_ddt_recgm1",true);
			$gm2 = get_post_meta($post->ID,"_ddt_recgm2",true);
			$gm3 = get_post_meta($post->ID,"_ddt_recgm3",true);
			$gm4 = get_post_meta($post->ID,"_ddt_recgm4",true);
			$gm5 = get_post_meta($post->ID,"_ddt_recgm5",true);
			$gm6 = get_post_meta($post->ID,"_ddt_recgm6",true);
			$gmheadline=get_post_meta($post->ID,"_ddt_recgm_title",true);

	?>

<section class="top-game-area">
	<div class="wrap">
    	<div class="top-game">
        	 <h3><?php if ($gmheadline !='') { echo $gmheadline; } else { _e('Recommended Games', 'doubledown'); } ?></h3>
            <a href="<?php echo get_post_meta($post->ID,"_ddt_game_seeall",true);?>" class="btn2">SEE ALL+</a>
            <ul>
				<?php if ($gm1!='') { ?>
            	<li>
                	 <a class="gmblock" href="<?php echo get_the_permalink($gm1);?>"  title="<?php echo get_the_title($gm1); ?>"><?php echo get_the_post_thumbnail($gm1,'casino-logo');?></a>
                    <span class="gmtitle"> <a href="<?php echo get_the_permalink($gm1);?>"  title="<?php echo get_the_title($gm1); ?>"><?php echo get_the_title($gm1); ?></a></span>
                </li>
                <?php } ?>
				
				<?php if ($gm2!='') { ?>
            	<li>
                	 <a class="gmblock" href="<?php echo get_the_permalink($gm2);?>"  title="<?php echo get_the_title($gm2); ?>"><?php echo get_the_post_thumbnail($gm2,'casino-logo');?></a>
                   <span class="gmtitle">  <a href="<?php echo get_the_permalink($gm2);?>"  title="<?php echo get_the_title($gm2); ?>"><?php echo get_the_title($gm2); ?></a></span>
                </li>
                <?php } ?>
				
				<?php if ($gm3!='') { ?>
            	<li>
                	 <a class="gmblock" href="<?php echo get_the_permalink($gm3);?>"  title="<?php echo get_the_title($gm3); ?>"><?php echo get_the_post_thumbnail($gm3,'casino-logo');?></a>
                    <span class="gmtitle"> <a href="<?php echo get_the_permalink($gm3);?>"  title="<?php echo get_the_title($gm3); ?>"><?php echo get_the_title($gm3); ?></a></span>
                </li>
                <?php } ?>
				
				<?php if ($gm4!='') { ?>
            	<li>
                	 <a class="gmblock" href="<?php echo get_the_permalink($gm4);?>"  title="<?php echo get_the_title($gm4); ?>"><?php echo get_the_post_thumbnail($gm4,'casino-logo');?></a>
                     <span class="gmtitle"><a href="<?php echo get_the_permalink($gm4);?>"  title="<?php echo get_the_title($gm4); ?>"><?php echo get_the_title($gm4); ?></a></span>
                </li>
                <?php } ?>
				
				<?php if ($gm5!='') { ?>
            	<li>
                	 <a class="gmblock" href="<?php echo get_the_permalink($gm5);?>"  title="<?php echo get_the_title($gm5); ?>"><?php echo get_the_post_thumbnail($gm5,'casino-logo');?>
					 </a>
					 
                    <span class="gmtitle"><a href="<?php echo get_the_permalink($gm5);?>"  title="<?php echo get_the_title($gm5); ?>"><?php echo get_the_title($gm5); ?></a></span>
                </li>
                <?php } ?>
				
				<?php if ($gm6!='') { ?>
            	<li>
                	 <a class="gmblock" href="<?php echo get_the_permalink($gm6);?>"  title="<?php echo get_the_title($gm6); ?>"><?php echo get_the_post_thumbnail($gm6,'casino-logo');?></a>
                    <span class="gmtitle"> <a href="<?php echo get_the_permalink($gm6);?>"  title="<?php echo get_the_title($gm6); ?>"><?php echo get_the_title($gm6); ?></a></span>
                </li>
                <?php } ?>
			
            </ul>
			
				<div class="clearboth"></div>
        </div>
		
	<?php wp_reset_query(); 
			$cas1 = get_post_meta($post->ID,"_ddt_reccasino1",true);
			$cas2 = get_post_meta($post->ID,"_ddt_reccasino2",true);
			$cas3 = get_post_meta($post->ID,"_ddt_reccasino3",true);
			$cas4 = get_post_meta($post->ID,"_ddt_reccasino4",true);
			$chheadline=get_post_meta($post->ID,"_ddt_reccas_title",true);

	?>
        <div class="casino-list">
        		 <h3><?php if ($chheadline !='') { echo $chheadline; } else {  _e('Recommended Casinos', 'doubledown'); } ?></h3>
			<a href="<?php echo get_post_meta($post->ID,"_ddt_bonus_seeall",true);?>" class="btn2"><?php _e('SEE ALL', 'doubledown'); ?>+</a>
			
		<?php if ($cas1!='') { ?>
        	<div class="casino-list-box clearfix">
            	<div class="casino-list-details clearfix">
						<figure><a href="<?php echo get_the_permalink($cas1);?>"  title="<?php echo get_the_title($cas1); ?>"><?php echo get_the_post_thumbnail($cas1,'casino-icon');?></a></figure>
					<div class="rightcasinolist">
                    <h4><a href="<?php echo get_the_permalink($cas1);?>"  title="<?php echo get_the_title($cas1); ?>"><?php echo get_the_title($cas1); ?></a></h4>
                    <span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($cas1,"_as_rating",true)*20;?>%;"></span></span>
                    <span class="bonusdet"><?php echo get_post_meta($cas1,"_as_bonustext",true);?></span>
					</div>
                </div>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($cas1,"_as_redirectkey",true);?>/" class="play"><?php _e('Play Now', 'doubledown'); ?></a>
            </div>
		<?php } ?>
		
		<?php if ($cas2!='') { ?>
        	<div class="casino-list-box clearfix">
            	<div class="casino-list-details clearfix">
						<figure><a href="<?php echo get_the_permalink($cas2);?>"  title="<?php echo get_the_title($cas2); ?>"><?php echo get_the_post_thumbnail($cas2,'casino-icon');?></a></figure>
					<div class="rightcasinolist">
                    <h4><a href="<?php echo get_the_permalink($cas2);?>"  title="<?php echo get_the_title($cas2); ?>"><?php echo get_the_title($cas2); ?></a></h4>
                    <span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($cas2,"_as_rating",true)*20;?>%;"></span></span>
                    <span class="bonusdet"><?php echo get_post_meta($cas2,"_as_bonustext",true);?></span>
					</div>
                </div>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($cas2,"_as_redirectkey",true);?>/" class="play"><?php _e('Play Now', 'doubledown'); ?></a>
            </div>
		<?php } ?>
		
		<?php if ($cas3!='') { ?>
        	<div class="casino-list-box clearfix">
            	<div class="casino-list-details clearfix">
						<figure><a href="<?php echo get_the_permalink($cas3);?>"  title="<?php echo get_the_title($cas3); ?>"><?php echo get_the_post_thumbnail($cas3,'casino-icon');?></a></figure>
					<div class="rightcasinolist">
                    <h4><a href="<?php echo get_the_permalink($cas1);?>"  title="<?php echo get_the_title($cas3); ?>"><?php echo get_the_title($cas3); ?></a></h4>
                    <span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($cas3,"_as_rating",true)*20;?>%;"></span></span>
                    <span class="bonusdet"><?php echo get_post_meta($cas3,"_as_bonustext",true);?></span>
					</div>
                </div>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($cas3,"_as_redirectkey",true);?>/" class="play"><?php _e('Play Now', 'doubledown'); ?></a>
            </div>
		<?php } ?>
		
		<?php if ($cas4!='') { ?>
        	<div class="casino-list-box clearfix">
            	<div class="casino-list-details clearfix">
						<figure><a href="<?php echo get_the_permalink($cas4);?>"  title="<?php echo get_the_title($cas4); ?>"><?php echo get_the_post_thumbnail($cas4,'casino-icon');?></a></figure>
					<div class="rightcasinolist">
                    <h4><a href="<?php echo get_the_permalink($cas4);?>"  title="<?php echo get_the_title($cas4); ?>"><?php echo get_the_title($cas4); ?></a></h4>
                    <span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($cas4,"_as_rating",true)*20;?>%;"></span></span>
                    <span class="bonusdet"><?php echo get_post_meta($cas4,"_as_bonustext",true);?></span>
					</div>
                </div>
                <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($cas4,"_as_redirectkey",true);?>/" class="play"><?php _e('Play Now', 'doubledown'); ?></a>
            </div>
		<?php } ?>
          
    
        </div>
    </div>
	
	<div class="clearboth"></div>
</section><!--top-game-area-->	
	<?php wp_reset_query(); 
	 if (get_post_meta($post->ID,"_ddt_hpcont_active",true)!='yes') { 
	?>
<section class="homecontent-area">
	<div class="wrap">
		<div class="entry-content">
			<?php the_content();?>
		</div>
	</div>
</section><!--homecontent-area-->	

<?php } ?>
 
<div style="clear:both;"></div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>