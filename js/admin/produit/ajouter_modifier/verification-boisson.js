// Validation du formulaire
document
  .getElementById("ValidationDuFormulaireBoisson")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    var nomBoisson = document.getElementById("nom_boisson");
    var description = document.getElementById("description");
    var PU = document.getElementById("prix_unitaire");

    // if(nomMenu == "") ou !nomMenu.value
    if (!PU.value) {
      erreur = "Veuillez renseigner un prix";
    }
    if (!description.value) {
      erreur = "Veuillez renseigner une description";
    }
    if (!nomBoisson.value) {
        erreur = "Veuillez renseigner un nom de boisson";
      }
    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
