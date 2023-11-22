# Passion_Lecture
Site web qui permet de partager sa passion pour la lecture et évaluer des ouvrages lus. /n
7 CAHIER DES CHARGES
7.1 Objectif et portée du projet (objectifs SMART)
Ce projet vise à mettre en œuvre les connaissances apprises dans les modules 133 
et 151, qui se déroulent en parallèle au projet.
Au final, l’application réalisée devra être exploitable et livrable. Dès lors, on attend 
un rendu professionnel et un soin particulier dans la documentation du projet.
7.2 Maquette graphique
Le graphisme doit respecter les concepts appris durant votre formation. De plus, le 
Framework Bootstrap ou Tailwind peut être utilisé.
7.3 Bonnes pratiques de développement
Pour ce projet, vous devez travailler à plusieurs sur la même base de code.
L’utilisation de git et github est obligatoire.
7.4 Ecoconception Web 
Votre application comprendra au moins un point d'écoconception Web. Il devra 
être argumenté lors de l'auto-évaluation finale.
Aide : Livre Eco-conception web : les 115 bonnes pratiques.
7.5 Fonctionnalités requises (du point de vue du client)
Le site web / application aura les pages suivantes :
• Une page d’accueil comprenant une explication de l’utilité du site ainsi que 
les cinq derniers ouvrages ajoutés (accès tout public).
• Une page comprenant la liste des ouvrages par catégorie (accès tout 
public avec restrictions sur les liens). L’utilisateur doit pouvoir effectuer une 
recherche d’ouvrages dans cette page.
• Une page d’ajout d’un ouvrage (accès utilisateur).
• Une page de modification d’un ouvrage (accès utilisateur pour ses 
ouvrages)
• La suppression d’un ouvrage (accès utilisateur pour ses ouvrages) doit être 
implémentée
• Une page permettant d’ajouter une appréciation à un ouvrage (accès 
utilisateur).
• L’utilisateur admin peut réaliser toutes les actions sur toutes les données
PS : le pied-de page du site doit faire mention des personnes qui ont créé 
l’application ainsi que le moyen de la contacter. 
7.6 Détails des vues
Ce site web permet de visualiser la liste des ouvrages stockés dans une base de 
données, de pouvoir en ajouter, en modifier et en supprimer.
Un ouvrage est représenté par diverses informations, notamment : 
ETML P_WEB2
E-P_Web2-AMG001-CdC.docx Version 1.3 du 21.11.2023 Auteur : AMG
Mise à jour : GCR Page 3 sur 5 Imprimé le 21.11.2023
• Un titre
• Une catégorie (bande dessinée, manga, roman, livre etc.)
• Un nombre de pages
• Un extrait (lien relatif vers un fichier pdf d’une page de l’ouvrage)
• Un résumé de l’ouvrage
• Les nom et prénom de l’écrivain qui est l’auteur de l’ouvrage
• Le nom de l’éditeur
• L’année d’édition
• La moyenne des appréciations des utilisateurs
• Une image de couverture
Un utilisateur est défini par un pseudo, une date d'entrée dans le site, du nombre 
d’ouvrages proposés et du nombre d'appréciations faites.
Une appréciation pour un ouvrage consiste à lui attribuer une note parmi la liste 
suivante : {0, 1, 2, 3, 4, et 5}
Vue liste
Sur la page de la liste des ouvrages, il doit être possible de visualiser le titre, l’auteur 
ainsi que le pseudo de la personne qui a posté l’ouvrage. Ceci doit être possible 
par catégorie.
Pour chaque ouvrage, il est possible en cliquant sur le titre ou le pseudo, de voir les 
détails de l’ouvrage ou de la personne.
Vue détail (accessible seulement pour les membres connectés ou les admin)
Pour l’ouvrage, il est possible de voir les informations, le nombre d'appréciations
ainsi que la moyenne obtenue.
Pour la personne, il est possible de voir les informations, le nombre d’ouvrages 
proposés.
7.7 Travail à réaliser par les apprentis dans le cadre de ce projet
Les parties suivantes doivent figurer dans le rapport1 du projet :
• Introduction 
Comprend une brève explication du projet (½ page)2
• Analyse 
 1 La documentation est écrite en police Century Gothic et avec une taille de 11. Les titres des différentes parties 
sont écrits en police Century Gothic et avec une taille de 14. Les sous-titres sont écrits en police Century Gothic 
et avec une taille de 12. Les notes de bas de page seront utilisées à bon escient. Toutes les sources seront 
citées.
2 Le nombre de page en () est le minimum à effectuer.
ETML P_WEB2
E-P_Web2-AMG001-CdC.docx Version 1.3 du 21.11.2023 Auteur : AMG
Mise à jour : GCR Page 4 sur 5 Imprimé le 21.11.2023
Contiendra une analyse quant à la réalisation et à la mise en page 
du HTML (1 page)
Contiendra une analyse de de la base de données à réaliser (MCD, 
MLD, MPD) (1 page)
Contiendra une analyse de la structure du code qui sera effectuée 
(Schéma UML, organisation du code …) (2 pages)
• Réalisation
Comprend une explication de la mise en place de l’authentification
(1 page)
Comprend une explication des mesures prises pour les aspects de 
sécurité.
Comprend une explication sur l’appréciation moyenne d’un ouvrage
(1/2 page)
Comprend un manuel d’utilisation du site du point de vue admin ou 
utilisateur (comment ajouter, modifier, supprimer un ouvrage, 
comment ajouter une appréciation) (2 pages)
• Test
Comprend une explication des tests réalisés (Unit Test) (1 page)
• Conclusion
Comprend une conclusion générale sur le projet (½ page)
Comprend une conclusion personnelle sur le projet (½ page)
Comprend une critique constructive sur la planification du projet (½ 
page)
• Webographie / Bibliographique / Glossaire
Concernant la méthode de projet, elle devra être cité et expliqué dans le rapport.
7.8 Technologies
Pour réaliser ce projet, vous devez utiliser PHP (Version 8) et MySQL.
L’utilisation du Framework Laravel peut est autorisée après discussion avec votre 
enseignant.
Dans les 2 cas (avec ou sans Framework Laravel), il est fortement recommandé de 
réaliser l’application en utilisant le pattern MVC.
7.9 Si le temps le permet …
Attention : cette rubrique est facultative, elle ne va pas influencer la note finale du 
projet.
ETML P_WEB2
E-P_Web2-AMG001-CdC.docx Version 1.3 du 21.11.2023 Auteur : AMG
Mise à jour : GCR Page 5 sur 5 Imprimé le 21.11.2023
Si le temps le permet, vous pouvez :
- Ajout d’une personne
- Ajout d’un commentaire accompagnant une appréciation
- Rendre l’application responsive
- Intégration Continue : Exécuter les tests unitaires par un CI (GitHub Actions
par exemple)
- Déployer votre application sur un serveur (de l’école ou externe)
