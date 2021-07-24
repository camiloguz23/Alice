// js file
const formulario = document.getElementById("formulario")
const enviar = document.getElementById("envia")
const span = document.getElementById("san")


validar()
enviar.disabled = true
enviar.style.backgroundColor = "hsla(0,100%,50%,0.5)"

enviar.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formulario)

    fetch("../../../../php/crearmateria.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        alert(info)
    })
})

function validar() {
    const campo = document.getElementById("campo")

    campo.addEventListener("keyup", () => {
        let dat = campo.value


        for (i=0;i<dat.length;i++) {
            let dato = dat[i]
            if (dato == 1 || dato == 2 || dato == 3 || dato == 4 || dato == 5 || dato == 6 || dato == 7 || dato == 8 || dato == 9 || dato == 0 && dato != " "){

                alert("No es permitido digitos")
                window.location = "crearmateria.php"

            }
        }



        if (dat.length >= 4){
            enviar.disabled = false
            span.style.display = "none"
            enviar.style.backgroundColor = "rgb(89, 181, 72)"
        }else {
            let falto = 4 - dat.length
            span.innerText = `Te faltan ${falto} letras para que sea valido`
            enviar.disabled = true
            span.style.display = "block"
            enviar.style.backgroundColor = "hsla(0,100%,50%,0.5)"
        }
    })
    
}