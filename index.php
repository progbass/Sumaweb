<?php
/**
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */

get_header(); ?>



	<!-- CONTENT -->
	<section class="portfolio">
		<?php
		// Random Posts
		query_posts(array('orderby' => 'rand'));

		//
		if ( have_posts() ): ?>

			<!-- CLIENTS LIST --> 
			<ul class="main_list">


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'loop' );
				
			endwhile; ?>


			</ul>
			<!-- /CLIENTS LIST --> 
		<?php
		endif; ?>
		
	</section>
	<!-- /CONTENT -->



<?php get_footer(); ?>