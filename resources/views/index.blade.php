<!DOCTYPE html>
<!-- http://local.cannubis-->

<html lang = "es">

<head>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/producto.js"></script>
	<title>Cannubis</title>

	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
	<h1>
		Bienvenido a Cannubis
	</h1>
		<form action="/mota">
    		<input type="submit" value="Mota" />
		</form>

		<form action="/prueba">
    		<input type="submit" value="prueba" />
		</form>

		<form action="/registraProducto" method="post">
					<div class="">
						<br>
						@csrf

						<label><i aria-hidden="true"></i> <b>Nombre</b></label>
						<input class="w3-input w3-border w3-light-grey" required type="text" name="nombre" value="Alexis">

						<br>

						<label class="w3-text-black"><i class="fa fa-envelope-square" aria-hidden="true"></i> <b>Precio</b></label>
						<input class="w3-input w3-border w3-light-grey" required type="text" name="precio" value="10">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <b>Cantidad</b></label>
						<input class="w3-input w3-border w3-light-grey" required type="text" name="cantidad" value="100">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <b>Especificaciones</b></label>
						<input class="w3-input w3-border w3-light-grey" required type="text" name="especificaciones" value="esp">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-level-up" aria-hidden="true"></i> <b>Descripcion</b></label>
						<input class="w3-input w3-border w3-light-grey" required type="text" name="descripcion" value="desc">
						<br>
						<button class="w3-btn w3-grey w3-round-large"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</button>
						<br>
					</div>
		</form>

			
		<form action="/eliminaProducto" method="post">
			<div class="">
				@csrf
				<br>
				<br>
				<select id="nombreProds" name= "productoActual">
					<option value="" name="productoActual">Productos</option>
				</select>
				<br>
				<button ><i aria-hidden="true"></i> Eliminar Producto</button>
				<br>				
			</div>
		</form>


		<!-- 

			<h1 id="json"></h1>

			<form action="/getProductos">
    			<input type="submit" value="JSON" />
			</form>

			<button id="btnPrueba" onclick="generaProductos(3);"><i class="fa fa-trash-o" aria-hidden="true"></i> GeneraProductos</button>
					
		-->
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			<h1>Productos</h1>


</body>

</html>