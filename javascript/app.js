// js file
const formulario = document.getElementById("formulario")
const enviar = document.getElementById("enviar")


validar()
enviar.disabled = true
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

function validar() {
    const campo = document.getElementById("campo")

    campo.addEventListener("keyup", () => {
        let dato = campo.value

        if (dato.length >= 4){
            enviar.disabled = false
        }else {
            enviar.disabled = true
        }
    })
    
}