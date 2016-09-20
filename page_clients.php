<?php
/**
 * Template Name: Clients Template
 * sumaweb template for displaying Pages
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */

get_header(); ?>


	<!-- CONTENT -->
	<section class="clients">

		<?php

		if ( have_posts() ): 
			while ( have_posts() ) : the_post();?>

				<!-- COLUMNS --> 
				<div class="column_holder">
					<?php while ( have_rows('columns') ) : the_row(); ?>

					<div class="column" >
						<?php
						foreach ( get_sub_field('client_column') as $category ) { ?>

							<h3><?php echo( $category['category_name']); ?></h3>

							<ul class="client_list">
								<?php
								foreach ( $category['clients_list'] as $client ) { ?>
									<li>
										<?php echo( $client['client_name']); ?>
									</li>
								<?php } ?>
							</ul>

						<?php } ?>
					</div>

					<?php endwhile; ?>
				</div>
				<!-- /COLUMNS --> 



				<!-- SLIDER --> 
				<div class="slider_holder">

					<ul class="slider" >

					<?php while ( have_rows('slider') ) : the_row(); ?>

							<li class="slide">
								<?php
								$image = get_sub_field('slide');
								if( !empty($image) ): ?>

									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

								<?php endif; ?>
							</li>

					<?php endwhile; ?>
					</ul>
				</div>
				<!-- /SLIDER -->


			<?php	
			endwhile;
		endif; ?>

	</section>

	<!-- /CONTENT -->





<?php get_footer(); ?>