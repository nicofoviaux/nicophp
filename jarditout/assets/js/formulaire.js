var but = document.getElementById("ok");// prend la letiable du bouton
but.addEventListener("click", verif);//declanche un evenement si le bouton est cliqué et declanche la fonction verif
function verif(event) {
    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let ddn = document.getElementById("date");
    let CP = document.getElementById("cpostal");
    let ad = document.getElementById("adresse");
    let city = document.getElementById("ville");
    let mail = document.getElementById("email");
    let sujet = document.getElementById("sujets");
    let question = document.getElementById("question");
    let filtre = /^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\-| )?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/;// creation du filtre "au moins 1 lettre ou un chiffre et caractere speciaux"
    let filtre1 = /^((?:[013-9]\d)|(?:2[0-9ABab]))\d{3}$/// filtre du code postale il doit contenir 5 nombres sauf la corse qui contien des lettres
    let filtre2 = /^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i;// filtre email il divise le mail en 4 blocs le 1er accepte lettre, chiffre et caractere le 2nd @ obligatoire 3em pour la sone de texte et le 4em demande un .et des caractéres 
    let filtre4 = /^(\d+)(\D*)(\s)(\D+)(\s)(.+)$/g;// filtre adresse il divise en 6 bloc don le 1er chiffre obligatoire le second pour bis (facultatif) un espace obligatoire la voie /rue ou autre un autre espace obligatoire et le reste de l adresse
    let filtre5 = /^[\w+\s\d.,:?!@"&()àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ\+\*\/\-\=]*$/
    let missNom = document.getElementById("missnom");
    let missPre = document.getElementById("misspre");
    let missCP = document.getElementById("missCP");
    let missAd = document.getElementById("missAD");
    let missCity = document.getElementById("missCity");
    let missEmail = document.getElementById("missEmail");
    let missDdn = document.getElementById("missddn");
    let missSujet = document.getElementById("misssujet");
    let missQuestion = document.getElementById("missquestion")
    let date = new Date();
    let filtreAnn = date.getFullYear();
    let dateControl = document.querySelector('input[type="date"]');
    let filtreAnn2 = dateControl.value.split("-", 1);


    if (nom.validity.valueMissing) {
        event.preventDefault();
        missNom.textContent = "champs vide"
        missNom.style.color = "yellow"
    }
    else if (!filtre.test(nom.value)) {// on applique le filtre sur la value de la letiable ent 
        event.preventDefault();// si erreur le formulaire et bloqué avec event.preventdefault
        missNom.textContent = "veuillez saisir des lettres";// text content change le texte entre >< dune balise html
        missNom.style.color = "red"; //si on le desire on peut changer la couleur du text comme l'exemple pour le vert (mis en commentaire car j'utilise une feuille css)
    }
    else {
        missNom.textContent = "OK";// si la condition est rempli je remet a l'origine
        missNom.style.color = "green";
    }
    if (prenom.validity.valueMissing) {
        event.preventDefault();
        missPre.textContent = "champ vide";
        missPre.style.color = "yellow";
    }
    else if (!filtre.test(prenom.value)) {
        event.preventDefault();
        missPre.textContent = "veuillez saisir des lettres";
        missPre.style.color = "red";
    }
    else {
        missPre.textContent = "OK";
        missPre.style.color = "green";
    }
    if (city.validity.valueMissing) {
        event.preventDefault();
        missCity.textContent = "champs vide";
        missCity.style.color = "yellow";
    }
    else if (!filtre.test(city.value)) {
        event.preventDefault();
        missCity.textContent = "veuillez saisir la ville";
        missCity.style.color = "red";
    }
    else {
        missCity.textContent = "OK";
        missCity.style.color = "green";
    }
    if (ad.validity.valueMissing) {
        event.preventDefault();
        missAd.textContent = "champ vide";
        missAd.style.color = "yellow"
    }
    else if (!filtre4.test(ad.value)) {
        event.preventDefault();
        missAd.textContent = "l'adresse n'est pas valide elle doit comporté:au moins 1 chiffre et ou bis , rue,un espace,et le nom de la rue";
        missAd.style.color = "red";
    }
    else {
        missAd.textContent = "OK";
        missAd.style.color = "green";
    }
    if (CP.validity.valueMissing) {
        event.preventDefault();
        missCP.textContent = "champ vide";
        missCP.style.color = "yellow"
    }
    else if (!filtre1.test(CP.value)) {
        event.preventDefault();
        missCP.textContent = "code postale invalide verifié qu'il est bien composé de 5 chiffres";
        missCP.style.color = "red";
    }
    else {
        missCP.textContent = "OK";
        missCP.style.color = "green";
    }
    if (mail.validity.valueMissing) {
        event.preventDefault();
        missEmail.textContent = "champ vide";
        missEmail.style.color = "yellow";
    }
    else if (!filtre2.test(mail.value)) {
        event.preventDefault();
        missEmail.textContent = "verifiez que votre adresse mail contien bien le @+la boite et le .com ou.fr";
        missEmail.style.color = "red";
    }
    else {
        missEmail.textContent = "OK";
        missEmail.style.color = "green";
    }
    if (dateControl.validity.valueMissing) {
        event.preventDefault();
        missDdn.textContent = "champ vide";
        missDdn.style.color = "yellow";
    }
    else if (filtreAnn - filtreAnn2 < 18) {
        event.preventDefault();
        missDdn.textContent = "vous devez être majeur pour remplir ce formulaire";
        missDdn.style.color = "red";
    }
    else {
        missDdn.textContent = "OK";
        missDdn.style.color = "green";
    }
    console.log(dateControl.value);
    console.log(filtreAnn2);
    console.log(filtreAnn);
    if (sujet.value == 0) {
        event.preventDefault();
        missSujet.textContent = "veuillez selectionné un sujet";
        missSujet.style.color = "yellow";
    } else {
        missSujet.textContent = "OK";
        missSujet.style.color = "green";
    }
    if (question.validity.valueMissing) {
        event.preventDefault();
        missQuestion.textContent = "champ vide";
        missQuestion.style.color = "yellow";
    }
    else if (!filtre5.test(question.value)) {
        event.preventDefault();
        missQuestion.textContent = "vous utilisé des caractere inaproprié caractere autorisé: &éç@)=/*-+!:,";
        missQuestion.style.color = "red";
    }
    else {
        missQuestion.textContent = "OK";
        missQuestion.style.color = "green";
    }
}
var valid = document.getElementById("check");
valid.addEventListener("click", accept);
function accept() {
    let conf = confirm("vous confirmez que les champs remplis sont vrai ?");
    if (conf != true) {
        valid.checked = false
    }
    else {
        conf.checked = true
    }
}

