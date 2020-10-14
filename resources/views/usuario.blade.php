<!DOCTYPE html>

<html lang = "es">

<head>
	<title>Cannubis</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/producto.js"></script>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

	<h1>Usuario</h1> 

	<form action="/registraProducto" method="post">
					<div class="">
						<br>
						@csrf

						<label><i aria-hidden="true"></i> <b>Nombre</b></label>
						<input required type="text" name="nombre" value="Alexis">

						<br>

						<label class="w3-text-black"><i class="fa fa-envelope-square" aria-hidden="true"></i> <b>Precio</b></label>
						<input required type="text" name="precio" value="10">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <b>Cantidad</b></label>
						<input required type="text" name="cantidad" value="100">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <b>Especificaciones</b></label>
						<input required type="text" name="especificaciones" value="esp">
						
						<br>

						<label class="w3-text-black"><i class="fa fa-level-up" aria-hidden="true"></i> <b>Descripcion</b></label>
						<input required type="text" name="descripcion" value="desc">
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

		<br>
		<br>
		<br>
		<p>Todavía no jala</p>
		<form id="file-upload-form" class="uploader" action="/registraImagen" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
	        <input id="file-upload" type="file" name="image">
	        <label for="file-upload" id="file-drag">
	        	<br>
	        	<br>
	            <button type="submit" class="btn btn-success">Submit</button>
	        </label>
    	</form>

    	<br>
		<br>
		
		<form action="/">
    		<input type="submit" value="Regresa" />
		</form>


</body>

</html>