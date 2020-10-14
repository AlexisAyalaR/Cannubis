

/*
Funcion que genera Divs dependiendo del numero de productos que haya
Parametros: numProd: Número de productos
Return: 
*/
function generaProductos(nom, pr, cant, esp, desc){
		var div = document.createElement('div');
  		div.id = 'prodId';
  		div.className = 'prodClass';

  		var h1 = document.createElement('h1');
  		h1.innerHTML = "Producto: " + nom;

  		var p1 = document.createElement('p');
  		p1.innerHTML = "Precio: " + pr;

  		var p2 = document.createElement('p');
  		p2.innerHTML = "Cantidad disponible: " +cant;

  		var p3 = document.createElement('p');
  		p3.innerHTML = "Especificaciones: " +esp;

  		var p4 = document.createElement('p');
  		p4.innerHTML = "Descripción: " +desc;

  		div.appendChild(h1);
  		div.appendChild(p1);
  		div.appendChild(p2);
  		div.appendChild(p3);
  		div.appendChild(p4);
  		
  		document.body.appendChild(div);
};

/*
Funcion que carga el dropdown de los productos
Parametros: 
Return: 
*/
$(document).ready(function(){
    $.get("/getNombresProductos", function(data, status){
    	var select = document.getElementById("nombreProds");
    	var n = data.nombres.length;
    	
    	for(var i = 0; i < n; i++) {
    		var opt = data.nombres[i].nombre;
    		var el = document.createElement("option");
    		el.textContent = opt;
    		el.value = opt;
    		select.appendChild(el);
		}
    });
});

/*
Funcion que carga los valores de los productos
Parametros: 
Return: Divs con productos 
*/
var load = 0;
$(document).ready(function(){
  $("#loadProductos").click(function(){
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

      		generaProductos(nombre, precio, cantidad, especificaciones, descripcion);
        };
      });
    };  	
  });
});






