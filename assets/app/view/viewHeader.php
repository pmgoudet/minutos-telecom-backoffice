<?php

class viewHeader
{

    private ?string $titre = '';
    private ?string $nom = '';

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function displayView(): string
    {

        if (isset($_SESSION['id_admin']) || isset($_SESSION['id_client'])) {
            return ('
            <!DOCTYPE html>
            <html lang="pt-br">

            <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" href="../../img/icon/favicon-minutos-telecom.webp" type="image/x-icon" />
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
                href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
                rel="stylesheet" />
            <link rel="stylesheet" href="../../css/reset.css" />
            <link rel="stylesheet" href="../../css/style_backoffice.css" />
            <title>Área do Admin - Minutos Telecom</title>
            <meta name="description"
                content="Projetos referência em internet empresarial. Excelência e preço justo. Alto desempenho e suporte técnico rápido." />
            </head>

            <body>
            <header class="header-container">
                <div class="header__logo-container">
                <h1 class="header__logo">
                    <a href="../../../index.html"><img class="header__logo-logo__connect"
                        src="../../img/logo/logotipo-fundo-escuro-minutos-telecom.png" alt="Logotipo Minutos Telecom" /></a>
                </h1>
                </div>
            </header>
                <main>
            <section class="banner-container">
            <div class="banner-img_connect"></div>
            <div class="banner-txt banner-txt_connect">
            <div class="banner-txt-container banner-txt-container_connect">
            <div class="banner-txt-container__title-flex">
                <h1 class="banner-txt__title">Espace Admin</h1>
                <img class="banner-txt__icon" src="../../img/icon/area-do-cliente-icon-minutos-telecom.svg" />
            </div>
            <p class="banner-txt__texto">Bonjour, <strong>' . $_SESSION['prenom'] . '</strong></p>
            <a class="banner-txt__btn banner-txt__btn_connect" href="./deco.php">
                Déconnexion
                <img class="banner-txt__btn__icon" src="../../img/icon/logout-icon-minutos-telecom.svg"
                alt="Ícone de Desconectar" />
            </a>
            </div>
            </div>
            </section>
            ');
        } else {
            return '
            <!DOCTYPE html>
            <html lang="pt-br">

            <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" href="../../img/icon/favicon-minutos-telecom.webp" type="image/x-icon" />
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
                href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
                rel="stylesheet" />
            <link rel="stylesheet" href="../../css/reset.css" />
            <link rel="stylesheet" href="../../css/style_backoffice.css" />
            <title>Área do Admin - Minutos Telecom</title>
            <meta name="description"
                content="Projetos referência em internet empresarial. Excelência e preço justo. Alto desempenho e suporte técnico rápido." />
            </head>

            <body>
            <header class="header-container">
                <div class="header__logo-container">
                <h1 class="header__logo">
                    <a href="../../../index.html"><img class="header__logo-logo__connect"
                        src="../../img/logo/logotipo-fundo-escuro-minutos-telecom.png" alt="Logotipo Minutos Telecom" /></a>
                </h1>
                </div>
            </header>
            <main>
                <section class="banner-container">
                <div class="banner-img"></div>
                <div class="banner-txt">
                    <div class="banner-txt-container">
                    <div class="banner-txt-container__title-flex">
                        <h1 class="banner-txt__title">Área do Admin</h1>
                        <img class="banner-txt__icon" src="../../img/icon/area-do-cliente-icon-minutos-telecom.svg" />
                    </div>
                    <p class="banner-txt__texto">
                        Bem-vindo, <strong>Minutos</strong>.
                    </p>
                    </div>
                </div>
                </section>
            ';
        }
    }
}
