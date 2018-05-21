<div class="singlebylines">

<div class="leftmeta">
<?php  if (!get_theme_option('bylines-hide-author')) { ?> <?php _e('By', 'sportsnews'); ?>

<span class="vcard author">	
 <span class="fn"><?php the_author_posts_link(); ?></span>
</span>

<?php }  if (!get_theme_option('bylines-hide-category')) { ?> <i class="fa fa-folder"> </i>  <?php the_category(', '); }  ?>   
 
 </div>
 
 <?php get_template_part( 'content', 'sharethis' ); ?>
 
</div><!--.bylines-->