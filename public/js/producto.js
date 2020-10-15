
/*
Funcion que carga el dropdown de los productos
Parametros: 
Return: 
*/
$(document).ready(function(){
    $.get("/getNombresProductos", function(data, status){
    	var select = document.getElementById("nombreProds");
      var select2 = document.getElementById("nombreProdImgs");
    	var n = data.nombres.length;
    	
    	for(var i = 0; i < n; i++) {
    		var opt = data.nombres[i].nombre;
    		var el = document.createElement("option");
    		el.textContent = opt;
    		el.value = opt;
    		select.appendChild(el);

            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            select2.appendChild(el);
		  }
    });
});

var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};


