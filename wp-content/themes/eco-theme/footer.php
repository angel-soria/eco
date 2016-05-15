<footer>
	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3><?php echo (get_post_meta( 11, 'title_socios', true ));?></h3>
				</div>
			</div>
			<div class="row special-p row-centered">
				<div class="col-sm-3 col-ms-4 col-xs-6  col-centered">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/espacios-inteligentes.png" alt="" class="img-responsive">
				</div>
				<div class="col-sm-3 col-ms-4 col-xs-6 col-centered">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/innover.png" alt="" class="img-responsive">
				</div>
				<div class="col-sm-3 col-ms-4 col-xs-6 col-centered">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/decorstreet.png" alt="" class="img-responsive">
				</div>
				<div class="col-sm-3 col-ms-4 col-xs-6 col-centered">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/era.png" alt="" class="img-responsive">
				</div>
			</div>
		</div>
	</div>
	<div class="contacto">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-ms-5 col-xs-12">
					<div class="info_contacto">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="EcoVive D&C" class="img-responsive">
						<address>
							<?php echo (get_post_meta( 11, 'Contacto_footer', true ));?>
						</address>						
					</div>
				</div>
				<div class="col-sm-8 col-ms-7 col-xs-12 bg-green">
					<div class="row">
						<h3>Contáctanos</h3>
						<form action="" method="post">
							<div class="col-sm-6">
								<label for="Nambe">¿Cuál es su nombre?</label> <input type="text" name="nombre" />
								<label for="Nambe">¿Cuál es su correo?</label> <input type="text" name="corre" />
								<label for="Nambe">¿Cuál es su teléfono?</label> <input type="text" name="telefono" />
							</div>
							<div class="col-sm-6 xs-p">
								<label for="Nambe">¿Cuál es su mensaje?</label> <textarea name="Comentario" id="" cols="30" rows="10"></textarea>
								<button type="submit" >Enviar mensaje</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pie">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-ms-5 col-xs-12">
					<div class="pie__redes">
						<ul>
							<li>
								<a href="<?php echo urldecode(get_post_meta( 11, 'r_face', true ));?>"" target="_blank">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="<?php echo urldecode(get_post_meta( 11, 'r_twt', true ));?>" target="_blank">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="<?php echo urldecode(get_post_meta( 11, 'r_you', true ));?>" target="_blank">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="<?php echo urldecode(get_post_meta( 11, 'r_ins', true ));?>" target="_blank">
									<i class="fa fa-youtube" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-8 col-ms-7 col-xs-12">
					<p>Todos los derechos reservados EcoviveDYC S.A. de C.V. 2016</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>