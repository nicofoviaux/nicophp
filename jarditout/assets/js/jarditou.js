var confirme=document.getElementById("suppr");
confirme.addEventListener("click",confirmation);
console.log(confirm);
function confirmation(){
    let ok=confirm("tu es sûr de suprimé ce produit?");
    let valid=document.getElementById("oui");

    if(ok==true){
        
    }else{
        event.preventDefault();
    }
}