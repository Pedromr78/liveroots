window.onload = (event) => {
    let myAlert = document.querySelector('.toast');
    let bsAlert = new bootstrap.Toast(myAlert);
    bsAlert.show();
    $(function() {
        $('[data-toggle="popover"]').popover()
        })
        
}
document.getElementById("quitar").addEventListener("click",quitar);


function quitar(){
document.getElementById("display").style.display = "none";
}


