let form = document.getElementById("formProduit");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let isValid = true;

    // NOM
    if (document.getElementById("nom").value.length == 0) {
        document.getElementById("error-nom").textContent = "Veuillez entrer un nom.";
        isValid = setTo(isValid, false);
    } else if (document.getElementById("nom").value.length < 3 || document.getElementById("nom").value.length > 40) {
        document.getElementById("error-nom").textContent = "Le nom du produit doit être compris entre 3 et 40 caractères.";
        isValid = setTo(isValid, false);
    } else {
        resetText("error-nom",isValid);
    }

    // DESCRIPTION
    if (document.getElementById("description").value.length == 0) {
        document.getElementById("error-description").textContent = "Veuillez entrer une description.";
        isValid = setTo(isValid, false);
    } else if (document.getElementById("description").value.length < 5 || document.getElementById("description").value.length > 100) {
        document.getElementById("error-description").textContent = "Le description du produit doit être comprise entre 5 et 100 caractères.";
        isValid = setTo(isValid, false);
    } else {
        resetText("error-description",isValid);
    }

    // QUANTITE
    if (document.getElementById("quantite").value === '') {
        document.getElementById("error-quantite").textContent = "Veuillez entrer une quantité.";
        isValid = setTo(isValid, false);
    } else if (document.getElementById("quantite").value < 0 || document.getElementById("quantite").value > 999) {
        document.getElementById("error-quantite").textContent = "La quantité doit être comprise entre 0 et 999.";
        isValid = setTo(isValid, false);
    } else {
        resetText("error-quantite",isValid);
    }

    // PRIX
    if (document.getElementById("prix").value == 0) {
        document.getElementById("error-prix").textContent = "Veuillez entrer un prix.";
        isValid = setTo(isValid, false);
    } else if (document.getElementById("prix").value < 0.01 || document.getElementById("prix").value > 9999.99) {
        document.getElementById("error-prix").textContent = "Le prix du produit doit être compris entre 0.01 et 9999.99.";
        isValid = setTo(isValid, false);
    } else {
        resetText("error-prix",isValid);
    }

    if (isValid) {
        form.submit();
    }
});

// setTo change un booléen en une valeur donnée
function setTo(bool, val){
    bool = val;
    return bool;
}

// resetText vide le message d'erreur et appelle setTo à true
function resetText(id, bool) {
    document.getElementById(id).textContent = "";
    bool = setTo(bool, true);
}