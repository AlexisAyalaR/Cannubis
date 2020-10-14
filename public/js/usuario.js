$(document).ready(function(){
    $.get("/getEmailsUsuarios", function(data, status){
    	var select = document.getElementById("emailUsu");
    	var n = data.emails.length;
    	
    	for(var i = 0; i < n; i++) {
    		var opt = data.emails[i].email;
    		var el = document.createElement("option");
    		el.textContent = opt;
    		el.value = opt;
    		select.appendChild(el);
		}
    });
});


function validaInputs(){
  var c = document.getElementById('Pass').value;
  var cc = document.getElementById('CPass').value;
  if (c == cc) {
    document.getElementById("regForm").submit();
  } else{
    return false;
  };
  
}

function alerta(){
    var c = document.getElementById('Pass').value;
    var cc = document.getElementById('CPass').value;
    if (c != cc) {
        return alert('Nel prro');
    }else{
        return alert('Si prro')
    };
}