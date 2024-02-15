## Formulaire d'Authentification

Ce projet est la création d'un formulaire d'authentification simple en HTML, PHP et CSS. Il permet aux utilisateurs de se connecter et de créer un compte. Le système stocke les informations dans une base de données MySQL.

### Fichiers concernés

- `index.html`: Le formulaire d'authentification en HTML.
- `controller.php`: Le script PHP qui gère la logique d'authentification et d'ajout de compte.
- `styles.css`: Feuille de style CSS pour le formulaire.
- `styles1.css`: Feuille de style CSS pour la page de succès (à personnaliser).

### Comment utiliser

1. Assurez-vous d'avoir un serveur web local (comme Apache) et PHP installés sur votre machine.

2. Créez une base de données MySQL sur votre serveur local. Dans le code, une base de données `utilisateur` a été mise en place.

3. Modifiez les paramètres de connexion à la base de données dans le fichier `controller.php` si nécessaire.

4. Lancez votre serveur web local.

5. Accédez au formulaire en ouvrant le navigateur et en visitant `http://localhost/chemin/vers/index.html`.

6. Utilisez le formulaire pour vous connecter ou créer un nouveau compte.

### Fonctionnalités

- **Connexion (Bouton "Ok"):** Vérifie l'identifiant et le mot de passe dans la base de données. Affiche un message approprié.

- **Ajout de Compte (Bouton "Ajout Compte"):** Ajoute un nouvel utilisateur à la base de données. Vérifie d'abord si l'identifiant est déjà utilisé. Affiche un message qui dépendant de l'identifiant (existant ou pas).

### Remarques

- Assurez-vous que les fichiers `index.html`, `controller.php`, `styles.css`, et `styles1.css` sont dans le même répertoire.

- Personnalisez les fichiers CSS (`styles.css` et `styles1.css`) pour adapter le style à vos besoins.

- N'oubliez pas de sécuriser l'accès à la base de données en production et de traiter les mots de passe de manière sécurisée.
