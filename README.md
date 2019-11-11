# Projet Architecture Web Automates Intranet Extranet

Ceci est un projet web pour les étudiants de 5ème année à l'INSA Centre Val de Loire.

Notre site web s'appelle **The Chateau 1997**, il vous permet de surveiller la température de vos salles et de gérer les équipements dans votre maison à distance.

## Lancer le projet

- Télécharger et installer WAMP ou XAMPP
- Clone le projet dans `wamp/www` pour WAMP ou `xampp/htdocs`
- Changer le nom du dossier qui contient le projet à **TheChateau1997**
- Ouvrir votre navigateur et saisir `http://localhost:%PORT%/TheChateau1997/`

## Initialization des dépendances

- Ouvrir `terminal` in *TheChateau1997/* folder et taper

```bash
composer update         # update composer.lock file
composer install        # install dependencies for php
npm install             # install dependencies for javascript
```

pour installer `phpmodbus_master / PHPMailer / Plotly`
