const email = document.getElementById("email");
const usuario = document.getElementById("usuario")
const titulada = document.getElementById("titulada")
const fijo = document.getElementById("fijo")
const span = document.getElementById("span")
const enviar = document.getElementById("btn_enviar")

enviar.disabled = true


//^ MOSTRAR CAMPO O EL SELECT DEL FORMULARIO CREAR  USUARIO 

usuario.addEventListener("blur", () => {
  let dato = usuario.value 
  console.log(dato)
  if (dato == 4) {
    titulada.innerHTML = `  <label  class="">Materia</label><br>
    <select name="materia" required >
        <option value="">Seleccione</option>
        <?php
        foreach ($tit as $titula){
            ?> <option value="<?=$titula['id_materia']?>"><?=$titula['nom_materia']?></option>
        <?php
        }
        ?>
    </select> `
  }else{
    titulada.innerHTML = ``
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
    span.textContent= "cantidad cantidad superior a la indicada 8 digitos"
    enviar.disabled = true
    enviar.classList.add("enviar")
  }else {
    span.textContent= "cantidad inferior de 7 o 8 digitos"
    enviar.disabled = true
    enviar.classList.add("enviar")
  }
  
})