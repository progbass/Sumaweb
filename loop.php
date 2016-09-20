<?php
/**
 * sumaweb template for displaying the standard Loop
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */
?>


<li>
	<article class="content" id="post-<?php the_ID(); ?>" >
		<a href="<?php the_permalink(); ?>" class="project_link">
			<?php the_post_thumbnail(); ?>
		</a>
	</article>

	<div class="overlay">
		<div class="content">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
	</div>
</li>