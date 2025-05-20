<?php

class viewAddAdmin
{

  private ?string $message = '';

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {
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

            <div class="options-perso">
              <img class="connect-form__icon" src="../../img/icon/add-client-icon-dark-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="connect-form__title">Nouvel Admin</h2>
            </div>

            <form class="connect-form" action="" method="POST">

              <div class="form-flex form-flex-prenom">
                <label class="form-label" for="prenom-new-admin">Prénom</label>
                <input class="form-input" type="text" id="prenom-new-admin" name="prenom-new-admin" required />
              </div>

              <div class="form-flex form-flex-nom">
                <label class="form-label " for="nom-new-admin">Nom</label>
                <input class="form-input" type="text" id="nom-new-admin" name="nom-new-admin" required />
              </div>

              <div class="form-flex form-flex-email">
                <label class="form-label" for="email-new-admin">E-mail</label>
                <input class="form-input" type="email" id="email-new-admin" name="email-new-admin" required />
                <p class="form__text-erreur"></p>
              </div>

              <div class="form-flex mdp-gen form-flex-password">
                <label class="form-label" for="password-new-admin">Mot de Passe</label>
                <input class="form-input" type="password" id="password-new-admin" name="password-new-admin" required />
              </div>

              <div class="form-btn-container">
                <button class="form-btn" type="reset" name="reset-new-admin" id="reset-new-admin">Annuler</button>
                <button class="form-btn" type="submit" name="submit-new-admin" id="submit-new-admin">Enregistrer</button>
              </div>

              <p>' . $this->getMessage() . '</p>

            </form>
          </div>
        </section>
        </div>
      </main>    
    ');
  }
}
