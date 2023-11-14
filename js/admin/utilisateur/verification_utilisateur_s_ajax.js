// Validation du formulaire
document
  .getElementById("ValidationDuFormulaireUtilisateur")
  .addEventListener("submit", function (e) {
    // e.preventDefault();

    var erreur;
    var login = document.getElementById("login");
    var role = document.getElementById("role");
    var mdp = document.getElementById("mdp");

    // if(nomMenu == "") ou !nomMenu.value
    if (!mdp.value) {
      erreur = "Veuillez renseigner un mot de passe";
    }
    if (!role.value) {
      erreur = "Veuillez renseigner un rôle";
    }
    if (!login.value) {
      erreur = "Veuillez renseigner un login";
    }
    if (erreur) {
      e.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    }
  });
