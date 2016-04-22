<?php
/**
 * Template Name: Home
 *
 */
get_header(); ?>
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Mejora Continua</h2>
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/man.png" alt="Asesoria EcoVive" class="img-responsive">
					<h3>Asesoria</h3>
					<p>Enriquecen la cadena de valor de tu producto, motivan al personal y fuerza de ventascanales de ventas.</p>
				</div>
			</div>
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/compass.png" alt="Construcción Ecovive" class="img-responsive">
					<h3>Construcción</h3>
					<p>Elevamos el uso de tu producto o servicio a través de programas 360°, generando relaciones de largo plazo.</p>
				</div>
			</div>
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sale.png" alt="Construcción Ecovive" class="img-responsive">
					<h3>Ventas</h3>
					<p>Es una plataforma de entrega que corre por la red bancaria lo que le da aceptación a modo de tarjeta bancarizada.</p>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="desarrollos-ficha">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Nuestras últimas construcciones</h2>
			</div>
		</div>
		<div class="row">
		<?php for ($i=0; $i < 6; $i++) { ?>
			
			<div class="col-sm-6 col-md-4 col-ms-6 col-xs-12 col-centered special-padding">
				<div class="ficha">
					<a href="#">
						<figure class="snip1451">
						  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/casa.jpg" alt="" class="img-responsive" />
						  <figcaption>
						    <div><i class="ion-ios-home-outline"></i></div>
						  </figcaption>
						</figure>
						<div class="contenido">
							<p>Terreno</p>
							<h3>Casa en Lomas del Punhuato, Morelia</h3>
						</div>
						<ul class="caracteristicas">
							<li>
								<span class="number">5</span>
								<i class="icon-bed"></i>
								<span class="texto">Recámaras</span>
							</li>
							<li>
								<span class="number">2</span>
								<i class="icon-toilet"></i>
								<span class="texto">Baños</span>
							</li>
							<li>
								<span class="number">3</span>
								<i class="icon-car"></i>
								<span class="texto">Estacionamiento</span>
							</li>
							<li>
								<span class="number">500 m<sup>2</sup> </span>
								<i class="icon-rectngulo"></i>
								<span class="texto">Terreno</span>
							</li>
						</ul>
					</a>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="row row-centered">
			<div class="col-xs-12 col-ms-8 col-sm-6 col-lg-4 col-centered">
				<div class="more">
					<a href="#" class="general">Ver más desarrollos</a>					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="paquetes">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h3>Planes de trabajo a tu medida</h3>
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-lg-3 col-sm-4 col-ms-12 col-xs-11 col-centered">
				<div class="paquete">
					<div class="head">
						Vivienda eco
					</div>
					<ul>
						<li>Opción 1</li>
						<li>Opción 2</li>
						<li>Opción 3</li>
					</ul>
					<a href="#" class="general">Click para más informes</a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-4 col-ms-12 col-xs-11 col-centered">
				<div class="paquete">
					<div class="head">
						Eco + Tecnológia
					</div>
					<ul>
						<li>Opción 1</li>
						<li>Opción 2</li>
						<li>Opción 3</li>
						<li>Opción 4</li>
						<li>Opción 5</li>
					</ul>
					<a href="#" class="general">Click para más informes</a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-4 col-ms-12 col-xs-11 col-centered">
				<div class="paquete">
					<div class="head">
						Eco + Tecno + Deco
					</div>
					<ul>
						<li>Opción 1</li>
						<li>Opción 2</li>
						<li>Opción 3</li>
						<li>Opción 4</li>
					</ul>
					<a href="#" class="general">Click para más informes</a>
				</div>
			</div>
		</div>		
	</div>
</div>
<?php get_footer(); ?>