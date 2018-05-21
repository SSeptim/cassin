<div class="bylines">

<?php   if (!get_theme_option('bylines-hide-author')) { ?> <?php _e('By', 'doubledown'); ?>

<span class="vcard author">	
 <span class="fn"><?php the_author_posts_link(); ?></span>
</span>

<?php } ?>   

<?php  if (!get_theme_option('bylines-hide-category')) { ?> <i class="fa fa-folder"> </i>  <?php the_category(', '); }  ?>   

<?php if (!get_theme_option('bylines-hide-comment')) { ?> &bull; <a href="<?php the_permalink(); ?>#comments">   <?php comments_number(); ?></a> <?php } ?>

</div><!--.bylines-->