
# la bibliothèque en ligne 

# Commencer
Ces instructions vous permettront d'obtenir une copie du projet sur votre ordinateur local à des fins de développement et de test. Voir déploiement pour des notes sur la façon de déployer le projet sur un système actif.

## note codeClimate
[![Maintainability](https://api.codeclimate.com/v1/badges/d4cfbe2a4d214b9d2653/maintainability)](https://codeclimate.com/github/chaigwen-2906/bibliotheque-en-ligne/maintainability)


## Langage utilisé
* HTML5
* CSS3
* JAVASCRIPT
* PHP
* JQUERY
* AJAX
* API

## Description du projet
Ce projet est une bibliothèque en ligne pour mon projet de fin d'année

# Déploiement

POUR INSTALLLER LOCALEMENT LE PROJET :
Vous devez disposer d'un environnement Wamp ou Lamp composé d'un serveur Apache (v2.4.35 min), d'un serveur Php (v7.2.19 min) et d'un serveur Mysq (v5.7.24 min)

Récupérer le projet à partir de l'espace GitHub : https://github.com/chaigwen-2906/bibliotheque-en-ligne

Coller l'ensemble du répertoire projet à la racine du répertoire de publication de votre serveur Apache (répertoire www).

Le projet contient un répertoire "baseDeDonne" contenant un diagramme de la base et l'export SQL de la structure des tables et des données de base.
Se connecter à mysql avec le user root. Créer la base de données en important le fichier "Export.sql" (il n'est pas nécessaire de créer la base préalablement. L'instruction CREATE DATABASE est comprise dans le fichier).
Si vous avez défini un mot de passe pour l'utilisateur Mysql root, Vous devez modifier les chaines de connexions à la base de données présentent dans les fichiers:
- app\Models\admin\objets\Manager.php
- app\Models\admin\Manager.php
- app\Models\front\Manager.php

Pour accéder au front de l'application : ouvrir un navigateur et saisir l'adresse http://localhost/bibliotheque_en_ligne/front-home. Pour pouvoir procéder à la réservation d'un livre, valider votre panier, ou pour pouvoir commenter un livre, vous devez disposer d'un compte et être connecté nominativement. Nous vous invitons à créer votre compte pour pouvoir accéder aux différentes fonctionnalités.

Pour accéder au backend de gestion de l'application, ouvrir un navigateur et saisir l'adresse http://localhost/bibliotheque_en_ligne/admin-home. Pour accéder à cet espace d'administration, vous devez disposer d'identifiants (Nom d'utilisateur : gwen - mot de passe : toto).


POUR CONSULTER LE SITE EN LIGNE:
Le site "bibliotheque en ligne" est publié sur un serveur accessible sur la zone internet.
Pour acceder au front de l'application : ouvrir un navigateur et saisir l'adresse http://chaigwen.alwaysdata.net/bibliotheque_en_ligne/front-home.
Pour accéder au backend de gestion de l'application, ouvrir un navigateur et saisir l'adresse http://chaigwen.alwaysdata.net/bibliotheque_en_ligne/admin-home. Pour accéder à cet espace d'administration, vous devez disposer d'identifiants (Nom d'utilisateur : gwen - mot de passe : toto).


# Auteurs
Lemoine gwénola - chaigwen@hotmail.fr

# Remerciements
Je remercie l'ensemble des formateurs du Greta qui m'ont accompagnée sur ce projet.
