<!DOCTYPE html>
<!-- http://local.cannubis-->

<html lang = "es">

<head>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<title>Cannubis</title>

	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
	<h1>
		Bienvenido a Cannubis
	</h1>
		<form action="/usuario">
    		<input type="submit" value="Login" />
		</form>

		<form action="/usuarioAdmin">
    		<input type="submit" value="LoginAdmin" />
		</form>

		<br>
		<br>

		<form action="/pruebas">
    		<input type="submit" value="Página pruebas" />
		</form>

		<br>
		<br>
	
	<h1>Productos</h1>

	<div id="productosIndex">
		
	</div>

	<br>
	<br>

	<h1>Acerca de nosotros</h1>
	<p>Si tienes alguna duda mandanos un mail y te respondemos lo antes posible:</p>

	<form action="/enviaMail" method="post">
		<div class="">
			<br>
			@csrf

			<label><i aria-hidden="true"></i> <b>Teléfono</b></label>
			<input required type="number" name="tel" value="">

			<br>

			<label><i aria-hidden="true"></i> <b>Mail</b></label>
			<input required type="text" name="email" value="">
						
			<br>

			<label><i aria-hidden="true"></i> <b>Especificación</b></label>
			<textarea required type="text" rows="5" name="esp"></textarea>
						
			<br>

			<button><i aria-hidden="true"></i> Enviar</button>
			<br>
		</div>
	</form>


</body>

</html>