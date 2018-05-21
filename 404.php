<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * 
 */

get_header(); ?>

<section class="banner-area">
	<?php if (get_theme_option('topheading-img') != ""): ?>
			<img alt="<?php the_title(); ?>" src="<?php echo get_theme_option('topheading-img'); ?>" /></a>
  		<?php else: ?>
  		<img src="<?php bloginfo('template_directory'); ?>/images/banner-img2.jpg" alt="<?php the_title(); ?>">

	<?php endif;?>
    <div class="inner-banner-txt">
        <h1>><?php _e('Page Not Found', 'doubledown'); ?></h1>
    </div>
</section><!--banner-area-->

<div id="main" class="contentarea">

<section id="content" class="main-content">
		
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2 class="entry-title"><?php _e('Page Not Found', 'doubledown'); ?></h2>

			<div class="entry-content">

			<p style="text-align:center;"><i class="fa fa-exclamation-triangle fa-3x"> </i></p>
			<p><?php _e('Page not found or has been removed.  Please browse one of our other pages. Search our site below', 'doubledown') ; ?></p>
			
			<?php get_search_form(); ?>

			</div><!--.entry-content-->

		</article>
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

	<div class="clearboth"></div>
</div>

<?php get_footer(); ?>