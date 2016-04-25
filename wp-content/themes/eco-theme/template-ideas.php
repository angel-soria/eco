<?php
/**
 * Template Name: Ideas
 *
 */
get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3><?php echo get_the_content( ); ?></h3>
						<div><a href="<?php echo get_home_url(); ?>">Home</a> > <h1><?php echo get_the_title(); ?></h1> </div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<div class="desarrollos-ficha">
	<div class="container">
		<div class="row">
		<?php for ($i=0; $i < 6; $i++) { ?>
			
			<div class="col-sm-6 col-md-6 col-ms-6 col-xs-12 col-centered special-padding">
				<div class="ficha">
					<a href="#">
						<figure class="snip1451">
						  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ideas.jpg" alt="" class="img-responsive" />
						  <figcaption>
						    <div><i class="ion-lightbulb"></i></div>
						  </figcaption>
						</figure>
						<div class="contenido">
							<p>Terreno</p>
							<h3>Casa en Lomas del Punhuato, Morelia</h3>
						</div>
					</a>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="row ">
			<div class="col-xs-12">
				<ul class="pagination">
				  <li><a href="#">1</a></li>
				  <li><a href="#">2</a></li>
				  <li><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>