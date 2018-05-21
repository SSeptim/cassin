<?php
/**
 * The template index page.
 *
 * 
 */

get_header(); ?>

<section class="banner-area">
	<img src="<?php bloginfo('template_directory'); ?>/images/banner-img2.jpg" alt="">
    <div class="inner-banner-txt">
        <h1><?php the_title(); ?></h1>
    </div>
</section><!--banner-area-->

<div id="main" class="contentarea>

<section id="content" class="main-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
		<article <?php post_class('blogarticles') ?> id="post-<?php the_ID(); ?>">

			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>    
        		
			<?php if (!get_theme_option('bylines-hide-all')) {  get_template_part( 'content', 'meta3' ); } ?>
			
  			<?php the_content();?>
			
		</article><!--.articleexcerpt-->
		
		<hr />

	<?php endwhile; endif; ?><?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

	<?php kriesi_pagination();?> 
	
</section> <!--#content-->

<?php get_sidebar(); ?>

<div class="clearboth"></div>
</div>

<?php get_footer(); ?>