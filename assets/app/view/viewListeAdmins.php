<?php

class ViewPageListeAdmin
{

  private ?string $message = '';
  private ?string $titre = '';
  private ?string $listAdmins = '';

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  public function getTitre(): ?string
  {
    return $this->titre;
  }

  public function setTitre(?string $titre): self
  {
    $this->titre = $titre;
    return $this;
  }

  public function getListAdmins(): ?string
  {
    return $this->listAdmins;
  }

  public function setListAdmins(?string $listAdmins): self
  {
    $this->listAdmins = $listAdmins;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {

    if ($this->getTitre() === "Liste des Admins Actifs") {
      $link = "<a href='./controllerListeAdmins_inactif.php' class='admins-inactifs'>Admins Inactifs</a>";
    } else {
      $link = "";
    }

    //!ATENÇÃO NUNCA É <main> NO COMEÇO
    return ('
      <section class="connecte-accueil">
        <div class="connecte-accueil-container">
          <div class="accueil-title">
            <img class="accueil-titre__icon" src="../../img/icon/home-connect-icon-minutos-telecom.svg"
              alt="Ícone Home" />
            <h2 class="accueil-titre__title">Page d\'Accueil</h2>
          </div>
          <div class="options-perso-container">
            <a href="./controllerAddClient.php" class="options-perso">
              <img class="options-perso__icon" src="../../img/icon/add-client-icon-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="options-perso__title">Nouveau Client</h2>
            </a>
            <a href="./controllerLoginAdmin.php" class="options-perso">
              <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="options-perso__title">Liste de Clients</h2>
            </a>
            <a href="./controllerAddAdmin.php" class="options-perso">
              <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="options-perso__title">Nouvel Admin</h2>
            </a>
            <a href="./controllerListeAdmins.php" class="options-perso">
              <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="options-perso__title">Liste des Admins</h2>
            </a>
          </div>
          <div class="liste-clients-container">
            <div class="options-perso">
              <img class="connect-form__icon" src="../../img/icon/liste-clients-dark-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="connect-form__title">' . $this->getTitre() . '</h2>
            </div>
            '
      . $this->getMessage() .
      '
            <div class="liste-clients">
              <input class="liste-clients__searchbar" type="search" placeholder="Cherchez le client...">
              <ul class="liste-clients__liste">'
      . $this->getListAdmins() .
      '</ul>
            </div>
          </div>
          <div class="admins-inactifs_container">
            ' . $link . '
          </div>
      </section>
      </div>
    </main>
    ');
  }
}
