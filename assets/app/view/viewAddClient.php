<?php

class viewAddClient
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
            <label class="form-label" for="prenom">Prénom</label>
            <input class="form-input" type="text" id="prenom" name="prenom" maxlength="20" required />
          </div>

          <div class="form-flex form-flex-nom">
            <label class="form-label " for="nom">Nom</label>
            <input class="form-input" type="text" id="nom" name="nom" maxlength="20" required />
          </div>

          <div class="form-flex form-flex-sexe">
            <label class="form-label" for="sexe">Sexe</label>
            <select class="form-input" id="sexe" name="sexe">
              <option value="homme">Homme</option>
              <option value="femme">Femme</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <div class="form-flex form-flex-date_naissance">
            <label class="form-label" for="date_naissance">Date de Naissance</label>
            <input class="form-input" type="date" id="date_naissance" name="date_naissance" required />
            <p class="form__text-erreur"></p>
          </div>

          <div class="form-flex form-flex-adresse">
            <label class="form-label" for="adresse">Adresse</label>
            <input class="form-input" type="text" id="adresse" name="adresse" maxlength="50" required />
          </div>

          <div class="form-flex form-flex-complement">
            <label class="form-label" for="complement">Complément</label>
            <input class="form-input" type="text" id="complement" name="complement" maxlength="20"/>
          </div>

          <div class="form-cp_ville-flex ">
            <div class="form-flex form-flex-code_postal">
              <label class="form-label" for="code_postal">Code Postal</label>
              <input class="form-input" type="text" id="code_postal" name="code_postal" maxlength="5" required />
              <p class="form__text-erreur"></p>
            </div>
            <div class="form-flex form-flex-ville">
              <label class="form-label" for="ville">Ville</label>
              <input class="form-input" type="text" id="ville" name="ville" maxlength="30" required />
            </div>
          </div>

          <div class="form-flex form-flex-telephone">
            <label class="form-label" for="telephone">Téléphone</label>
            <input class="form-input" type="tel" id="telephone" name="telephone" id="telephone" maxlength="20" required>
            <p class="form__text-erreur"></p>
          </div>

          <div class="form-flex form-flex-email">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-input" type="email" id="email" name="email" maxlength="50" required />
            <p class="form__text-erreur"></p>
          </div>

          <div class="form-flex mdp-gen form-flex-password">
            <label class="form-label" for="password">Mot de Passe</label>
            <div class="mdp-gen">
              <button type="button" id="btn-mdp-gen">
                Générer
              </button>
              <input class="form-input" type="text" id="password" name="password" value="1234" required />
            </div>
          </div>

          <div class="form-flex form-flex-status">
            <label class="form-label" for="status">Status</label>
            <select class="form-input" id="status" name="status">
              <option value="actif">Actif</option>
              <option value="inactif">Inactif</option>
            </select>
          </div>

          <div class="form-btn-container">
            <button class="form-btn" type="reset" name="reset-add-client" id="reset-add-client">Annuler</button>
            <button class="form-btn" type="submit" name="submit-add-client" id="submit-add-client">Enregistrer</button>
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
