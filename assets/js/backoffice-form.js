const form = document.querySelector(".connect-form");
const paragraphError = document.querySelectorAll('.form__text-erreur');

form.addEventListener("submit", function (event) {
  if (!validerDateNaissance()) {
    paragraphError[0].textContent = "DD/MM/AAAA";
    event.preventDefault();
  } else {
    paragraphError[0].textContent = "";
  }

  if (!validerCodePostal()) {
    paragraphError[1].textContent = "5 chiffres";
    event.preventDefault();
  } else {
    paragraphError[1].textContent = "";
  }

  if (!validerTelephone()) {
    paragraphError[2].textContent = "Format français: 0X XX XX XX XX";
    event.preventDefault();
  } else {
    paragraphError[2].textContent = "";
  }

  if (!validerEmail()) {
    paragraphError[3].textContent = "Veuillez entrer un e-mail valide.";
    event.preventDefault();
  } else {
    paragraphError[3].textContent = "";
  }
});

function validerDateNaissance() {
  const inputDate = document.getElementById("date_naissance").value;
  const date = new Date(inputDate);
  const aujourdhui = new Date();
  const ageMinimum = 18;

  if (isNaN(date)) return false; // vérifie si la date est valide

  const anneeNaissance = date.getFullYear();
  if (anneeNaissance.toString().length !== 4) return false; // année de 4 chiffres

  const differenceAge = aujourdhui.getFullYear() - anneeNaissance;
  const anniversairePasse =
    aujourdhui.getMonth() > date.getMonth() ||
    (aujourdhui.getMonth() === date.getMonth() && aujourdhui.getDate() >= date.getDate());

  return date < aujourdhui && (differenceAge > ageMinimum || (differenceAge === ageMinimum && anniversairePasse));
}

function validerCodePostal() {
  const codePostal = document.getElementById("code_postal").value;
  return /^[0-9]{5}$/.test(codePostal); // 5 chiffres obligatoires
}

function validerTelephone() {
  const telefone = document.getElementById("telephone").value;
  return /^0[1-9]([ .-]?[0-9]{2}){4}$/.test(telefone); // Format: 0X XX XX XX XX
}

function validerEmail() {
  const email = document.getElementById("email").value;
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Autocompletar Ville baseado no Code Postal
document.getElementById("code_postal").addEventListener("input", function () {
  const codePostal = this.value;
  if (/^[0-9]{5}$/.test(codePostal)) {
    chercherVilleParCP(codePostal);
  }
});

function chercherVilleParCP(codePostal) {
  fetch(`https://geo.api.gouv.fr/communes?codePostal=${codePostal}&fields=nom&format=json`)
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
        document.getElementById("ville").value = data[0].nom; // rempli la ville automatiquement
      } else {
        document.getElementById("ville").value = "";
      }
    })
    .catch(error => console.error("Erreur lors de la récupération de la ville:", error));
}

const btnMdp = document.querySelector('#btn-mdp-gen');
btnMdp.addEventListener('click', () => {
  genererMDP(12)
}
);

function genererMDP(qtt) {
  const champMDP = document.querySelector('#password');
  const caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+";
  let mdp = "";

  champMDP.value = '';

  for (let i = 0; i < qtt; i++) {
    const indice = Math.floor(Math.random() * caracteres.length);
    mdp += caracteres[indice];
  }

  champMDP.value = mdp;
}
