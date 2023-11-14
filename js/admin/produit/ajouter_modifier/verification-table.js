// Validation du formulaire
document
  .getElementById("ValidationDuFormulaireTable")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    var numeroTable = document.getElementById("numero_table");
    var typeTable = document.getElementById("type_table");

    // if(nomMenu == "") ou !nomMenu.value
    if (!typeTable.value) {
      erreur = "Veuillez renseigner un type de table";
    }
    if (!numeroTable.value) {
      erreur = "Veuillez renseigner un numéro de table";
    }
    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
