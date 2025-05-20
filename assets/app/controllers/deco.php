<?php

session_start();

if (isset($_SESSION['id_admin'])) {
  $redirect_url = 'controllerLoginAdmin.php';
} else {
  $redirect_url = '../../pages/area-do-cliente.html';
}

session_destroy();

header("location: $redirect_url");


exit();
