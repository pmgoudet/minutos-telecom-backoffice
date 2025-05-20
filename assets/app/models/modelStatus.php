<?php

class ModelStatus
{
  private PDO $bdd;


  //CONSTRUCT

  public function __construct()
  {
    $this->bdd = connect();
  }

  //GETTER ET SETTER

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

  public function getAll(): array
  {
    $req = $this->bdd->prepare("SELECT * FROM status");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById(): array | string
  {
    try {
      $req = $this->getBdd()->prepare("SELECT id_status, nom_status` FROM `status` WHERE id_status = ?");
      //! $id = $this->getIdStatus();
      $req->bindParam(1, $id, PDO::PARAM_STR);
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }
}



// public function getStatusNameById(int $id): ?string
// {
//   $req = $this->bdd->prepare("SELECT nom_status FROM status WHERE id_status = ?");
//   $req->execute([$id]);
//   $result = $req->fetch(PDO::FETCH_ASSOC);
//   return $result['nom_status'] ?? null;
// }

// public function isActive(int $id): bool
// {
//   return $id === 1; // ou verifica o nome do status, se preferir
// }