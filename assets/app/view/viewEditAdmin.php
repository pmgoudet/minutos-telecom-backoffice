<?php

class viewEditAdmin
{

  private ?string $message = '';
  private string $nom;
  private string $prenom;
  private string $email;
  private string $password;
  private int $id_status;


  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  public function getNom(): string
  {
    return $this->nom;
  }

  public function setNom(string $nom): self
  {
    $this->nom = $nom;
    return $this;
  }

  public function getPrenom(): string
  {
    return $this->prenom;
  }

  public function setPrenom(string $prenom): self
  {
    $this->prenom = $prenom;
    return $this;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;
    return $this;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;
    return $this;
  }

  public function getIdStatus(): int
  {
    return $this->id_status;
  }

  public function setIdStatus(int $id_status): self
  {
    $this->id_status = $id_status;
    return $this;
  }



  //METHOD
  public function displayView(): string
  {

    $buttonSupprimeReactive = "";

    if ($this->getIdStatus() == 1) {
      $buttonSupprimeReactive = "<button class='form-btn' name='delete-admin' id='delete-admin' onclick='return confirmDelete();'>Effacer</button>";
    } else {
      $buttonSupprimeReactive = "<button class='form-btn' name='recover-admin' id='recover-admin' onclick='return confirmRecover();'>Récupérer</button>";
    }

    //!ATENÇÃO NUNCA É <main> NO COMEÇO


    return ("
        <section class='connecte-accueil'>
          <div class='connecte-accueil-container'>
            <div class='accueil-title'>
              <img class='accueil-titre__icon' src='../../img/icon/home-connect-icon-minutos-telecom.svg'
                alt='Ícone Home' />
              <h2 class='accueil-titre__title'>Page d'Accueil</h2>
            </div>
            
            <div class='options-perso-container'>
              <a href='./controllerAddClient.php' class='options-perso'>
                <img class='options-perso__icon' src='../../img/icon/add-client-icon-minutos-telecom.svg'
                  alt='Ícone Dados Pessoais' />
                <h2 class='options-perso__title'>Nouveau Client</h2>
              </a>
              <a href='./controllerLoginAdmin.php' class='options-perso'>
                <img class='options-perso__icon' src='../../img/icon/liste-clients-minutos-telecom.svg'
                  alt='Ícone Dados Pessoais' />
                <h2 class='options-perso__title'>Liste de Clients</h2>
              </a>
              <a href='./controllerAddAdmin.php' class='options-perso'>
                <img class='options-perso__icon' src='../../img/icon/liste-clients-minutos-telecom.svg'
                  alt='Ícone Dados Pessoais' />
                <h2 class='options-perso__title'>Nouvel Admin</h2>
              </a>
              <a href='./controllerListeAdmins.php' class='options-perso'>
                <img class='options-perso__icon' src='../../img/icon/liste-clients-minutos-telecom.svg'
                  alt='Ícone Dados Pessoais' />
                <h2 class='options-perso__title'>Liste des Admins</h2>
              </a>
            </div>

            <div class='options-perso'>
              <img class='connect-form__icon' src='../../img/icon/add-client-icon-dark-minutos-telecom.svg'
                alt='Ícone Dados Pessoais' />
              <h2 class='connect-form__title'>Admins</h2>
            </div>

            <form class='connect-form' method='POST'>

            <div class='form-flex form-flex-prenom'>
              <label class='form-label' for='prenom-edit-admin'>Prénom</label>
              <input class='form-input' type='text' id='prenom-edit-admin' name='prenom-edit-admin' value='" . $this->getPrenom() . "' required disabled />
            </div>

              <div class='form-flex form-flex-nom'>
                <label class='form-label ' for='nom-edit-admin'>Nom</label>
                <input class='form-input' type='text' id='nom-edit-admin' name='nom-edit-admin' value='" . $this->getNom() . "' required disabled />
              </div>

              <div class='form-flex form-flex-email'>
                <label class='form-label' for='email-edit-admin'>E-mail</label>
                <input class='form-input' type='email' id='email-edit-admin' name='email-edit-admin' value='" . $this->getEmail() . "' required disabled />
                <p class='form__text-erreur'></p>
              </div>

              <div class='form-flex mdp-gen form-flex-password'>
                <label class='form-label' for='password-edit-admin'>Mot de Passe</label>
                <input class='form-input' type='password' id='password-edit-admin' name='password-edit-admin' placeholder='Remplissez si vous souhaitez changer le mdp. Si non, laissez-le vide' disabled />
              </div>

              <div class='form-btn-container'>
                <button class='form-btn' id='edit-admin'>Modifier</button>
                " . $buttonSupprimeReactive . "
                <button class='form-btn' name='reset-admin' id='reset-edit-admin'>Annuler</button>
                <button class='form-btn' type='submit' name='submit-edit-admin' id='submit-edit-admin'>Enregistrer</button>
              </div>

              <p>" . $this->getMessage() . "</p>

            </form>
          </div>
        </section>
        </div>
      </main>    
    ");
  }
}
