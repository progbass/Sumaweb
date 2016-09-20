<?php
/**
 * sumaweb template for displaying Single-Posts
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */

get_header(); ?>


	<!-- CONTENT -->
	<section class="single_blog">

		<div class="info_holder">
			<?php
			if ( have_posts() ) : the_post(); ?>

				<!-- COVER PHOTO --> 
				<div class="cover">
					<?php the_post_thumbnail(); ?>
				</div>				
				<!-- /COVER PHOTO --> 



				<!-- PROJECT INFO -->
				<div class="info">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
				<!-- /PROJECT INFO --> 

			<?php
			else :
				get_template_part( 'loop', 'empty' );

			endif;
			?>
		</div>




		<!-- SIDEBAR -->
		<?php get_sidebar(); ?>
		<!-- /SIDEBAR -->




	</section>
	<!-- /CONTENT -->





<?php get_footer(); ?>