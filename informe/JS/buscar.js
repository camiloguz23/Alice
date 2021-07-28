const documento = document.getElementById("termino")
const contenedor = document.getElementById("contenido")
const ambiente = document.getElementById("ambiente")
const ficha = document.getElementById("ficha")

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

ambiente.addEventListener("keyup", (e) => {

	const dato = ambiente.value 

	fetch("../php/informadocu.php",{
		method:"POST",
		body:JSON.stringify({
			"docu":dato,
			"accion":"nombre"
		})
	}).then(res => res.text()).then(info => {
		contenedor.innerHTML = `${info}`
	})
})

ficha.addEventListener("keyup", (e) => {

	const dato = ficha.value 

	fetch("../php/informadocu.php",{
		method:"POST",
		body:JSON.stringify({
			"docu":dato,
			"accion":"ficha"
		})
	}).then(res => res.text()).then(info => {
		contenedor.innerHTML = `${info}`
	})
})



























