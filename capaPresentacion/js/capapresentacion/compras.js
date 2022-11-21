//document.getElementById("numerotarjeta").addEventListener("change",numerotarjeta);
//document.getElementById("cvv").addEventListener("change",cvv);


function numerotarjeta(){

    let numerotarjeta=document.getElementById("numerotarjeta").value
    let regextarjeta=/^[0-9]{15,16}|(([0-9]{4}\s){3}[0-9]{3,4})$/;
    if (regextarjeta.test(numerotarjeta)) {
        document.getElementById("aceptar").style.display = "";
        document.getElementById("errortarjeta").innerHTML="";
        } else {
          document.getElementById("errortarjeta").innerHTML="<p style=\'color:red'>Numero mal introducido</p>"
          document.getElementById("aceptar").style.display = "none";
        }
    }
    function cvv(){
        let rgexcvv=/^[0-9]{3}$/;
        let cvv= document.getElementById("cvv").value
        if (rgexcvv.test(cvv)) {
            document.getElementById("aceptar").style.display = "";
            document.getElementById("errorcvv").innerHTML="";
            } else {
              document.getElementById("errorcvv").innerHTML="<p style=\'color:red'>Numero mal introducido</p>"
              document.getElementById("aceptar").style.display = "none";
            }
    }