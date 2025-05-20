<?php

class viewEditClient
{

  private ?string $message = '';
  private int $id;
  private string $nom;
  private string $prenom;
  private string $sexe;
  private string $dateNaissance;
  private string $adresse;
  private ?string $complement;
  private int $codePostal;
  private string $ville;
  private int $telephone;
  private string $email;
  private string $password;
  private int $id_status;
  private int $id_admin;
  private string $nom_admin;


  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): self
  {
    $this->id = $id;
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

  public function getSexe(): string
  {
    return $this->sexe;
  }

  public function setSexe(string $sexe): self
  {
    $this->sexe = $sexe;
    return $this;
  }

  public function getDateNaissance(): string
  {
    return $this->dateNaissance;
  }

  public function setDateNaissance(string $dateNaissance): self
  {
    $this->dateNaissance = $dateNaissance;
    return $this;
  }

  public function getAdresse(): string
  {
    return $this->adresse;
  }

  public function setAdresse(string $adresse): self
  {
    $this->adresse = $adresse;
    return $this;
  }

  public function getComplement(): ?string
  {
    return $this->complement;
  }

  public function setComplement(?string $complement): self
  {
    $this->complement = $complement;
    return $this;
  }

  public function getCodePostal(): int
  {
    return $this->codePostal;
  }

  public function setCodePostal(int $codePostal): self
  {
    $this->codePostal = $codePostal;
    return $this;
  }

  public function getVille(): string
  {
    return $this->ville;
  }

  public function setVille(string $ville): self
  {
    $this->ville = $ville;
    return $this;
  }

  public function getTelephone(): int
  {
    return $this->telephone;
  }

  public function setTelephone(int $telephone): self
  {
    $this->telephone = $telephone;
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

  public function getIdAdmin(): int
  {
    return $this->id_admin;
  }

  public function setIdAdmin(int $id_admin): self
  {
    $this->id_admin = $id_admin;
    return $this;
  }

  public function getNomAdmin(): string
  {
    return $this->nom_admin;
  }

  public function setNomAdmin(string $nom_admin): self
  {
    $this->nom_admin = $nom_admin;
    return $this;
  }


  //METHOD

  private function isSelected(string $value): string
  {
    return ((string) $this->getSexe() === $value) ? 'selected' : '';
  }


  public function displayView(): string
  {

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
            <h2 class='connect-form__title'>Nouvel Admin</h2>
          </div>

        <form class='connect-form' action='' method='POST'>
        
        <div class='form-flex form-flex-prenom'>
        <label class='form-label' for='prenom'>Prénom</label>
        <input class='form-input' type='text' id='prenom' name='prenom' maxlength='20' value='{$this->getPrenom()}' required disabled/>
        </div>
        
          <div class='form-flex form-flex-nom'>
            <label class='form-label ' for='nom'>Nom</label>
            <input class='form-input' type='text' id='nom' name='nom' maxlength='20' value='{$this->getNom()}' required disabled/>
          </div>

          <div class='form-flex form-flex-sexe'>
            <label class='form-label' for='sexe'>Sexe</label>
            <select class='form-input' id='sexe' name='sexe' disabled>
              <option value='homme' {$this->isSelected('Homme')}>Homme</option>
              <option value='femme' {$this->isSelected('Femme')}>Femme</option>
              <option value='autre' {$this->isSelected('Autre')}>Autre</option>
            </select>
          </div>

          <div class='form-flex form-flex-date_naissance'>
            <label class='form-label' for='date_naissance'>Date de Naissance</label>
            <input class='form-input' type='date' id='date_naissance' name='date_naissance' value='{$this->getDateNaissance()}' required disabled/>
            <p class='form__text-erreur'></p>
          </div>

          <div class='form-flex form-flex-adresse'>
            <label class='form-label' for='adresse'>Adresse</label>
            <input class='form-input' type='text' id='adresse' name='adresse' maxlength='50' value='{$this->getAdresse()}' required disabled/>
          </div>

          <div class='form-flex form-flex-complement'>
            <label class='form-label' for='complement'>Complément</label>
            <input class='form-input' type='text' id='complement' name='complement' maxlength='20' value='{$this->getComplement()}'disabled/>
          </div>

          <div class='form-cp_ville-flex '>
            <div class='form-flex form-flex-code_postal'>
              <label class='form-label' for='code_postal'>Code Postal</label>
              <input class='form-input' type='text' id='code_postal' name='code_postal' maxlength='5' value='{$this->getCodePostal()}' required disabled/>
              <p class='form__text-erreur'></p>
            </div>
            <div class='form-flex form-flex-ville'>
              <label class='form-label' for='ville'>Ville</label>
              <input class='form-input' type='text' id='ville' name='ville' maxlength='30' value='{$this->getVille()}' required disabled/>
            </div>
          </div>

          <div class='form-flex form-flex-telephone'>
            <label class='form-label' for='telephone'>Téléphone</label>
            <input class='form-input' type='tel' id='telephone' name='telephone' id='telephone' maxlength='20' value='{$this->getTelephone()}'required disabled>
            <p class='form__text-erreur'></p>
          </div>

          <div class='form-flex form-flex-email'>
            <label class='form-label' for='email'>E-mail</label>
            <input class='form-input' type='email' id='email' name='email' maxlength='50' value='{$this->getEmail()}' required disabled/>
            <p class='form__text-erreur'></p>
          </div>

          <div class='form-flex mdp-gen form-flex-password'>
            <label class='form-label' for='password'>Mot de Passe</label>
            <div class='mdp-gen'>
              <button type='button' id='btn-mdp-gen'>
                Générer
              </button>
              <input class='form-input' type='text' id='password' name='password' disabled/>
            </div>
          </div>

          <div class='form-flex form-flex-status'>
            <label class='form-label' for='status'>Status</label>
            <select class='form-input' id='status' name='status' value='{$this->getIdStatus()}' disabled>
              <option value='actif'>Actif</option>
              <option value='inactif'>Inactif</option>
            </select>
          </div>

          <div class='form-flex form-flex-status'>
            <label class='form-label' for='status'>Crée par</label>
            <input class='form-input' id='cree-par' name='cree-par' value='{$this->getNomAdmin()}' disabled>
            </input>
          </div>

          <div class='form-btn-container'>
            <button class='form-btn' id='edit-admin'>Modifier</button>
            <button class='form-btn' type='reset' name='reset-edit-client' id='reset-edit-admin'>Annuler</button>
            <button class='form-btn' type='submit' name='submit-edit-client' id='submit-edit-client'>Enregistrer</button>
          </div>

          <p>{$this->getMessage()}</p>
        </form>

        </div>
      </section>
    </div>
    </main>
    ");
  }
}
