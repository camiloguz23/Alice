const email = document.getElementById("email");
const usuario = document.getElementById("usuario")
const titulada = document.getElementById("titulada")
const fijo = document.getElementById("fijo")


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
  if (numero >= 7){
    console.log("aceptado")
  }
  
  console.log(numero)
})