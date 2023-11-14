// Validation du formulaire nbCouvert
document
  .getElementById("FormulaireNbCouvert")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    let nbC = document.getElementById("nb_couvert");

    // if(nomMenu == "") ou !nomMenu.value
    if (nbC.value == "") {
      erreur = "Un nombre est nécessaire";
    } else if (nbC.value <= 0) {
      erreur = "Le nombre n'est pas valide";
    }

    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
