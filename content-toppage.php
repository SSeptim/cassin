<section class="banner-area">
	<?php if (get_theme_option('topheading-img') != ""): ?>
			<img alt="<?php the_title(); ?>" src="<?php echo get_theme_option('topheading-img'); ?>" /></a>
  		<?php else: ?>
  		<img src="<?php bloginfo('template_directory'); ?>/images/banner-img2.jpg" alt="<?php the_title(); ?>">

	<?php endif;?>

    <div class="inner-banner-txt">
        <h1><?php the_title(); ?></h1>
         <p>
            <?php echo get_post_meta($post->ID,"_main_subtitle",true); ?>
        </p>
    </div>
</section><!--banner-area-->