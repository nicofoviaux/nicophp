
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