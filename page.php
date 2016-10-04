<?php
/**
 * Template Name: Page Template
 * sumaweb template for displaying Pages
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */

get_header(); ?>



	<?php
	global $post;
    $page_slug=$post->post_name; 

    switch( strtolower($page_slug) ){
    	case 'equipo':
    		$page_slug = 'team';
    		break;

    	case 'nosotros':
    		$page_slug = 'about';
    		break;

    	case 'oficinas':
    		$page_slug = 'office';
    		break;

    	case 'contacto':
    		$page_slug = 'contact';
    		break;

    	default:
    		break;
    }?>
	<!-- CONTENT -->
	<section class="<?php echo $page_slug; ?>">



		<?php
		if(is_page( 'Contacto' )){ ?>
		
		<!-- CONTACT FORM --> 
		<div class="form_holder">
			<?php
			if ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php
			endif;?>
		</div>
		<!-- /CONTACT FORM --> 






		<?php
		} else if(is_page( 'Oficinas' )) { ?>

			<!-- MAP --> 
			<div class="map_holder">
				<div id="gMap"></div>
			</div>				
			<!-- /MAP --> 





		<?php
		}  else if(is_page( 'Nosotros' )) { ?>

			<?php
			if ( have_posts() ) : the_post(); ?>
				<!-- TEAM PHOTO --> 
				<div class="team_photo">
					<?php $image = get_field('photo'); ?>
			        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					<a href="<?php the_permalink(); ?>" class="more_button">Ver M&aacute;s</a>
				</div>				
				<!-- /TEAM PHOTO --> 
			<?php
			endif;?>





		<?php
		}  else { ?>

			<?php
			if ( have_posts() ) : the_post(); ?>
				<div class="content_holder team_photo">
					<?php the_content(); ?>
				</div>
			<?php
			endif;?>

		<?php
		}?>

	



		<?php
		if( is_page( 'Oficinas' ) ) { ?>

			<!-- ADDRESS HOLDER --> 
			<div class="address_holder">
				<p>4a Cerrada José María Vigil 2<br> 
				Escandon 1a Sección,<br> 
				Miguel Hidalgo, 11800<br> 
				CDMX, México</p>
				
				<p>22231420</p>
			</div>
			<!-- /ADDRESS HOLDER --> 



		<?php
		} else if(is_page('Nosotros')) {

			// Content ?>

			<div class="content_holder">
				<?php the_content(); ?>
			</div>

		<?php
			//Team query 
			$team_query = new WP_Query(array( 'post_type' => 'team'));
			if ( $team_query->have_posts() ): ?>

			<!-- TEAM LIST --> 
			<ul class="main_list">
				
				<?php
				while ( $team_query->have_posts() ) : $team_query->the_post(); ?>
				<li>
					<div class="content">
						<?php the_post_thumbnail(); ?>
					</div>

					<div class="overlay">
						<div class="content">
							<a href="#" class="name project_link"><?php the_title(); ?></a>
							<span><?php the_field('role'); ?></span>
							<p><?php the_field('quote'); ?></p>
						</div>

						<!-- <a href="#" class="more_button">Ver M&aacute;s</a> -->
					</div>
				</li>
				<?php
				endwhile; ?>

			</ul>
			<!-- /TEAM LIST --> 

		<?php
			endif;
		}?>
		
		


	</section>

	<!-- /CONTENT -->





<?php get_footer(); ?>