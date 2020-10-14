<!DOCTYPE html>

<html lang = "es">

<head>
	<title>Cannubis</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/usuario.js"></script>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

	<h1>Adim</h1> 

	<h3>Crear nuevo usuario:</h3>

		<form action="/registraUsuario" method="post" id = "regForm">
					<div class="">
						<br>
						@csrf

						<label><i aria-hidden="true"></i> <b>Usuario</b></label>
						<input required type="text" name="Usuario" value="Alexis">

						<br>

						<label><i aria-hidden="true"></i> <b>Email</b></label>
						<input required type="mail" name="Email" value="Alexis@gmail.com">

						<br>

						<label class="w3-text-black"><i class="fa fa-envelope-square" aria-hidden="true"></i> <b>Constraseña</b></label>
						<input required type="password" name="Pass" id="Pass" value="123">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <b>Confirmar contraseña</b></label>
						<input required type="password" name="CPass" id="CPass" value="123">
						
						<br>
						<button onclick="alerta(); return validaInputs();"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</button>
						<br>
					</div>
		</form>

		<br>
		<br>

	<h3>Elimina usuario:</h3>

		<form action="/eliminaUsuario" method="post">
			<div class="">
				@csrf
				<select id="emailUsu" name= "emailActual">
					<option value="" name="emailActual">Usuarios</option>
				</select>
				<br>
				<button ><i aria-hidden="true"></i> Eliminar Usuarios</button>
				<br>				
			</div>
		</form>

		<br>
		<br>
		
	<form action="/">
   		<input type="submit" value="Regresa" />
	</form>



</body>

</html>