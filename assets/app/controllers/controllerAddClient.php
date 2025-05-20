<?php

include "../utils/utils.php";
include "../models/modelClient.php";
include "../view/viewHeader.php";
include "../view/viewPageAdmin.php";
include "../view/viewAddClient.php";
include "../view/viewFooter.php";

session_start();

class ControllerAddClient
{

  private ?viewAddClient $viewAddClient;
  private ?ModelClient $modelClient;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;

  //CONSTRUCT

  public function __construct(?viewAddClient $newViewAddClient, ?ModelClient $newModelClient)
  {
    $this->viewAddClient = $newViewAddClient;
    $this->modelClient = $newModelClient;
  }

  //GETTER ET SETTER

  public function getviewAddClient(): ?viewAddClient
  {
    return $this->viewAddClient;
  }

  public function setviewAddClient(?ViewPageAdmin $newViewAddClient): self
  {
    $this->viewAddClient = $newViewAddClient;
    return $this;
  }

  public function getModelClient(): ?ModelClient
  {
    return $this->modelClient;
  }

  public function setModelClient(?ModelClient $modelClient): self
  {
    $this->modelClient = $modelClient;
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


  //METHOD


  public function script(): void
  {
    $script = "<script src='../../js/backoffice-form.js'></script>";
    $this->getViewFooter()->setScript($script);
  }

  public function addClient(): string
  {
    $msg = '';

    //btn submit
    if (isset($_POST['submit-add-client'])) {
      //variables not vides ou nulls
      if (
        isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['prenom']) && !empty($_POST['prenom'])
        && isset($_POST['sexe']) && !empty($_POST['sexe'])
        && isset($_POST['date_naissance']) && !empty($_POST['date_naissance'])
        && isset($_POST['adresse']) && !empty($_POST['adresse'])
        && isset($_POST['code_postal']) && !empty($_POST['code_postal'])
        && isset($_POST['ville']) && !empty($_POST['ville'])
        && isset($_POST['telephone']) && !empty($_POST['telephone'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
      ) {

        //validation adresse mail
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

          //complement peut etre null
          $complement = isset($_POST['complement']) && !empty($_POST['complement']) ? $_POST['complement'] : null;

          $nom = sanitize($_POST['nom']);
          $prenom = sanitize($_POST['prenom']);
          $sexe = sanitize($_POST['sexe']);
          $dateNaissance = sanitize($_POST['date_naissance']);
          $adresse = sanitize($_POST['adresse']);
          $complement = sanitize($_POST['complement']);
          $codePostal = sanitize($_POST['code_postal']);
          $ville = sanitize($_POST['ville']);
          $telephone = sanitize($_POST['telephone']);
          $email = sanitize($_POST['email']);
          $password = sanitize($_POST['password']);
          $status = sanitize($_POST['status']);
          $status === 'actif' ? $status = 1 : $status = 0;
          $admin = sanitize($_SESSION['id_admin']);

          $password = password_hash($password, PASSWORD_BCRYPT);

          //verification du mail
          try {
            $data = $this->getModelClient()->setEmail($email)->getByEmail();

            if (empty($data)) {
              $this->getModelClient()->setNom($nom)->setPrenom($prenom)->setSexe($sexe)->setDateNaissance($dateNaissance)->setAdresse($adresse)->setComplement($complement)->setCodePostal($codePostal)->setVille($ville)->setTelephone($telephone)->setEmail($email)->setPassword($password)->setIdStatus($status)->setIdAdmin($admin);

              $msg = $this->getModelClient()->add();
            } else {
              $msg =  "Cet adresse mail existe déjà sur un autre compte.";
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

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    echo $this->getviewAddClient()->setMessage($this->addClient())->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$client = new ControllerAddClient(new viewAddClient(), new ModelClient());
$client->render();
