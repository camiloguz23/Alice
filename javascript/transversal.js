const boton = document.getElementById("btn_trans")
const formu = document.getElementById("transversal")

boton.disabled= true
boton.style.backgroundColor = "hsla(0,100%,50%,0.5)"

validar()

function validar(params) {
    const docu = document.getElementById("docu")
    const ficha = document.getElementById("ficha")
    const materia = document.getElementById("materia")
    const dias = document.getElementById("dias")


    let confi = 0
    
    docu.addEventListener("blur", () => {

        let dato = docu.value
        
        if (dato != "") {
            
            confi = confi + 1
            active(confi)

        }else{
            alert("Seleccione un instructor")
            boton.disabled= true
            boton.style.backgroundColor = "hsla(0,100%,50%,0.5)"
            confi = confi - 1 
            active(confi)
        }
    })

    ficha.addEventListener("blur", () => {

        let dato2 = ficha.value

        if (dato2 != "") {
            
            confi = confi + 1
            active(confi)

        }else {
            alert("Seleccione un ficha de formacion")
            boton.disabled= true
            boton.style.backgroundColor = "hsla(0,100%,50%,0.5)"
            confi = confi - 1 
            active(confi)
        }
    })

    materia.addEventListener("blur", () => {

        let dato3 = materia.value

        if (dato3 != "") {

            confi = confi + 1
            active(confi)

        }else {
            alert("Seleccione una materia")
            boton.disabled= true
            boton.style.backgroundColor = "hsla(0,100%,50%,0.5)"
            confi = confi - 1 
            active(confi)
        }
    })

    dias.addEventListener("blur", () => {

        let dato4 = dias.value

        if (dato4 != "") {

            confi = confi +1
            active(confi)
            
        }else{
            alert("Seleccione una hora o fecha")
            boton.disabled= true
            boton.style.backgroundColor = "hsla(0,100%,50%,0.5)"
            confi = confi - 1 
            active(confi)
        }
    })
    
    fechaf.addEventListener("blur", () => {
        const horai = document.getElementById("horai") 
        const horaf = document.getElementById("horaf")
        const fechai = document.getElementById("fechai")
        const fechaf = document.getElementById("fechaf")

        let ejem = String(horai.value)
        let ejem2 = String(horaf.value)
        let ejem3 = String(fechai.value)
        let ejem4 = String(fechaf.value)

        if ( ejem != "" & ejem2 != "" & ejem3 != "" & ejem4 != "") {
            
            confi = confi + 1
            active(confi)
        }
    })
    
}

function active(numero) {

   
    let num = numero
   
    if (num == 5) {
        boton.disabled= false
        boton.style.backgroundColor = "rgb(89, 181, 72)"
    }

    
    
}

