const form = document.querySelector("form"),
  continueBtn = form.querySelector(".button "),
  errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault(); //Desactive le comportement par defaut
};

continueBtn.onclick = () => {
  // Ajax ci-dessous
  let xhr = new XMLHttpRequest(); // creation de l'objet XML
  //xhr.open prend deux paramétre la methode, url , async
  xhr.open("POST", "/SGRC/php/Ajoute_user/add_user.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // xhr.reponse donne la reponse de l'url passer en paramétre
        let data = xhr.response;
        if (data === "success") {
          location.href = "/SGRC/index.php?page=users";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  // Nous devrons envoyer les données du formulaire via ajax en php
  let formData = new FormData(form); // creation de l'objet formData
  xhr.send(formData); // envoi des donnée du formuliare en php
};
