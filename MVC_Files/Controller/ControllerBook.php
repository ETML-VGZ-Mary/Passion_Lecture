<?php
include ('../Model/ModelBook.php');

Class ControllerBook {

    private function checkBook($datas)
    {
        //Validation des données
        //Vérification du titre 
        if(!isset($datas["title"]) && ctype_alnum($datas["title"]))
        {
            echo "Le titre doit être rempli et il doit être en caractère alpha-numérique";
        }

        //Vérification du nom de l'auteur
        if(!isset($datas["nameAuthor"]) && ctype_alpha($datas["nameAuthor"]))
        {
            echo "Le nom de l'auteur doit être saisi et il doit êre en caractères alphabétiques exclusivement";

        }

        //Vérification du prénom de l'auteur
        if(!isset($datas["firstNameAuthor"]) && ctype_alpha($datas["firstNameAuthor"]))
        {
            echo "Le prénom de l'auteur doit être saisi et il doit êre en caractères alphabétiques exclusivement";

        }

        //Vérification de catégorie
        if(!isset($datas["category"]) && ($datas["category"] === ''))
        {
            echo "La catégorie doit être choisie";
        }

        //Vérification du nombre de pages
        if(!isset($datas["nbPage"]) && ($datas["nbPage"] < 0))
        {
            echo "Le nombre de pages doit être saisi et doit être supérieur à 0";
        }

        //Vérification de l'éditeur 
        if(!isset($datas["editor"]) && ctype_alnum($datas["editor"]))
        {
            echo "Le nom de l'éditeur doit être rempli et doit être en caractère alpha-numérique";
        }

        //Vérification de l'année d'édition
        if(!isset($datas["yearEdit"]) && (!preg_match('/^([0-9]{1,4})$/', $datas["yearEdit"])))
        {
            echo "L'année d'édition doit être remplie et ne doit que comporter 4 chiffres, comme 1990";
        }

        //Vérification du lien pour l'extrait 
         if(!isset($datas["bookExtract"]) && ($datas["bookExtract"] === ''))
         {
             echo "L'URL pour un extrait doit être saisi";
         }

         //Vérification du résumé
        if(!isset($datas["resume"]) && ($datas["resume"] === ''))
        {
            echo "Un résumé doit être rempli";
        }


        // Si données pas ok 
        // retour sur le formulaire

    }

    public function addBook($datas) {
        $this->checkBook($datas);

        // Appel ModelBook pour INSERT

    }
}



