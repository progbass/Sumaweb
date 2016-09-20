<?php
/**
 * Template Name: Front Page Template
 * sumaweb template for displaying the Front-Page
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */

get_header(); ?>


	

	<!-- CONTENT -->
	<section class="home">

		<?php
		$latest_blog_posts = new WP_Query( array( 'orderby' => 'rand') );
		if ( $latest_blog_posts->have_posts() ) : ?>

				
		
			<!-- LATEST POSTS -->
			<table class="main_list">
				<colgroup class="table_group">
					<col></col>
					<col></col>
					<col></col>
					<col></col>
				</colgroup>

				<tbody class="table_body">

				<?php
				$cols_max = 4;
				$col_count = 0;
				$row_count = 0;
				while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();

					//get_template_part( 'loop', get_post_format() );
					$make_row = ($col_count % $cols_max) == 0 ;
					$bigCell = ($row_count == 1) ? true : false;
					$colspan = (!$bigCell) ? 1 : 2;
					$rowspan = 1;
					


					// Create table row
					if( $make_row ){  ?>
						<tr class="table_row">
					<?php
					}



					// Create table cell
					?>
						<td colspan="<?php echo $colspan; ?>" >
							<div class="content">
								<a href="<?php the_permalink(); ?>" class="project_link"> 
									<?php the_post_thumbnail(); ?>
								</a>
							</div>

							<div class="overlay">
								<div class="content">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						</td>
					<?php


					if( $bigCell ){ ?>
						<td class="highlight" colspan="<?php echo $colspan; ?>">
							<div class="content">
								<h1>Our experience is at the highest levels</h1>
							</div>

							<a href="#" class="more_button">Ver m&aacute;s</a>
						</td>
					<?php

						$col_count = $cols_max-1 ;
					}



					// Close table row
					if( ($col_count % $cols_max) == $cols_max-1  ){ ?>

						</tr>

					<?php
						$col_count = 0;
						$row_count++;


					} else {

						// increment interation counter
						$col_count++;
					}

				endwhile;
				?>

				</tbody>
			</table>
			<!-- /LATEST POSTS --> 
		

		<?php

		else :
			get_template_part( 'loop', 'empty' );

		endif; ?>
		

	</section>
	<!-- /CONTENT -->





<?php get_footer(); ?>