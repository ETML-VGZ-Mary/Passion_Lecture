
<?php
include ('../Model/ModelBook.php');


Class ControllerBook {

    private function checkBook($datas)
    {
        $errors = array();

        //Validation des données
        //Vérification du titre 
        if(!isset($datas["title"]) && ctype_alnum($datas["title"]))
        {
            $errors[] = "Le titre doit être rempli et il doit être en caractère alpha-numérique";
        }

        //Vérification du nom de l'auteur
        if(!isset($datas["nameAuthor"]) && ctype_alpha($datas["nameAuthor"]))
        {
            $errors[] = "Le nom de l'auteur doit être saisi et il doit êre en caractères alphabétiques exclusivement";

        }

        //Vérification du prénom de l'auteur
        if(!isset($datas["firstNameAuthor"]) && ctype_alpha($datas["firstNameAuthor"]))
        {
            $errors[] = "Le prénom de l'auteur doit être saisi et il doit êre en caractères alphabétiques exclusivement";
        }

        //Vérification de catégorie
        if(!isset($datas["category"]) && ($datas["category"] === ''))
        {
            $errors[] = "La catégorie doit être choisie";
        }

        //Vérification du nombre de pages
        if(!isset($datas["nbPage"]) && ($datas["nbPage"] < 0))
        {
            $errors[] = "Le nombre de pages doit être saisi et doit être supérieur à 0";
        }

        //Vérification de l'éditeur 
        if(!isset($datas["editor"]) && ctype_alnum($datas["editor"]))
        {
            $errors[] = "Le nom de l'éditeur doit être rempli et doit être en caractère alpha-numérique";
        }

        //Vérification de l'année d'édition
        if(!isset($datas["yearEdit"]) && (!preg_match('/^([0-9]{1,4})$/', $datas["yearEdit"])))
        {
            $errors[] = "L'année d'édition doit être remplie et ne doit que comporter 4 chiffres, comme 1990";
        }

        //Vérification du lien pour l'extrait 
         if(!isset($datas["bookExtract"]) && ($datas["bookExtract"] === ''))
         {
            $errors[] = "L'URL pour un extrait doit être saisi";
         }

         //Vérification du résumé
        if(!isset($datas["resume"]) && ($datas["resume"] === ''))
        {
            $errors[] = "Un résumé doit être rempli";
        }


        // Si données pas ok 
        // retour sur le formulaire
        if (count($errors) > 0)
        {
            foreach($errors as $error) {
                echo $error . "<br>";
            }
            header('location:./addBook.php');
            exit();
        }

    }
    public function addBook($datas) {
        $this->checkBook($datas);
        
        $modelBook = new ModelBook();
        $modelBook->addBook($modelBook);

    }

    public function modifyBook($datas){
        $this->checkBook($datas);

        $modelBook = new ModelBook();
        $modelBook->updateBook($modelBook);

    }

    
}



