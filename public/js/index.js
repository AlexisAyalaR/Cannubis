
/*
Funcion que genera Divs dependiendo del numero de productos que haya
Parametros: numProd: Número de productos
Return: 
*/
function generaProductos(nom, pr, cant, esp, desc, img, div){

  		var h1 = document.createElement('h1');
      var a = document.createElement('a');
  		a.innerHTML = nom;
      a.href = "/productos/" + nom;
      h1.appendChild(a);

  		var p1 = document.createElement('p');
  		p1.innerHTML = "Precio: " + pr;

      if (cant > 0) {
        cant = "Disponible"
      }else{
        cant = "Agotado";
      };
  		var p2 = document.createElement('p');
  		p2.innerHTML = cant;

  		var p3 = document.createElement('p');
  		p3.innerHTML = "Especificaciones: " +esp;

  		var p4 = document.createElement('p');
  		p4.innerHTML = "Descripción: " +desc;

      div.appendChild(h1);
      div.appendChild(p1);
      div.appendChild(p2);
      //div.appendChild(p3);
      //div.appendChild(p4);
      
      var n = img.length;
      for (var i = 0; i < n; i++) {
        var imgActual = document.createElement('img');
        imgActual.src = "/img/" +img[i];
        div.appendChild(imgActual);
      };

};

/*
Funcion que carga los valores de los productos
Parametros: 
Return: Divs con productos 
*/
var load = 0;
$(document).ready(function(){
    if (load == 0) {
      load = load + 1;
      $.get("/getProductos", function(data, status){
        var prod = data.productos;
        var n = data.productos.length;
        for (var i = 0; i < n; i++) {
          var nombre = prod[i].nombre;
          var precio = prod[i].precio;
          var cantidad = prod[i].cantidad;
          var especificaciones = prod[i].especificaciones;
          var descripcion = prod[i].descripcion;

          var img = data.imagenes[i];
          var m = img.length;

          var imagenesPrincipales = [];

          for (var k = 0; k < m; k++) {
            if (img[k].principal == '1') {
               imagenesPrincipales.push(img[k].nombre);
            };
          };
          /*
          var imagenes = [];
          for (var j = 0; j < m; j++) {
            imagenes.push(img[j].nombre);
          };*/
          var div = document.getElementById("productosIndex");
          generaProductos(nombre, precio, cantidad, especificaciones, descripcion, imagenesPrincipales, div);
        };
      });
    };    
});


