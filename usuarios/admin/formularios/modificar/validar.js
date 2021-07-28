const email = document.getElementById("email");
const usuario = document.getElementById("usuario");
const titulada = document.getElementById("titulada");
const fijo = document.getElementById("fijo");
const span = document.getElementById("span");
const enviar = document.getElementById("btn_enviar");

enviar.disabled = true;
titulada.style.display="none"


//^ MOSTRAR CAMPO O EL SELECT DEL FORMULARIO CREAR  USUARIO 

usuario.addEventListener("blur", () => {
  let dato = usuario.value
  console.log(dato)
  if (dato == 4) {
    titulada.style.display="block"
  }else{
    titulada.style.display="none"
  }
})

fijo.addEventListener("keyup", () => {
  const cantidad =fijo.value
  const numero = cantidad.length
  if (numero >= 7 && numero <= 8){
    span.textContent= "cantidad valida"
    enviar.disabled = false
    enviar.classList.remove("enviar")
  }else if (numero > 8 ){
    const longitud = cantidad.slice(0,8)
    fijo.value = longitud
    
  }else {
    span.textContent= "cantidad inferior de 7 o 8 digitos"
    enviar.disabled = true
    enviar.classList.add("enviar")
  }
  
})