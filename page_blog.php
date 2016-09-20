<?php
/**
 * Template Name: Blog Template
 * sumaweb template for displaying Blog Entries
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */

get_header(); ?>


	<!-- CONTENT -->
	<section class="blog">

		<?php
		$blog_query = new WP_Query(array(
			'post_type'	=> 'blog_post'
		));
		if ( $blog_query->have_posts() ): ?>

			<!-- CLIENTS LIST --> 
			<ul class="blog_list">


			<?php
			while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

				<li>
					<div class="cover">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

						<a class="more_button">Ver m&aacute;s</a>
					</div>


					<div class="info">
						<span class="date"><?php the_date('d.m.y'); ?></span>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_excerpt(); ?></p>
					</div>
				</li>

			<?php
			endwhile; ?>


			</ul>
			<!-- /CLIENTS LIST --> 
		<?php
		endif; ?>






		<!-- SIDEBAR -->
		<?php get_sidebar(); ?>
		<!-- /SIDEBAR -->




	</section>
	<!-- /CONTENT -->





<?php get_footer(); ?>