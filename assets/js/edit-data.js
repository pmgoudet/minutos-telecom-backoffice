const editBtn = document.querySelector('#edit-admin');
const anullerBtn = document.querySelector('#reset-edit-admin');
const form = document.querySelector('.connect-form');
const deleteBtn = document.querySelector('#delete-admin');


editBtn.addEventListener('click', (e) => {
  e.preventDefault();

  const inputs = document.querySelectorAll('.form-input');

  inputs.forEach((input) => {
    input.removeAttribute('disabled');
  });

  inputs[0].focus();
})

anullerBtn.addEventListener('click', (e) => {
  e.preventDefault();

  const inputs = document.querySelectorAll('.form-input');
  const form = document.querySelector('.connect-form');

  inputs.forEach((input) => {
    input.setAttribute('disabled', '');
  });

  form.reset();
})

function confirmDelete() {
  return confirm("Êtes-vous sûr de vouloir supprimer cet admin ?");
}

function confirmRecover() {
  return confirm("Êtes-vous sûr de vouloir réactiver cet admin ?");
}

