// Validation du formulaire
document
  .getElementById("ValidationDuFormulaireProduitPA")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    var nomProduit = document.getElementById("nom_produit");

    // if(nomMenu == "") ou !nomMenu.value
    if (!nomProduit.value) {
      erreur = "Veuillez renseigner un nom";
    }

    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
