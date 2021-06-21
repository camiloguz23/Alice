const boton = document.getElementById("btn_trans")
const formu = document.getElementById("transversal")

let a = 0
let b = 0
let c = 0
let d = 0
let m = 0

boton.disabled= true
boton.style.backgroundColor = "rgb(255, 0, 0, 0.8)"
boton.style.color = "rgb(255, 255, 255)"
boton.style.fontFamily = "verdana"
boton.style.fontSize = "15px"
boton.style.border = "none"

validar()

function validar() {
    const docu = document.getElementById("docu")
    const ficha = document.getElementById("ficha")
    const materia = document.getElementById("materia")
    const dias = document.getElementById("dias")


    let confi = 0
    
    
    docu.addEventListener("blur", () => {

        let dato = docu.value
        
        if (dato != "") {

            if (confi < 0 || confi > 4) {
                confi = 0
            }
            
            if (a == 0) {
                confi = confi + 1
                a = 1
                active(confi)
            }
            

        }else{
            alert("Seleccione un instructor")
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.9)"
            confi = confi - 1 
            active(confi)
        }
    })

    ficha.addEventListener("blur", () => {

        let dato2 = ficha.value

        if (dato2 != "") {
            
            if (confi < 0 || confi > 4) {
                confi = 0
            }
            
            if (b == 0) {
                confi = confi + 1
                b = 1
                active(confi)
            }

        }else {
            alert("Seleccione un ficha de formacion")
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.8)"
            confi = confi - 1 
            active(confi)
        }
    })

    materia.addEventListener("blur", () => {

        let dato3 = materia.value

        if (dato3 != "") {

            if (confi < 0 || confi > 4) {
                confi = 0
            }

            if (c == 0) {
                confi = confi + 1
                c = 1
                active(confi)
            }

        }else {
            alert("Seleccione una materia")
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.8)"
            confi = confi - 1 
            active(confi)
        }
    })

    dias.addEventListener("blur", () => {

        let dato4 = dias.value

        if (dato4 != "") {

            if (confi < 0 || confi > 4) {
                confi = 0
            }

            if (d == 0) {
                confi = confi + 1
                d = 1
                active(confi)
            }
            
        }else{
            alert("Seleccione una hora o fecha")
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.8)"
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
            
            if (m == 0) {
                confi = confi + 1
                m = 1
                active(confi)
            }
        }
    })
    
}

function active(numero) {

   console.log(numero)
    if (numero == 5) {
        boton.disabled= false
        boton.style.backgroundColor = "rgb(89, 181, 72)"
    }

    
    
}

boton.addEventListener("click", (e) =>{
    e.preventDefault()

    const formulario = new FormData (formu)

    fetch("../../../../php/trans.php", {
        method:"POST",
        body:formulario
    }).then(res => res.text()).then(info => {

        if(info == 1) {
            alert("La transversal ya esta asignada a la formacion")
            formu.reset() 
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.8)"
            a = 0
            b = 0
            c = 0
            d = 0
            m = 0


        }else if(info == 2) {

            alert("No se asigno correctamente la transversal a la formacion")
            formu.reset()
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.8)"
            a = 0
            b = 0
            c = 0
            d = 0
            m = 0
            
        } else {
            alert(info)
            formu.reset()
            boton.disabled= true
            boton.style.backgroundColor = "rgb(255,0,0,0.8)"
            a = 0
            b = 0
            c = 0
            d = 0
            m = 0
        }
    })
})

