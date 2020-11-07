

$(document).ready(function(){

    var url = window.location.pathname;
    var nombre = url.substring(url.lastIndexOf('/') + 1);

    var url = "/getInfoProducto/"+nombre;
    $.get(url, function(data, status){
        var prod = data.producto;
        var nombre = prod[0].nombre;
        var precio = prod[0].precio;
        var cantidad = prod[0].cantidad;
        var especificaciones = prod[0].especificaciones;
        var descripcion = prod[0].descripcion;

        var img = data.imagenes[0];
        var m = img.length;

        var imagenes = [];
        for (var j = 0; j < m; j++) {
            imagenes.push(img[j].nombre);
        };

        cargaProducto(nombre, precio, cantidad, especificaciones, descripcion, imagenes);   
    });
});


function cargaProducto(nom, prec, cant, esp, desc, img){
    var nombre = document.getElementById('productName');
    nombre.innerHTML = nom;

    var precio = document.getElementById('precio');
    precio.innerHTML = prec;

    if (cant > 0) {
        cant = "Disponible"
      }else{
        cant = "Agotado";
      };
    var cantidad = document.getElementById('cantidadDisponible');
    cantidad.innerHTML = cant;

    var especificaciones = document.getElementById('especificaciones');
    especificaciones.innerHTML = esp;

    var descripcion = document.getElementById('descripcion');
    descripcion.innerHTML = desc;

    //Imagenes
    var imagenes = document.getElementById('imagenes');

    var n = img.length;
      for (var i = 0; i < n; i++) {
        var imgActual = document.createElement('img');
        imgActual.src = "/img/" +img[i];
        imagenes.appendChild(imgActual);
      };

}