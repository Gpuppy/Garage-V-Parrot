# Garage-V-Parrot
Garage de réparation, de changement de pièces et de vente de voiture. 

Il y a également une section sécurisé reservé aux administrateurs qui peuvent créer faire des mises a jour ou éffacer des produits. Ils peuvent également gérer les avis clients. 

C'est une application développé avec Symfony 6.4

version en ligne : https://garage-v-parrot-bedb67e61f3a.herokuapp.com/

Prérequis
Afin de pouvoir exécuter l'application sur votre poste en local, vous devez d'aborder installer les dépendances suivantes :

*Git
*Php 8.1+
*Symfony 6.4
*Composer
*Serveur XAMPP ou autre
*Un gestionnaire de base de base de données MySQL, phpMyAdmin pour ma part

Installation

1. Cloner le dépot: git clone https://github.com/Gpuppy/Garrage-V-Parrot.git
2. Installer les dépendances avec un: symfony new --full 'my_projet'
3. Configurer l'environnement locale en modifiant le fichier .env et créer un fichier .env.local:
   DATABASE_URL=sql ‘mysql://root@127.0.0.1:3306/my_project’
4. Mise a jour de symfony cli : 'scoop install symfony-cli '
5. Installer webpack: ‘composer require symfony/webpack-encore-bundle’
6. Créer la base de données : ‘php bin/console doctrine:database:create’
7. Lancer la migration pour créer les tableaux en base de données: 'php bin/console make:migration'
8. Lancer l'application en local avec un : 'symfony server:start'
