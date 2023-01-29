let nomCInput = document.getElementById("nomC");
let cartInput = document.getElementById("cart");

var letters = /^[A-Za-z]+$/;
document.forms["form"].addEventListener("submit", function (e) {
    var inputs = document.forms["form"];
    let ids = [
        "erreur",
        "nomEr",
        "cartEr",
       
    ];

    ids.map((id) => (document.getElementById(id).innerHTML = "")); // reinitialiser l'affichage des erreurs

    let errors = false;

    //Traitement cas par cas
    if (nomCInput.value.length < 5) {
        errors = false;
        document.getElementById("nomEr").innerHTML =
            "Le nom  de commande doit compter au minimum 5 caractères.";
    } else if (!nomCInput.value.match(letters)) {
        errors = false;
        document.getElementById("nomEr").innerHTML =
            "Veuillez entrer un nom valid ! (seulement des lettres)";
    } else {
        errors = true;
    }
   

    if (isNaN(cartInput.value)) {
        errors = false;
        document.getElementById("cartEr").innerHTML =
            "cart ne doit pas contenir des lettres";
    } else {
        errors = true;
    }

   

    //Traitement générique
    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            errors = false;
            document.getElementById("erreur").innerHTML =
                "Veuillez renseigner tous les champs";
        }
    }

    if (errors === false) {
        e.preventDefault();
    } 
});
