document.addEventListener("DOMContentLoaded", function () {
  // Fonction pour sélectionner une couleur au chargement de la page
  function selectColorOnLoad() {
    var selectedColor = "<?php echo $selectedColor; ?>";

    // Sélectionner le bouton correspondant à la couleur récupérée
    var buttons = document.querySelectorAll(".color-button");
    buttons.forEach(function (btn) {
      var buttonColor = btn.style.backgroundColor;
      if (buttonColor === selectedColor) {
        btn.classList.add("selected-color");
      }
    });

    // Mettre à jour la valeur de la couleur dans le champ de texte
    document.getElementById("couleur").value = selectedColor;
  }

  // Appeler la fonction au chargement de la page
  selectColorOnLoad();
});

// Fonction pour sélectionner une couleur
function selectColor(button, color) {
  // Réinitialiser la classe pour tous les boutons
  var buttons = document.querySelectorAll(".color-button");
  buttons.forEach(function (btn) {
    btn.classList.remove("selected-color");
  });

  // Appliquer la classe au bouton sélectionné
  button.classList.add("selected-color");

  // Mettre à jour la valeur de la couleur dans le champ de texte
  document.getElementById("couleur").value = color;
}
