<div class="thumb">
<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>">      
        	<?php the_post_thumbnail('slideimg', array('class' => 'articleimg')); ?>
       </a>
		
 	<?php } else if (get_theme_option('art-thumb')) { ?>
       	
		<a href="<?php the_permalink(); ?>">      
        	<img class="articleimg" src="<?php echo get_theme_option('art-thumb'); ?>" alt="<?php the_title(); ?>" width="800" height="300" />
        	</a>
		
<?php } ?>

<?php if (!get_theme_option('bylines-hide-date')) { ?>
 <div class="artdate"><time class="entry-date date updated" datetime="<?php the_time('o-m-d') ?>">
 <strong><?php the_time('j'); ?></strong>
 <span><?php the_time('F'); ?></span>
 </time></div>
 <?php } ?>

</div>