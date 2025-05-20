<?php

include '../../assets/app/utils/utils.php';

session_start();

if (isset($_POST['submit-client'])) {

  //variables not vides ou nulls
  if (isset($_POST['email-client']) && !empty($_POST['email-client']) && isset($_POST['password-client']) && !empty($_POST['password-client'])) {
    //validation adresse mail


    if (filter_var($_POST['email-client'], FILTER_VALIDATE_EMAIL)) {
      $email = sanitize($_POST['email-client']);
      $password = sanitize($_POST['password-client']);

      var_dump($_POST);
      //verification du mail
      $data = $this->getModelUser()->setEmail($email)->getByEmail();

      if (!empty($data)) {
        if (password_verify($password, $data[0]['password'])) {
          $_SESSION['id'] = $data[0]['id'];
          $_SESSION['prenom'] = $data[0]['prenom'];
          $_SESSION['nom'] = $data[0]['nom'];
          $_SESSION['sexe'] = $data[0]['sexe'];
          $_SESSION['date_naissance'] = $data[0]['date_naissance'];
          $_SESSION['adresse'] = $data[0]['adresse'];
          $_SESSION['complement'] = $data[0]['complement'];
          $_SESSION['code_postal'] = $data[0]['code_postal'];
          $_SESSION['ville'] = $data[0]['ville'];
          $_SESSION['telephone'] = $data[0]['telephone'];
          $_SESSION['email'] = $data[0]['email'];

          header('Location:controllerLoginClient.php');
          exit();
        } else {
          $connectionMsg = "Email et/ou mdp incorrect(s).";
        }
      } else {
        $connectionMsg = "Email et/ou mdp incorrect(s).";
      }
    } else {
      $connectionMsg = "Le mail n'est pas au bon format.";
    }
  } else {
    $connectionMsg = 'Veuillez remplir les champs obligatoires.';
  }
  $_SESSION['error'] = $connectionMsg;
}
  


// AQUI VAI A PÁGINA A TRATAR O FORMULARIO NO ACTION
// UNE FOIS MIS LE LIEN, JE TRAITE LE FORM NORMALEMENT ET UNE FOIS CONNECTE JE REDIRECT