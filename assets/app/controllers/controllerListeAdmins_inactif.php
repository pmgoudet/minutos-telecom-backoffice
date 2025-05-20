<?php

include "../utils/utils.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewListeAdmins.php";
include "../view/viewFooter.php";

session_start();

class ControllerListeAdmin
{

  private ?ViewPageListeAdmin $viewPageListeAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelAdmin $modelAdmin;

  //CONSTRUCT

  public function __construct(?ViewPageListeAdmin $viewPageListeAdmin, ?ModelAdmin $newModelAdmin,)
  {
    $this->viewPageListeAdmin = $viewPageListeAdmin;
    $this->modelAdmin = $newModelAdmin;
  }

  //GETTER ET SETTER

  public function getViewPageListeAdmin(): ?ViewPageListeAdmin
  {
    return $this->viewPageListeAdmin;
  }

  public function setViewPageListeAdmin(?ViewPageListeAdmin $viewPageListeAdmin): self
  {
    $this->viewPageListeAdmin = $viewPageListeAdmin;
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
    $script = "<script src='../../js/search.js'></script>";
    $this->getViewFooter()->setScript($script);
  }

  // public function deleteMsg(): void
  // //! NÃO CONSEGUI FAZER FUNCIONAR A MENSAGEM DE DELETE NA LISTE DE CLIENTS
  // {
  //   if (isset($_SESSION['delete_message'])) {
  //     $this->getViewPageListeAdmin()->setMessage($_SESSION['delete_message']);
  //     unset($_SESSION['delete_message']);
  //   }
  // }

  public function readAdmins(): array | string
  {
    $adminList = '';

    $data = $this->getModelAdmin()->getAllInactif();

    foreach ($data as $admin) {
      $adminList = $adminList . "
      <li class='liste-clients__liste__item'>
        <p class='liste-clients__liste__item-nom'>{$admin['prenom']} {$admin['nom']}</p>
        <a href='./controllerEditAdmin.php?id={$admin['id_admin']}' class='liste-clients__liste__item-btn'>Voir</a>
      </li>";
    }

    return $adminList;
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    echo $this->getViewPageListeAdmin()->setListAdmins($this->readAdmins())->setTitre('Liste des Admins Inactifs')->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$listeAdmins = new ControllerListeAdmin(new ViewPageListeAdmin(), new ModelAdmin());
$listeAdmins->render();
