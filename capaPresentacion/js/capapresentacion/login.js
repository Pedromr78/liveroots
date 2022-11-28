
document.getElementById("contraseña").addEventListener("change", contraseña);
document.getElementById("email").addEventListener("change", email);
//document.getElementById("telefono").addEventListener("change",telefono);
//document.getElementById("fechanacimiento").addEventListener("change",fechanacimiento);
document.getElementById("login").addEventListener("click",login);
document.getElementById("registro").addEventListener("click",registro);



function login(){
  document.getElementById("log").style.display = "";
  document.getElementById("reg").style.display = "none";
}

function registro(){
  document.getElementById("log").style.display = "none";
  document.getElementById("reg").style.display = "";
}



function contraseña(){
   
    var regexcontra= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;
    let contraseña= document.getElementById("contraseña").value;
  
    if (regexcontra.test(contraseña)) {
      document.getElementById("registrarse").style.display = "";
      document.getElementById("errorcontra").innerHTML="";
      } else {
        document.getElementById("errorcontra").innerHTML="<p style=\'color:red'>Cantraseña no valida</p>"
        document.getElementById("registrarse").style.display = "none";
      }
}

function email(){
   
  var regexcontra= /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  let email= document.getElementById("email").value;

  if (regexcontra.test(email)) {
    document.getElementById("registrarse").style.display = "";
    document.getElementById("erroremail").innerHTML="";
    } else {
      document.getElementById("erroremail").innerHTML="<p style=\'color:red'>correo no valido</p>"
      document.getElementById("registrarse").style.display = "none";
    }
}
function telefono(){
let telefono= document.getElementById("telefono").value
var regextelefono=/(\+34|0034|34)?[ -]*(8|9)[ -]*([0-9][ -]*){8}/;
if (regextelefono.test(telefono)) {
  document.getElementById("registrarse").style.display = "";
  document.getElementById("errortelefono").innerHTML="";
  } else {
    document.getElementById("errortelefono").innerHTML="<p style=\'color:red'>Numero de telefono incorrecto</p>"
    document.getElementById("registrarse").style.display = "none";
  }
}
function fechanacimiento(){
  let fechanacimine= document.getElementById("fechanacimiento").value
let regexfechanacimiento=/^(?:(?:(?:0?[1-9]|1\d|2[0-8])[/](?:0?[1-9]|1[0-2])|(?:29|30)[/](?:0?[13-9]|1[0-2])|31[/](?:0?[13578]|1[02]))[/](?:0{2,3}[1-9]|0{1,2}[1-9]\d|0?[1-9]\d{2}|[1-9]\d{3})|29[/]0?2[/](?:\d{1,2}(?:0[48]|[2468][048]|[13579][26])|(?:0?[48]|[13579][26]|[2468][048])00))$/;
if (regexfechanacimiento.test(fechanacimine)) {
  document.getElementById("registrarse").style.display = "";
  document.getElementById("errorfechanacimiento").innerHTML="";
  } else {
    document.getElementById("errorfechanacimiento").innerHTML="<p style=\'color:red'>Fecha no valida</p>"
    document.getElementById("registrarse").style.display = "none";
  }

}


