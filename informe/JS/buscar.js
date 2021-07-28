const documento = document.getElementById("termino")
const contenedor = document.getElementById("contenido")

documento.addEventListener("keyup", (e) => {

	const dato = documento.value 

	fetch("../php/informadocu.php",{
		method:"POST",
		body:JSON.stringify({
			"docu":dato,
			"accion":"documento"
		})
	}).then(res => res.text()).then(info => {
		contenedor.innerHTML = `${info}`
	})
})





























