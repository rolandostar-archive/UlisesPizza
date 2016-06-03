function actualizarTabla(){
	var id = document.getElementById("sucursal").value;
	var req = new XMLHttpRequest();
	console.log(id);
	req.open("POST", "tablaGerente.php", true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.onreadystatechange = function() {
	  if (req.readyState == 4 && req.status == 200) {
	    document.getElementById("info-sucursal").innerHTML = req.responseText;
	  }
	};
	req.send("id="+id);
}