
//----------------------------------------------------------------------------------------------------------------------------------controle de l'administration
var confirme = document.getElementById("suppr");
confirme.addEventListener("click",confirmation);
console.log(confirm);
function confirmation(){
    let ok=confirm("tu es sûr de suprimé ce produit?");

    if(ok!=true){
        event.preventDefault();
    } 
}
var span = document.getElementById("modif");
var modifimg=document.getElementById("btnmodif");
span.style.display= "none";
modifimg.addEventListener("click",modif);
function modif(){
let  span = document.getElementById("modif");
    span.style.display =" block";
}
