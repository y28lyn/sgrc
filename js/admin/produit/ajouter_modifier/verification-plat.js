// Validation du formulaire
document
  .getElementById("ValidationDuFormulairePlat")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    var nomPlat = document.getElementById("nom_plat");
    var description = document.getElementById("description");
    var type_plat = document.getElementById("type_plat");
    var pu_Carte = document.getElementById("PU_carte");

    // if(nomMenu == "") ou !nomMenu.value
    if (!pu_Carte.value) {
      erreur = "Veuillez renseigner un prix";
    }
    if (!type_plat.value) {
      erreur = "Veuillez renseigner le type de plat";
    }
    if (!description.value) {
      erreur = "Veuillez renseigner une description";
    }
    if (!nomPlat.value) {
      erreur = "Veuillez renseigner un nom de plat";
    }
    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
