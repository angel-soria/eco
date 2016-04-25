<?php
/**
 * Template Name: Quienes Somos
 *
 */
get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="quienes">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/quienes-eco.png" alt="EcoVive" class="img-responsive cabezal">
						<h1><?php echo get_the_title(  ); ?></h1>
						<div class="contenido">
							<?php the_content( ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
	<?php include('servicios.php'); ?>
<?php get_footer(  ); ?>