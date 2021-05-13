// js file
const formulario = document.getElementById("formulario")
const enviar = document.getElementById("enviar")

enviar.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formulario)

    fetch("../../../../php/crear_Forms.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        alert(info)
    })
})