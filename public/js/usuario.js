
/*
AJAX que, cuando cambia el dropdown de los edit, manda el form
*/
$(document).ready(function() {
    document.getElementById("loadProducto").style.display = "none";
    $('#nombreProds').on('change', function() {
        document.getElementById("loadProducto").click();
    });
});

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

var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

var load = 0;
$(document).ready(function(){
  $(document).on('submit','#formCarga',function(e){
    event.preventDefault();
    var nombre = $( this ).serializeArray()[0].value;
    currentProduct = nombre;

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
    if (load == 0) {
        load = load + 1;
        generaEditProducto(nombre, precio, cantidad, especificaciones, descripcion);
        
        if(img.length > 0){
            generaEditImagenes(imagenes);
        }
    }else{
        //Reemplazamos divs de edición
        var divDentro = document.getElementById('productoAEditarAdentro');
        var divFuera = document.getElementById('productoAEditarAfuera');
        reemplazaDivs(divFuera, divDentro, "productoAEditarAdentro");

        //Reemplazamos divs de borrar
        var divDentro = document.getElementById('productoAEliminarDentro');
        var divFuera = document.getElementById('productoAEliminarFuera');
        reemplazaDivs(divFuera, divDentro, "productoAEliminarDentro");


        //Reemplazamos divs de imagenes a cargar
        var divDentro = document.getElementById('divCargaImgsDentro');
        var divFuera = document.getElementById('divCargaImgsFuera');
        reemplazaDivs(divFuera, divDentro, "divCargaImgsDentro");


        //Reemplazamos divs de imagenes a borrar
        var divDentro = document.getElementById('imagenABorrar');
        var divFuera = document.getElementById('imagenABorrarFuera');
        reemplazaDivs(divFuera, divDentro, "imagenABorrar");

        generaEditProducto(nombre, precio, cantidad, especificaciones, descripcion);

        if(img.length > 0){
            generaEditImagenes(imagenes);
        }
    };    
    });
  });
});

function reemplazaDivs(divFuera, divDentro, nomDentro){
    divDentro.parentNode.removeChild(divDentro);

    var nuevoDivDentro = document.createElement('div');
    nuevoDivDentro.id = nomDentro;
    divFuera.appendChild(nuevoDivDentro);
}

function generaEditProducto(nom, prec, cant, esp, desc){

    var tabla = document.createElement('table');
    var tr1 = document.createElement('tr');

    var thProd1 = document.createElement('th');
    thProd1.innerHTML = "Producto";
    var thProd2 = document.createElement('th');
    thProd2.innerHTML = "Precio";
    var thProd3 = document.createElement('th');
    thProd3.innerHTML = "Cantidad";
    var thProd4 = document.createElement('th');
    thProd4.innerHTML = "Especificaciones";
    var thProd5 = document.createElement('th');
    thProd5.innerHTML = "Descripcion";

    tr1.appendChild(thProd1);
    tr1.appendChild(thProd2);
    tr1.appendChild(thProd3);
    tr1.appendChild(thProd4);
    tr1.appendChild(thProd5);

    var tr2 = document.createElement('tr');

    var tdProd1 = document.createElement('td');
    var nombre = document.createElement('p');
    nombre.innerHTML = nom;
    nombre.id = "nombre";
    tdProd1.appendChild(nombre);

    var tdProd2 = document.createElement('td');
    var precio = document.createElement('input');
    precio.value = prec;
    precio.name = "precio";
    tdProd2.appendChild(precio);

    var tdProd3 = document.createElement('td');
    var cantidad = document.createElement('input');
    cantidad.value = cant;
    cantidad.name = "cantidad";
    tdProd3.appendChild(cantidad);

    var tdProd4 = document.createElement('td');
    var especificaciones = document.createElement('input');
    especificaciones.value = esp;
    especificaciones.name = "especificaciones";
    tdProd4.appendChild(especificaciones);

    var tdProd5 = document.createElement('td');
    var descripcion = document.createElement('input');
    descripcion.value = desc;
    descripcion.name = "descripcion";
    tdProd5.appendChild(descripcion);

    tr2.appendChild(tdProd1);
    tr2.appendChild(tdProd2);
    tr2.appendChild(tdProd3);
    tr2.appendChild(tdProd4);
    tr2.appendChild(tdProd5);

    tabla.appendChild(tr1);
    tabla.appendChild(tr2);

    //Agregamos el boton para editar
    var inputEditarImg = document.createElement('input');
    inputEditarImg.type = "submit";
    inputEditarImg.name = "editarProd";
    inputEditarImg.value = "Editar";

    //Pegamos todo lo de edición
    var div = document.getElementById('productoAEditarAdentro');
    var h4 = document.createElement('h4');
    h4.innerHTML = "Editar o borrar un producto:";
    div.appendChild(h4);
    div.appendChild(tabla);
    div.appendChild(inputEditarImg);

    //Agregamos el boton para borrar
    var inputBorrarImg = document.createElement('input');
    inputBorrarImg.type = "submit";
    inputBorrarImg.name = "borrarProd";
    inputBorrarImg.value = "Borrar";


    //Pegamos todo lo de eliminar
    div2 = document.getElementById('productoAEliminarDentro');
    div2.appendChild(inputBorrarImg);

    //Agregamos el boton y el input para subir imágenes
    var b3 = document.createElement('button');
    b3.type = "submit";
    b3.class = "btn btn-success";
    b3.innerHTML = "Submit";

    var inp = document.createElement('input');
    inp.id = "file-upload";
    inp.type = "file";
    inp.name = "image";
    inp.onchange = "loadFile(event)";

    //Pegamos todo lo de subir imágenes
    var div3 = document.getElementById('divCargaImgsDentro');
    var h4 = document.createElement('h4');
    h4.innerHTML = "Subir imágenes:";
    div3.appendChild(h4);
    div3.appendChild(inp);
    div3.appendChild(b3);

}

function generaEditImagenes(img){
    var div = document.getElementById('imagenABorrar');

    var tabla = document.createElement('table');
    var tr = document.createElement('tr');

    var n = img.length;
    for (var i = 0; i < n; i++) {
        var td = document.createElement('td');
        var imgActual = document.createElement('img');
        imgActual.src = "img/" +img[i];
        imgActual.style= "width:100px;height:100px;"
        td.appendChild(imgActual);
        tr.appendChild(td);
    };
    
    var trBut = document.createElement('tr');
    for (var i = 0; i < n; i++) {
        var sel = document.createElement('input');
        sel.type = "radio";
        sel.value = img[i];
        sel.name = "imagen";
        var td = document.createElement('td');
        td.appendChild(sel);
        trBut.appendChild(td);
    };

    var h4 = document.createElement('h4');
    h4.innerHTML = "Editar imagenes";

    var inputBorrarImg = document.createElement('input');
    inputBorrarImg.type = "submit";
    inputBorrarImg.name = "action";
    inputBorrarImg.value = "Borrar";

    var inputImgPrincipal = document.createElement('input');
    inputImgPrincipal.type = "submit";
    inputImgPrincipal.name = "action";
    inputImgPrincipal.value = "Establecer como imagen principal";


    tabla.appendChild(tr);
    tabla.appendChild(trBut);
    div.appendChild(h4);
    div.appendChild(tabla);
    div.appendChild(inputBorrarImg);
    div.appendChild(inputImgPrincipal);    


}


