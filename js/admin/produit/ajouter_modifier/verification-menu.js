// Validation du formulaire
document
  .getElementById("ValidationDuFormulaireMenu")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    var nomMenu = document.getElementById("nom_menu");
    var description = document.getElementById("description");
    var PU = document.getElementById("prix_unitaire");

    // if(nomMenu == "") ou !nomMenu.value
    if (!PU.value) {
      erreur = "Veuillez renseigner un prix";
    }
    if (!description.value) {
      erreur = "Veuillez renseigner une description";
    }
    if (!nomMenu.value) {
      erreur = "Veuillez renseigner un nom de menu";
    }
    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
