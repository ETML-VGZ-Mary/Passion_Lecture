 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture" 
-->

<?php
// connexion à la BD
include("../../../Model/ModelBook.php");
include("../../../Model/ModelAuthor.php");
/*
$book = new ModelBook();
$auteur = new ModelAuthor();

$bookPage = $book->getOneBook($bookPage["idBook"]);
$cat = $cat->getOneCat($book["idCategory"]);
//$auteur = $auteur->getOneAuthor($book["idBook"]);
*/
$db3 = new ModelBook();
$oneBook = $db3->getOneBookGW(1); // id entrée en "dure"
/*
$db4 = new ModelAuthor();
//$cat = $cat->getOneCat($book["idCategory"]);
//$auteur = $auteur->getOneAuthor($book["idBook"]);
*/

//$book = $book->getOneBook($book["idBook"]);
//$cat = $cat->getOneCat($bookPage["idCategory"]);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/app.css">
    <link href="../CSS/app.css" rel="stylesheet" media="screen"/>
    <title>Ajouter un livre</title>
</head>
<body>
    <header>
        <?php
            include("header.inc.php");
        ?>
    </header>

    <div class="container">
        <h1>Ajouter un livre</h1>

        <form action="checkAddBook.php" method="post" class="book"  id="formAddBook" enctype="multipart/form-data">
                    
            <div class="form-data">
                <label class="accountMetaData" for="title" >Titre :</label>
                <input type="text" name="title" id="title" value="">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="nameAuthor" >Nom auteur :</label>
                <input type="text" name="nameAuthor" id="nameAuthor" value="">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="firstNameAuthor"> Prénom auteur :</label>
                <input type="text" name="firstNameAuthor" id="firstNameAuthor" value="">
            </div>
                
            
            <div class="form-data"> <!-- UTILISER LA METHODE APPROPRIÉE POUR LA LISTE DES CATEGORIES-->
                <label class="accountMetaData" for="category">Catégories :</label>
                <select name="category" id="category">
                    <option value=""></option>
                    <option value="romance">Romance</option>
                    <option value="horror">Horreur</option>
                    <option value="fantasy">Fantaisie</option>
                </select>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="nbPage">Nombres de pages :</label> 
                <input type="number" name="nbPage" id="nbPage" min ="1">
            </div>
            
            <div class="form-data">
                <label class="accountMetaData" for="editor">Editeur :</label>
                <input type="text" name="editor" id="editor" value="">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="yearEdit">Année d'édition :</label>
                <input type="text" name="yearEdit" id="yearEdit" value="">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="pictureCover">Couverture :</label>
                <input type="file" name="pictureCover" id="pictureCover" value="Charger un fichier .png"/>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="bookExtract">Extrait du livre :</label>
                <input type="text" name="bookExtract" id="bookExtract" value="Lien URL vers un extrait">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="resume">Résumé :</label>
                <textarea name="resume" id="resume" cols="30" rows="10"></textarea>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="btnSubmit"></label>
                <input class="bg-gray-300 hover:bg-gray-400 h-10 w-16" type="submit" name="btnSubmit" id="btnSubmit" value="Ajouter">
            </div>
        </form>
    </div>
    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>
</body>
</html>