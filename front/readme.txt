démarche :

1) mise en place du projet

créer votre repertoire projet et installer angular et bootstrap à l'aide de bower

bower install angular bootstrap

inclure les fichiers bootstrap.min.js angular.min.js dans votre index.php

2) structure du projet

index.php
app
	images
	scripts
		app.js
		controllers
			controller.js
	styles
		author.css
	views
		authors.html
		author.html
		edit_author.html
		home.html
bower_components
services
	api.php
	auteur.sql
	auteurs.json
	dbConnect.php

3) install angular-route et configuration des routes

bower install angular-route
inclure angular-route.min.js dans index.php

4) ecrire le controlleur authorCtrl 

récupérer tous les auteurs
utiliser le service app/services/api.php avec parametre {method : 'getAuthors'}

afficher les auteurs dans la template authors.html sous forme de tableau

5) supprimer un auteur

utiliser le service app/services/api.php avec parametre {method : 'deleteAuthor' , id_auteur:id}

6) voir un auteur

mettre des liens avec l'id de l'utilisateur pour voir le detail d'un auteur

ecrire le controlleur authorCtrl
recuperer les informations d'un auteur à l'aide de son id ($routeParams pour récupérer l'id de l'url)
	utiliser le service app/services/api.php avec parametre {method : 'getAuthorById' , id_auteur:id}

remplir la template author.html
mettre un bouton de retour dans author.html

7) ajouter un auteur

ajouter un formulaire dans authors.html comportants 3 champs de saisie et un button de type submit
utiliser novalidate dans la balise form pour désactiver le comportement du html5 sur la validation

les trois champs sont requis (requiered)

desactiver le bouton de soumissions si tous les champs ne sont pas remplis (ng-disabled="authorForm.$invalid")

définir la fonction add dans le controller authorCtrl
untiliser le service app/services/api.php avec
parametre {method: addAuthor, nom:xxx, prenom:xxx, fonction:xxx}

8) modifier un auteur
definir dans app.js une url pour rediriger vers edit_author.html
définir le controlleur homeCtrl pour la page d'accueil
modifier home.html
mettre un lien au niveau du bouton modifier de authos.html
modifier edit_author.html pour mettre en place le formulaire de modification

