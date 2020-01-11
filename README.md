# Projet Architecture Web Automates Intranet Extranet

Ceci est un projet web pour les étudiants de 5ème année à l'INSA Centre Val de Loire.

Notre site web s'appelle **The Chateau 1997**, il vous permet de surveiller la température de vos salles et de gérer les équipements dans votre maison à distance par un ordinateur ou un raspberry PI connecté un automate.

## Lancer le projet

- Télécharger et installer WAMP ou XAMPP
- Clone le projet dans `wamp/www` pour WAMP ou `xampp/htdocs`
- Changer le nom du dossier qui contient le projet à **TheChateau1997**
- Ouvrir votre navigateur et saisir `http://localhost:%PORT%/TheChateau1997/`

## Ajouter base de donnée

- Lancer le navigateur et entrer `http://localhost:8088/phpmyadmin/`
- Cliquer `New` et entrer l'onglet `SQL`
- Ajouter le code ci-dessous pour ajouter la base de donnée de `login`:

```bash
CREATE DATABASE IF NOT EXISTS `authentification` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `authentification`;
 
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomutilisateur` varchar(30) NOT NULL,
  `motcle` varchar(30) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
```

## Télécharger npm

For Linux user

```bash
curl https://www.npmjs.com/install.sh | sudo sh
```

## Télécharger Composer

- Sur linux, on suive les lignes de commande suivants:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
```

- Sur Windows, on télécharge `Composer-Setup.exe` sur ce lien `https://getcomposer.org/download/`

## Initialization des dépendances

- Ouvrir `terminal` in *TheChateau1997/* folder et taper

```bash
composer update         # update composer.lock file
composer install        # install dependencies for php
npm install             # install dependencies for javascript
```

pour installer `phpmodbus_master / PHPMailer / Plotly`
