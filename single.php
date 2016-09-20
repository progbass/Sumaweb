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
	<section class="single">
		<?php
		if ( have_posts() ) : the_post(); ?>
		
			    <h2><?php the_title(); ?></h2>

				
				<?php
				$image = get_field('cover_image');
				if( $image ){ ?>
					<!-- MAIN PHOTO --> 
					<div class="team_photo">
			        	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</div>				
					<!-- /MAIN PHOTO -->
				<?php
				}?>



				<!-- PROJECT INFO
				<div class="info_holder">

					<h2><?php the_title(); ?></h2>

					
					<?php the_content(); ?>

				</div>
				/PROJECT INFO --> 



				
				<!-- WORK LIST --> 
				<ul class="work_list">
					<li class="info">
						<div class="content_holder">
							<?php the_excerpt(); ?>
						</div>

						<div class="full_content">

							<?php
							if(get_field('content_col_left')): ?>

							<div class="col">
								<?php the_field('content_col_left') ?>
							</div>

							<?php
							endif; ?>


							<?php
							if(get_field('content_col_right')): ?>

							<div class="col">
								<?php the_field('content_col_right') ?>
							</div>
							
							<?php
							endif; ?>

						</div>

						<a class="more_button">Más Info</a>
					</li>


					<?php
					// check if the repeater field has rows of data
					if( have_rows('project_gallery') ): ?>

						

						<?php
					 	// loop through the rows of data
					    while ( have_rows('project_gallery') ) : the_row(); ?>

					        <li>
								<div class="content_holder">
									<?php $image = get_sub_field('photo'); ?>
						        	<a href="<?php echo $image['url']; ?>" class="fancybox">
							        	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							        </a>


									<?php
									//if( get_sub_field('description') != '' ) { ?>
									<?php
									//}?>
								</div>
							</li>

						<?php
					    endwhile; ?>


					<?php
					endif; ?>
				</ul>
				<!-- /WORK LIST --> 
				



			<?php
			else :
				get_template_part( 'loop', 'empty' );

			endif;
			?>
	</section>
	<!-- /CONTENT -->





<?php get_footer(); ?>