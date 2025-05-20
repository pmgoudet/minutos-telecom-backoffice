<?php

include "../utils/utils.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewEditAdmin.php";
include "../view/viewListeAdmins.php";
include "../view/viewFooter.php";

session_start();

class ControllerEditAdmin
{

  private ?viewEditAdmin $viewEditAdmin;
  private ?ViewPageListeAdmin $viewPageListeAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelAdmin $modelAdmin;


  //CONSTRUCT

  public function __construct(?viewEditAdmin $viewEditAdmin, ?ViewPageListeAdmin $viewPageListeAdmin, ?ModelAdmin $newModelAdmin)
  {
    $this->viewEditAdmin = $viewEditAdmin;
    $this->viewPageListeAdmin = $viewPageListeAdmin;
    $this->modelAdmin = $newModelAdmin;
  }


  //GETTER ET SETTER

  public function getviewEditAdmin(): ?viewEditAdmin
  {
    return $this->viewEditAdmin;
  }

  public function setviewEditAdmin(?viewEditAdmin $viewEditAdmin): self
  {
    $this->viewEditAdmin = $viewEditAdmin;
    return $this;
  }

  public function getViewPageListeAdmin(): ?ViewPageListeAdmin
  {
    return $this->viewPageListeAdmin;
  }

  public function setViewPageListeAdmin(?ViewPageListeAdmin $viewPageListeAdmin): self
  {
    $this->viewPageListeAdmin = $viewPageListeAdmin;
    return $this;
  }

  public function getViewHeader(): ?ViewHeader
  {
    return $this->viewHeader;
  }

  public function setViewHeader(?ViewHeader $viewHeader): self
  {
    $this->viewHeader = $viewHeader;
    return $this;
  }

  public function getViewFooter(): ?ViewFooter
  {
    return $this->viewFooter;
  }

  public function setViewFooter(?ViewFooter $viewFooter): self
  {
    $this->viewFooter = $viewFooter;
    return $this;
  }

  public function getModelAdmin(): ?ModelAdmin
  {
    return $this->modelAdmin;
  }

  public function setModelAdmin(?ModelAdmin $modelAdmin): self
  {
    $this->modelAdmin = $modelAdmin;
    return $this;
  }


  //METHOD

  public function script(): void
  {
    $script = "<script src='../../js/edit-data.js'></script>";
    $this->getViewFooter()->setScript($script);
  }

  public function showAdmin(): void
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $data = $this->getModelAdmin()->setId($id)->getById();

      $this->getviewEditAdmin()->setPrenom($data[0]['prenom']);
      $this->getviewEditAdmin()->setNom($data[0]['nom']);
      $this->getviewEditAdmin()->setEmail($data[0]['email']);
      $this->getviewEditAdmin()->setPassword($data[0]['password']);
      $this->getviewEditAdmin()->setIdStatus($data[0]['id_status']);
    }
  }

  public function editAdmin(): string
  {
    $msg = '';
    $id = $_GET['id'];

    if (isset($_POST['submit-edit-admin'])) {
      if (
        isset($_POST['nom-edit-admin']) && !empty($_POST['nom-edit-admin'])
        && isset($_POST['prenom-edit-admin']) && !empty($_POST['prenom-edit-admin'])
        && isset($_POST['email-edit-admin']) && !empty($_POST['email-edit-admin'])
      ) {
        if (filter_var($_POST['email-edit-admin'], FILTER_VALIDATE_EMAIL)) {
          $id = sanitize($_GET['id']);
          $nom = sanitize($_POST['nom-edit-admin']);
          $prenom = sanitize($_POST['prenom-edit-admin']);
          $email = sanitize($_POST['email-edit-admin']);

          if (isset($_POST['password-edit-admin'])) {
            $password = sanitize($_POST['password-edit-admin']);
            $password = password_hash($password, PASSWORD_BCRYPT);
          }

          try {
            $data = $this->getModelAdmin()->setEmail($email)->getByEmail();

            //retirer de $data le propre utilisateur pour verifier juste les autres. fn($user) est la fonction callback que verifie que les utilisateurs n'ont pas le meme id que celui ci que l'on edite
            $data = array_filter($data, fn($user) => $user['id_admin'] != $id);

            //l'adresse mail existe deja, if faut vérifier s'il y a un 2eme
            if (empty($data)) {
              $this->getModelAdmin()->setId($id)->setNom($nom)->setPrenom($prenom)->setEmail($email);

              if (isset($_POST['password-edit-admin'])) {
                $this->getModelAdmin()->setPassword($password);
              }

              $msg = $this->getModelAdmin()->edit();

              header("Refresh: 0");
            } else {
              $msg = "Cet adresse mail existe déjà sur un autre compte.";
            }
          } catch (EXCEPTION $e) {
            $msg = $e->getMessage();
          }
        } else {
          $msg = "Le mail n'est pas au bon format";
        }
      } else {
        $msg = "Veuillez remplir les champs obligatoires.";
      }
    }

    return $msg;
  }

  public function deleteAdmin(): void
  {
    if (isset($_POST['delete-admin'])) {
      $this->getModelAdmin()->setId($_GET['id'])->delete();
      // $_SESSION['delete_msg'] = $msg; //! A FINIR msg de confirm

      header("Location: ./controllerListeAdmins.php");
      exit();
    }
  }

  public function recoverAdmin(): void
  {
    if (isset($_POST['recover-admin'])) {
      echo ($this->getModelAdmin()->setId($_GET['id'])->recover());
      // $_SESSION['delete_msg'] = $msg; //! A FINIR msg de confirm

      header("Location: ./controllerListeAdmins.php");
      exit();
    }
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    $this->showAdmin();
    $this->deleteAdmin();
    $this->recoverAdmin();
    echo $this->getviewEditAdmin()->setMessage($this->editAdmin())->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$editAdmin = new ControllerEditAdmin(new viewEditAdmin(), new ViewPageListeAdmin(), new ModelAdmin);
$editAdmin->render();
