<?php
/**
 * The template for displaying all single casino reviews
 *
 * 
 */

get_header(); ?>

<?php get_template_part( 'content', 'toppage' ); ?>

	<div id="main" class="contentarea" itemscope itemtype="http://schema.org/Review">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<span itemprop="author" itemscope itemtype="http://schema.org/Person">
  		<meta itemprop="name" content="<?php echo get_the_author(); ?>" />
 </span>

<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
<meta itemprop="ratingValue" content="<?php echo get_post_meta($post->ID,"_as_rating",true);?>" />
<meta itemprop="bestRating" content="5" />
<meta itemprop="worstRating" content="1" />
</span>

<meta itemprop="datePublished" content = "<?php the_time('c'); ?>">

 <?php $redirectkey=fly_redirect_slug(); ?>
	
	<section id="content" class="main-content">
              <section class="topreview">
            	<div class="review-header">
            		<h2><span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
<span itemprop="name"><?php the_title(); ?></span></span></h2>
                    	<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/">
						<?php the_post_thumbnail('casino-logo',array('class' => 'logo')); ?>
					</a>
                </div>
   
                <div class="topreview-content">
                	                    
                    <div class="topreview-content-right">
                        <div class="slider2">
                        	<div id="foo">
							
							<?php if (get_post_meta($post->ID,"_as_thumb1",true)!='') { ?>
                                <div class="slider2-cont">
									<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><img src="<?php echo get_post_meta($post->ID,"_as_thumb1",true);?>" alt="Screenshot" height="300" width="500"></a>
                                </div>
							<?php } ?>
							
							<?php if (get_post_meta($post->ID,"_as_thumb2",true)!='') { ?>
                                <div class="slider2-cont">
									<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><img src="<?php echo get_post_meta($post->ID,"_as_thumb2",true);?>" alt="Screenshot" height="300" width="500"></a>
                                </div>
							<?php } ?>
								
							<?php if (get_post_meta($post->ID,"_as_thumb3",true)!='') { ?>
                                <div class="slider2-cont">
									<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><img src="<?php echo get_post_meta($post->ID,"_as_thumb3",true);?>" alt="Screenshot" height="300" width="500"></a>
                                </div>
							<?php } ?>
								
							<?php if (get_post_meta($post->ID,"_as_thumb4",true)!='') { ?>
                                <div class="slider2-cont">
									<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><img src="<?php echo get_post_meta($post->ID,"_as_thumb4",true);?>" alt="Screenshot" height="300" width="500"></a>
                                </div>
							<?php } ?>
                                
                            </div>
							<?php if (get_post_meta($post->ID,"_as_thumb2",true)!='') { ?>
                            <div class="slider2-controller ">
                            	<div class="pager2">
                                	<a href="#"></a>
                                </div>
                                
                                <div class="slide2-arrow">
                                	<a href="#" class="prev"></a>
                                    <a href="#" class="next"></a>
                                </div>
                            </div>
							<?php } ?>
                        </div> <!--/.slider2-->

                    </div>
                    
                    <div class="topreview-content-left">
                    	<h3><?php echo get_post_meta($post->ID,"_as_rating",true);?></h3>
                      <span class="rate cenmar"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_rating",true)*20;?>%;"></span></span>
                        <h4><?php _e('Our rating', 'doubledown'); ?></h4>
                       <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" class="visbutton">Play Now</a>
                    </div>
                </div>
                <!--cont2-box-->
            </section>
            <!--cont2-->
			

 <div class="proconsarea">
 
 	<?php if (get_post_meta($post->ID, '_as_pros', true) !='') {?>
	<div class="procol">
	<img src="<?php bloginfo('template_directory'); ?>/images/thumb_up.png" alt="Pros" class="proimage" width="67" height="87" />
	<ul>
			 	 <?php $features=get_post_meta($post->ID, '_as_pros', true); 
            		 $feat = explode("|", $features);
             			for($i = 0; $i < count($feat); $i++){ ?>
             			<li><?php echo $feat[$i]; ?></li>
           	<?php } ?>
		</ul>
	</div>
	<?php } ?>
	
	<?php if (get_post_meta($post->ID, '_as_cons', true) !='') {?>
	<div class="concol">
	<img src="<?php bloginfo('template_directory'); ?>/images/thumb_down.png" alt="Cons" class="conimage" width="67" height="87" />
	<ul>
			 	 <?php $features=get_post_meta($post->ID, '_as_cons', true); 
            		 $feat = explode("|", $features);
             			for($i = 0; $i < count($feat); $i++){ ?>
             			<li><?php echo $feat[$i]; ?></li>
           	<?php } ?>
		</ul>
	</div>
	<?php } ?>
 
 </div>
 
 <div class="inforeview">
 
	<div class="innerleft">
		<div class="bonusleft">
		
			<div class="bonusleft1">
			<?php echo get_post_meta($post->ID,"_as_subonus",true);?>
			</div>
			<div class="bonusleft2">
			<?php echo get_post_meta($post->ID,"_as_bonustext",true);?>
			</div>
			<div class="bonusleft3">
			<?php _e('Use code', 'doubledown'); ?>: <?php echo get_post_meta($post->ID,"_as_bonuscode",true);?>
			</div>
			<div class="claim">
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><?php _e('Claim Bonus Now', 'doubledown'); ?></a>
			</div>
		
		</div>
		
			<div class="moreinfotable">
			<h3><?php _e('More Information', 'doubledown'); ?></h3>
			<table class="summary">
				<tr>
					<th><?php _e('Name', 'doubledown'); ?></th>
					<td><?php the_title(); ?></td>
				</tr>
				
				<?php if (get_post_meta($post->ID,"_as_weburl",true) !='') { ?>
				<tr>
					<th><?php _e('Website URL', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_weburl",true); ?></td>
				</tr>
				<?php } ?>
				<?php if (get_post_meta($post->ID,"_as_founded",true) !='') { ?>
				<tr>
					<th><?php _e('Established', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_founded",true); ?></td>
				</tr>
				<?php } ?>
				<?php if (get_post_meta($post->ID,"_as_location",true) !='') { ?>
					<tr>
					<th><?php _e('Location', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_location",true); ?></td>
				</tr>
				
					<?php } ?>
					<?php if (get_post_meta($post->ID,"_as_mindeposit",true) !='') { ?>
					<tr>
					<th><?php _e('Minimum Deposit', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_mindeposit",true); ?></td>
				</tr>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID,"_as_support",true) !='') { ?>
					<tr>
					<th><?php _e('Support Options', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_support",true); ?></td>
				</tr>
				<?php } ?>
				
					<?php if (get_post_meta($post->ID,"_as_depositopt",true) !='') { ?>
					<tr>
					<th><?php _e('Deposit Options', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_depositopt",true); ?></td>
				</tr>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID,"_as_withopt",true) !='') { ?>
					<tr>
					<th><?php _e('Withdrawal Options', 'doubledown'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_withopt",true); ?></td>
				</tr>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID, '_as_customhinput1', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl1', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput1', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput2', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl2', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput2', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput3', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl3', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput3', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput4', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl4', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput4', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput5', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl5', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput5', true);?></td>
			</tr>
			<?php } ?>
				
			</table>
		</div>
		
	</div>
	
	<div class="innerratings">
	<h3><?php _e('Ratings', 'doubledown'); ?></h3>
	<?php if (get_post_meta($post->ID,"_as_customrating_name1",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name1",true); ?></span>
		<span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_customrating1",true)*20; ?>%;"></span></span>
		</div>
	<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name2",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name2",true); ?></span>
		<span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_customrating2",true)*20; ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name3",true) !='') { ?>
			<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name3",true); ?></span>
		<span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_customrating3",true)*20; ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name4",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name4",true); ?></span>
		<span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_customrating4",true)*20; ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name5",true) !='') { ?>
			<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name5",true); ?></span>
		<span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_customrating5",true)*20; ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name6",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name6",true); ?></span>
		<span class="rate"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_customrating6",true)*20; ?>%;"></span></span>
		</div>
	<?php }?>
	</div>
  
  </div>

	<div class="entry-content" itemprop="description">
		<?php the_content();?>
	</div>
	<?php endwhile; endif; ?> 

 </section> <!--.content-->


<?php get_sidebar(); ?>

	<div class="clearboth"></div>

</div>
<?php get_footer(); ?>