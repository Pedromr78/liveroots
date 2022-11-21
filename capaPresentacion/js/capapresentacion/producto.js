document.getElementById("cantidad").addEventListener("change",cantidad);



function cantidad(){

    let cantidad=document.getElementById("cantidad").value
    if(cantidad<1||cantidad>10){
        document.getElementById("errorcantidad").innerHTML="<p style='color:red'>la cantidad maxima es 10</p>"
        document.getElementById("añadircesta").style.display = "none";
   
    }else{
        document.getElementById("errorcantidad").innerHTML=""
        document.getElementById("añadircesta").style.display ="";
    } 
    
    
    
    
    }