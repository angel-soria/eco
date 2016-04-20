<footer>
	<div class="contacto">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-ms-5 col-xs-12">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="EcoVive D&C">
					<address>
						 01 443 3 24 77 70 ext. 201 <br/>

						Av. Acueducto #95 Int. 301 Colonia Vasco de Quiroga, C.P. 58230 Morelia Michoacán<br/>

						contacto@ecovivedyc.com
					</address>
				</div>
				<div class="col-sm-8 col-ms-7 col-xs-12">
					<div class="row">
						<h3>Contáctanos</h3>
						<form action="" method="post">
							<div class="col-sm-6">
								<label for="Nambe">¿Cuál es su nombre?</label> <input type="text" name="nombre" />
								<label for="Nambe">¿Cuál es su correo?</label> <input type="text" name="corre" />
								<label for="Nambe">¿Cuál es su teléfono?</label> <input type="text" name="telefono" />
							</div>
							<div class="col-sm-6">
								<label for="Nambe">¿Cuál es su mensaje?</label> <textarea name="Comentario" id="" cols="30" rows="10"></textarea>
								<input type="submit"  value="Enviar mensaje">
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
								<a href="#">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
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