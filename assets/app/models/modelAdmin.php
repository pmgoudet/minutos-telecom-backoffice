<?php

class ModelAdmin
{
  private int $id;
  private string $nom;
  private string $prenom;
  private string $email;
  private string $password;
  private string $id_status;
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
      $req = $this->getBdd()->prepare("INSERT INTO `admin` (`nom`, prenom, `email`, `password`) VALUES (?,?,?,?);");

      $nom = $this->getNom();
      $prenom = $this->getPrenom();
      $email = $this->getEmail();
      $password = $this->getPassword();

      $req->bindParam(1, $nom, PDO::PARAM_STR);
      $req->bindParam(2, $prenom, PDO::PARAM_STR);
      $req->bindParam(3, $email, PDO::PARAM_STR);
      $req->bindParam(4, $password, PDO::PARAM_STR);
      $req->execute();

      return "L'enregistrement de $prenom $nom, dont l'email est $email, a été effectué avec succès.";
    } catch (EXCEPTION $error) {
      return $error->getMessage();
    }
  }

  public function edit(): string
  {
    try {
      $req = $this->getBdd()->prepare("UPDATE `admin`  
      SET nom = ?, prenom = ?, email = ?, `password` = COALESCE(NULLIF(?, ''), `password`)  WHERE id_admin = ?");
      //NULLIF transforme une string vide en NULL
      //COALESCE(NULL, mpd) garde la valeur actuel du mdp si NULL est passé

      $nom = $this->getNom();
      $prenom = $this->getPrenom();
      $email = $this->getEmail();
      $password = $this->getPassword();
      $id = $this->getId();

      $req->bindParam(1, $nom, PDO::PARAM_STR);
      $req->bindParam(2, $prenom, PDO::PARAM_STR);
      $req->bindParam(3, $email, PDO::PARAM_STR);
      $req->bindParam(4, $password, PDO::PARAM_STR);
      $req->bindParam(5, $id, PDO::PARAM_STR);
      $req->execute();

      return "Le compte a été mis à jour.";
    } catch (EXCEPTION $error) {
      return $error->getMessage();
    }

    return '';
  }

  public function getAllActif(): array | string
  {
    try {
      $req = $this->getBdd()->prepare('SELECT id_admin, nom, prenom, email, `password` FROM `admin` WHERE id_status = 1');
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  public function getAllInactif(): array | string
  {
    try {
      $req = $this->getBdd()->prepare('SELECT id_admin, nom, prenom, email, `password` FROM `admin` WHERE id_status = 2');
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
      $req = $this->getBdd()->prepare("SELECT id_admin, nom, prenom, email, `password`, id_status FROM `admin` WHERE id_admin = ? LIMIT 1");
      $id = $this->getId();
      $req->bindParam(1, $id, PDO::PARAM_INT);
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
      $req = $this->getBdd()->prepare("SELECT id_admin, nom, prenom, email, `password`, id_status FROM `admin` WHERE email = ?");
      $email = $this->getEmail();
      $req->bindParam(1, $email, PDO::PARAM_STR);
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  public function delete(): string
  {
    try {
      $req = $this->getBdd()->prepare("UPDATE `admin` SET id_status = 2 WHERE id_admin = ? LIMIT 1");
      $id = $this->getId();
      $req->bindParam(1, $id, PDO::PARAM_INT);
      $req->execute();

      return "L'admin d'id $id a été éfacé.";
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  public function recover(): string
  {
    try {
      $req = $this->getBdd()->prepare("UPDATE `admin` SET id_status = 1 WHERE id_admin = ? LIMIT 1");
      $id = $this->getId();
      $req->bindParam(1, $id, PDO::PARAM_INT);
      $req->execute();

      return "L'admin d'id $id a été réactivé.";
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }
}
