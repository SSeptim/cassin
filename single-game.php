<?php
/**
 * The template for displaying all single casino reviews
 *
 * 
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php 

 $editor1=get_post_meta( $post->ID, '_ft_gm_editor1', true);
$rate = get_post_meta($post->ID,"_gm_rating",true)*20; 

$redirectkey=fly_redirect_slug(); 
$casino=get_post_meta($post->ID,"_gm_wtp1",true);

?>


<?php get_template_part( 'content', 'toppage' ); ?>

	<div id="main" class="contentarea" itemscope itemtype="http://schema.org/Review">
	
		<span itemprop="author" itemscope itemtype="http://schema.org/Person">
  		<meta itemprop="name" content="<?php echo get_the_author(); ?>" />
 </span>

<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
<meta itemprop="ratingValue" content="<?php echo get_post_meta($post->ID,"_gm_rating",true);?>" />
<meta itemprop="bestRating" content="5" />
<meta itemprop="worstRating" content="1" />
</span>
	
	<section id="content" class="main-content">
	
    <div class="game-info clearfix">
                <div class="game-img">
                    <div class="game-img-box">
                    	<?php the_post_thumbnail('casino-logo'); ?>
                        <span class="ratingm"><?php echo get_post_meta($post->ID,"_gm_rating",true);?></span>
                        <span class="rate cenmar"><span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_gm_rating",true)*20; ?>%;"></span></span>
                        <span class="ratingdet"><?php echo get_post_meta($post->ID,"_gm_gameratetext",true);?></span>
                    </div>
                    	<a title="<?php the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($casino,"_as_redirectkey",true);?>/" class="visbutton white">PLAY NOW!</a>
                </div>      <!--game-img-->
            	
                <div class="game-details">
                	<h2><span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
<span itemprop="name"><?php the_title(); ?></span></span></h2>

		<div class="entry-content" itemprop="description">
						   <?php the_content(); ?>
		  </div>                  
             
                </div>     <!--game-details-->
            </div>      <!--game-info-->
            
			<?php if (get_post_meta($post->ID,"_gm_demogame",true)!='') { ?>

            <div class="sign-up-area clearfix">
            	<div class="sign-up-header clearfix">
                	<h4><?php the_title(); ?></h4>
      
                </div>
                <div class="play-box">
				
					<?php echo stripslashes(get_post_meta($post->ID,"_gm_demogame",true)); ?>
				
				</div>
                <div class="share-icon">
                	<span>Share this:</span>
                <?php get_template_part( 'content', 'sharethis' );  ?>
                </div>
                <a title="<?php the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($casino,"_as_redirectkey",true);?>/" class="visbutton fright">SIGN Up NOW!</a>
            </div><!--sign-up-area-->
			
			<?php } ?>
            
	<?php endwhile; endif; ?> 
	
	<?php if ($editor1 != '') { ?>
		<?php echo apply_filters('the_content',$editor1);  ?>
	<?php } ?>	

 </section> <!--.content-->

<?php get_sidebar(); ?>

	<div class="clearboth"></div>

</div>
<?php get_footer(); ?>