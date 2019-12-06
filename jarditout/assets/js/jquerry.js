jQuery(document).ready(function(){
 $("#nom2").blur(function (){
     var filtrenom= /^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\-| )?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/;
     var nom=$("#nom2").val();
     if(!filtrenom.test(nom)){
         $("#idnom").html("<span>nom incorrect vous utilisez surement des caractéres non autorisé</span>");
         $("#inom").attr('class', 'fas fa-times fa-2x');
         $("#inom").css("color","red");
         return false;
        }else{
            $("#idnom").html("");
            $("#inom").attr('class', 'fas fa-check fa-2x');
            $("#inom").css("color","green");
        }
    });
    
    $("#prenom2").blur(function(){
    var prenom=$("#prenom2").val();
    var filtrenom= /^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\-| )?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/;
    if(!filtrenom.test(prenom)){
        $("#idprenom").html("<span>prenom incorrect vous utilisez surement des caractéres non autorisé</span>");
        $("#iprenom").attr('class', 'fas fa-times fa-2x');
        $("#iprenom").css("color","red");
        return false;
    }else{
        $("#idprenom").html("");
        $("#iprenom").attr('class', 'fas fa-check fa-2x');
        $("#iprenom").css("color","green");
    }
 });
 $("#identifiant").blur(function(){
    var identifiant=$("#identifiant").val();
    var filtreId =/[[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+[0-9]*/;
    if(!filtreId.test(identifiant)){
        $("#ididen").html("<span>le format de l'identifiant est incorrecte</span>");
        $("#iiden").attr('class', 'fas fa-times fa-2x');
        $("#iiden").css("color","red");
        return false;
    }else{
        $("#ididen").html("");
        $("#iiden").attr('class', 'fas fa-check fa-2x');
        $("#iiden").css("color","green");
    }
 });
 $("#email2").blur(function(){
    var mail=$("#email2").val();
    var filtreEmail=/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i;
    if(!filtreEmail.test(mail)){
        $("#idmail").html("<span>le format de l'identifiant est incorrecte</span>");
        $("#imail").attr('class', 'fas fa-times fa-2x');
        $("#imail").css("color","red");
        return false;
        return false;
    }else{
        $("#idmail").html("");
        $("#imail").attr('class', 'fas fa-check fa-2x');
        $("#imail").css("color","green");
    }
 });
  $("#MDP").blur(function(){
    var MotDePasse =$("#MDP").val();
    var filtreMdp=/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}/;
    if(!filtreMdp.test(MotDePasse)){
        $("#idMDP").html("<span>le mot de passe doit comporté au moins 1 caractére speciale,1 majuscule et 1 chiffre</span>");
        $("#iMDP").attr('class', 'fas fa-times fa-2x');
        $("#iMDP").css("color","red");
        return false;
        return false;
    }else{
        $("#idMDP").html("");
        $("#iMDP").attr('class', 'fas fa-check fa-2x');
        $("#iMDP").css("color","green");
    }
 });
 $("#MDPconf").blur(function(){
    var MotDePasse =$("#MDP").val();
    var confirmation=$("#MDPconf").val();
    if((MotDePasse!=confirmation)||(confirmation==="")){
        $("#idconf").html("<span>le mot de passe entré et different du premier</span>");
        $("#iconf").attr('class', 'fas fa-times fa-2x');
        $("#iconf").css("color","red");
        return false;
        return false;
    }else{
        $("#idconf").html("");
        $("#iconf").attr('class', 'fas fa-check fa-2x');
        $("#iconf").css("color","green");
    }
 });


});