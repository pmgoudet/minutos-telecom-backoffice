<?php

class ModelClient
{
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
  private string $id_status;
  private string $id_admin;
  private PDO $bdd;

  //CONSTRUCT

  public function __construct()
  {
    $this->bdd = connect();
  }

  //GETTER ET SETTER

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

  public function setComplement(string $complement): ?self
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

  public function getIdStatus(): string
  {
    return $this->id_status;
  }

  public function setIdStatus(string $id_status): self
  {
    $this->id_status = $id_status;
    return $this;
  }

  public function getIdAdmin(): string
  {
    return $this->id_admin;
  }

  public function setIdAdmin(string $id_admin): self
  {
    $this->id_admin = $id_admin;
    return $this;
  }

  public function getBdd(): PDO
  {
    return $this->bdd;
  }

  public function setBdd(PDO $bdd): self
  {
    $this->bdd = $bdd;
    return $this;
  }


  //METHOD

  public function add(): string
  {
    try {
      $req = $this->getBdd()->prepare("INSERT INTO `client` 
      (nom, prenom, sexe, date_naissance, adresse, complement, code_postal, ville, telephone, email, `password`, id_status, id_admin) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $nom = $this->getNom();
      $prenom = $this->getPrenom();
      $sexe = $this->getSexe();
      $dateNaissance = $this->getDateNaissance();
      $adresse = $this->getAdresse();
      $complement = $this->getComplement();
      $codePostal = $this->getCodePostal();
      $ville = $this->getVille();
      $telephone = $this->getTelephone();
      $email = $this->getEmail();
      $password = $this->getPassword();
      $id_status = $this->getIdStatus();
      $id_admin = $this->getIdAdmin();

      $req->bindParam(1, $nom, PDO::PARAM_STR);
      $req->bindParam(2, $prenom, PDO::PARAM_STR);
      $req->bindParam(3, $sexe, PDO::PARAM_STR);
      $req->bindParam(4, $dateNaissance, PDO::PARAM_STR);
      $req->bindParam(5, $adresse, PDO::PARAM_STR);
      $req->bindParam(6, $complement, $complement === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
      $req->bindParam(7, $codePostal, PDO::PARAM_STR);
      $req->bindParam(8, $ville, PDO::PARAM_STR);
      $req->bindParam(9, $telephone, PDO::PARAM_STR);
      $req->bindParam(10, $email, PDO::PARAM_STR);
      $req->bindParam(11, $password, PDO::PARAM_STR);
      $req->bindParam(12, $id_status, PDO::PARAM_STR);
      $req->bindParam(13, $id_admin, PDO::PARAM_STR);
      $req->execute();

      return "L'enregistrement de $prenom $nom, dont l'email est $email, a été effectué avec succès.";
    } catch (EXCEPTION $error) {
      return $error->getMessage();
    }
  }


  public function getAll(): array | string
  {
    try {
      $req = $this->getBdd()->prepare('SELECT id_client, nom, prenom, sexe, date_naissance, adresse, complement, code_postal, ville, telephone, email, `password`, id_status, id_admin FROM `client`');
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  public function getByEmail(): array | string
  {
    try {
      $req = $this->getBdd()->prepare("SELECT id_client, nom, prenom, sexe, date_naissance, adresse, complement, code_postal, ville, telephone, email, `password`, id_status, id_admin FROM `client` WHERE email = ? LIMIT 1");
      $email = $this->getEmail();
      $req->bindParam(1, $email, PDO::PARAM_STR);
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  public function getById(): array | string
  {
    try {
      $req = $this->getBdd()->prepare("SELECT id_client, nom, prenom, sexe, date_naissance, adresse, complement, code_postal, ville, telephone, email, `password`, id_status, id_admin FROM `client` WHERE id_client = ? LIMIT 1");
      $id = $this->getId();
      $req->bindParam(1, $id, PDO::PARAM_STR);
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }
}
