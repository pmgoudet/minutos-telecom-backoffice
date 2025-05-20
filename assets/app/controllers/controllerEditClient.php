<?php

include "../utils/utils.php";
include "../models/modelClient.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewEditClient.php";
include "../view/viewPageAdmin.php";
include "../view/viewFooter.php";

session_start();

class ControllerEditClient
{

  private ?viewEditClient $viewEditClient;
  private ?ViewPageAdmin $viewPageAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelClient $modelClient;
  private ?ModelAdmin $modelAdmin;


  //CONSTRUCT

  public function __construct(?viewEditClient $viewEditClient, ?ViewPageAdmin $viewPageAdmin, ?ModelClient $modelClient, ?ModelAdmin $modelAdmin)
  {
    $this->viewEditClient = $viewEditClient;
    $this->viewPageAdmin = $viewPageAdmin;
    $this->modelClient = $modelClient;
    $this->modelAdmin = $modelAdmin;
  }


  //GETTER ET SETTER

  public function getModelClient(): ?ModelClient
  {
    return $this->modelClient;
  }

  public function setModelClient(?ModelClient $modelClient): self
  {
    $this->modelClient = $modelClient;
    return $this;
  }

  public function getviewEditClient(): ?viewEditClient
  {
    return $this->viewEditClient;
  }

  public function setviewEditClient(?viewEditClient $viewEditClient): self
  {
    $this->viewEditClient = $viewEditClient;
    return $this;
  }

  public function getViewPageAdmin(): ?ViewPageAdmin
  {
    return $this->viewPageAdmin;
  }

  public function setViewPageAdmin(?ViewPageAdmin $viewPageAdmin): self
  {
    $this->viewPageAdmin = $viewPageAdmin;
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
    $script = "<script src='../../js/edit-data.js'></script>
    <script src='../../js/backoffice-form.js'></script>";
    $this->getViewFooter()->setScript($script);
  }

  public function showClient(): string
  {
    if (isset($_GET['id'])) {

      $id = $_GET['id'];
      $data = $this->getModelClient()->setId($id)->getById();

      $this->getviewEditClient()->setNom($data[0]['nom']);
      $this->getviewEditClient()->setPrenom($data[0]['prenom']);
      $this->getviewEditClient()->setSexe($data[0]['sexe']);
      $this->getviewEditClient()->setDateNaissance($data[0]['date_naissance']);
      $this->getviewEditClient()->setAdresse($data[0]['adresse']);
      $this->getviewEditClient()->setComplement($data[0]['complement']);
      $this->getviewEditClient()->setCodePostal($data[0]['code_postal']);
      $this->getviewEditClient()->setVille($data[0]['ville']);
      $this->getviewEditClient()->setTelephone($data[0]['telephone']);
      $this->getviewEditClient()->setEmail($data[0]['email']);
      $this->getviewEditClient()->setPassword($data[0]['password']);
      $this->getviewEditClient()->setIdStatus($data[0]['id_status']);
      $this->getviewEditClient()->setIdAdmin($data[0]['id_admin']);

      $data2 = $this->getModelAdmin()->setId($data[0]['id_admin'])->getById();
      $this->getviewEditClient()->setNomAdmin($data2[0]['prenom'] . ' ' . $data2[0]['nom']);
    }

    return '';
  }

  public function editClient(): string
  {
    $msg = '';
    $id = $_GET['id'];

    if (isset($_POST['submit-edit-client'])) {
      if (
        isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['prenom']) && !empty($_POST['prenom'])
        && isset($_POST['sexe-edit-client']) && !empty($_POST['sexe-edit-client'])
        && isset($_POST['email-edit-client']) && !empty($_POST['email-edit-client'])



        //! TEM QUE RECOMEÇAR POR AQUIIIIIIIIIIIIIIIII
        //! ///////////////////////////////////////////
        //! ///////////////////////////////////////////
        //! ///////////////////////////////////////////
        //! ///////////////////////////////////////////
        //! ///////////////////////////////////////////
        //! ///////////////////////////////////////////



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
            $data = array_filter($data, fn($user) => $user['id'] != $id);

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

    return '';
  }

  public function deleteClient(): void
  {
    // if (isset($_POST['delete-admin'])) {

    //   $id = $_GET['id'];

    //   $msg = $this->getModelAdmin()->setId($id)->delete();
    //   $_SESSION['delete_msg'] = $msg; //! A FINIR

    //   header("Location: ./controllerListeAdmins.php");
    //   exit();
    // }
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    $this->showClient();
    $this->deleteClient();
    echo $this->getviewEditClient()->setMessage($this->editClient())->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$editClient = new ControllerEditClient(new viewEditClient(), new ViewPageAdmin(), new ModelClient, new ModelAdmin);
$editClient->render();
