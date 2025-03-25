# Projet de Messagerie Instantanée

## Description

Ce projet consiste à développer une application de messagerie instantanée utilisant **Ajax**, **JQuery**, **PHP** et une **base de données MySQL**. L'application permet aux utilisateurs d'écrire, envoyer et afficher des messages en temps réel.

### Fonctionnalités :
- Envoi de messages textuels avec un auteur et un contenu.
- Affichage en temps réel des messages dans le navigateur via des requêtes Ajax.
- Enregistrement et récupération des messages à l'aide de scripts PHP.
- Interface web permettant l'envoi et l'affichage des messages.
- Support de l’envoi de message via la touche **Entrée**.

### Bonus :
- Authentification des utilisateurs via une page de connexion.

---

## Prérequis

- Serveur Apache avec PHP installé.
- Serveur de base de données MySQL.
- JQuery et Ajax pour la gestion dynamique des messages.

---

## Installation

### Étape 1 : Créer la base de données

Dans votre terminal MySQL, exécutez le script SQL "projetr4a10.sql" pour créer la base de données et la table des messages et des users.

### Étape 2 : Configuration du serveur PHP et MySQL

1. Déployez le projet sur un serveur local ou distant avec **Apache** et **PHP**.
2. Assurez-vous que **PHP** a les extensions nécessaires pour se connecter à **MySQL** (par exemple, `mysqli`).
3. Mettez à jour les paramètres de connexion dans les fichiers PHP (`enregistrer.php` et `recuperer.php`) pour vous connecter à votre base de données MySQL.

### Étape 3 : Lancer l'application

1. Placez le dossier du projet dans le répertoire de votre serveur Apache (par exemple, `htdocs` si vous utilisez XAMPP).
2. Ouvrez `index.html` dans votre navigateur.

---

## Utilisation

1. **Envoyer un message** : 
   - Entrez votre message dans la zone de texte.
   - Cliquez sur **Envoyer** ou appuyez sur **Entrée** pour envoyer.
   - Le message sera enregistré dans la base de données et s'affichera dans l'interface.

2. **Affichage en temps réel** :
   - La page récupère automatiquement les 10 derniers messages toutes les 2 secondes.
   - Les anciens messages ne sont pas supprimés et aucun doublon n'est affiché.

3. **Authentification** (Bonus) :
   - Une page de connexion peut être ajoutée pour permettre aux utilisateurs de se connecter avant d'envoyer des messages.

---

## Technologies utilisées

- **Frontend** : HTML, CSS, JavaScript, JQuery
- **Backend** : PHP
- **Base de données** : MySQL

---

# Membres

| Developer                                                | Developer                                |
| -------------------------------------------------------- | ---------------------------------------- |
| ALLART Matheo                                         | POUX--BORIES Yoan                        |
| matheo.allarte@etu.iut-tlse3.fr                        | yoan.poux-bories@etu.iut-tlse3.fr        |
| [@Mallart](https://github.com/Mallart) | [@YoanPOUX](https://github.com/YoanPOUX) |