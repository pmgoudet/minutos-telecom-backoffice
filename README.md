<h1 align="center">
<img src="assets/img/logo/logo-oficial.png" alt="Logo" width="250px">
</h1>


## 🧪 Tester le projet localement

Vous pouvez tester ce back-office en suivant les étapes ci-dessous :

### 1. 📥 Cloner le dépôt
Commencez par cloner ce dépôt sur votre machine :

```bash
git clone https://github.com/pmgoudet/minutos-backoffice.git
```

### 2.🗄️ Créer la base de données
Créez une base de données MySQL en utilisant les commandes SQL fournies dans le fichier sql_inicial.sql, situé à la racine du projet.

### 3. 🧑‍💻 Créer un compte administrateur
Une fois la base de données créée, vous devez configurer votre compte admin en accédant à :

```arduino
http://localhost/minutos-backoffice/assets/app/controllers/controllerAddAdmin.php
```
> ℹ️ Je suis conscient qu’un bon parcours utilisateur devrait rediriger automatiquement après l’inscription, mais j’ai priorisé le bon fonctionnement du système. Des améliorations UX sont prévues prochainement.

---

### 4. 🔐 Se connecter

Connectez-vous avec les identifiants que vous venez de créer :

```arduino
http://localhost/minutos-backoffice/assets/app/controllers/controllerLoginAdmin.php
```

---

### 5. 🧭 Tester les fonctionnalités

Une fois connecté, vous pouvez accéder à toutes les fonctionnalités disponibles pour les administrateurs :

- Enregistrement des admins  
- Liste filtrée des admins  
- Visualisation et modification des données admins  

> 🚧 Les fonctionnalités destinées aux clients sont encore en développement et ne sont pas disponibles pour le moment.

---



# 🛠️ Minutos Telecom – Backend

Backend PHP orienté objet avec architecture MVC, développé pour le site institutionnel de l'entreprise Minutos Telecom. Ce projet comprend un panneau d'administration avec une authentification sécurisée, un système d'enregistrement et de gestion des clients, ainsi qu'un espace réservé permettant à chaque client d'accéder à ses données en toute sécurité.

> 🔗 Projet front-end disponible ici : [minutos-telecom](https://github.com/pmgoudet/minutos-telecom)

## 📌 À propos du projet

Ce back-end a été développé de zéro en utilisant PHP pur avec une structure modulaire basée sur le modèle **MVC (Model-View-Controller)**. L'objectif principal est :

- **Sécurité** : sessions protégées, validation et hachage des mots de passe.
- **Maintenabilité** : code organisé avec une séparation claire des responsabilités.
- **Scalabilité** : la structure est prête pour de nouvelles fonctionnalités futures.

Pour l'instant, le système est limité par les fonctionnalités décrites ci-dessous, mais il est prévu qu'il s'étende selon le **diagramme de classes**.

## 🔒 Fonctionnalités

### 👨‍💼 Admin
- Authentification avec session sécurisée
- Enregistrement de nouveaux clients
- Liste des clients avec filtre
- Modification et visualisation des données individuelles

### 👤 Client
- Accès aux propres données
- Mise à jour des informations
- Réinitialisation du mot de passe avec vérification

## ⚙️ Technologies utilisées

### 🖥️ Back-end
![PHP](https://img.shields.io/badge/-PHP-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/-MySQL-4479A1?logo=mysql&logoColor=white)

## 🔗 Autres liens
- 🌐 [Mon portfolio complet](https://pedrogoudet.vercel.app/)
- 🧑‍💼 [Mon profil LinkedIn](https://www.linkedin.com/in/pmgoudet)
