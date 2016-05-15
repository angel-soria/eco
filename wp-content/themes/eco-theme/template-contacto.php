<?php
/**
 * Template Name: Contacto
 *
 */
get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="quienes contacto-pagina"> 
			<div class="container">
				<div class="row">
					<div class="col-sm-4 hidden-xs"></div>
					<div class="col-xs-12 col-sm-8 grreen">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-contacto.png" alt="EcoVive" class="img-responsive">
						<div class="contenido">
							<?php the_content( ); ?>
						</div>
						<h1><?php echo get_the_title(  ); ?></h1>
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<form action="" method="post">
										<div class="col-sm-12 col-md-6">
											<label for="Nambe">¿Cuál es su nombre?</label> <input type="text" name="nombre" />
											<label for="Nambe">¿Cuál es su correo?</label> <input type="text" name="corre" />
											<label for="Nambe">¿Cuál es su teléfono?</label> <input type="text" name="telefono" />
										</div>
										<div class="col-sm-12 col-md-6 ">
											<label for="Nambe">¿Cuál es su mensaje?</label> <textarea name="Comentario" id="" cols="30" rows="10"></textarea>
											<button type="submit" >Enviar mensaje</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer( '2' ); ?>