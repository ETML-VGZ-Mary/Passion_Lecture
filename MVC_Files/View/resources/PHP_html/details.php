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
$oneBook = $db3->getOneBookGW(1);
/*
$db4 = new ModelAuthor();
//$cat = $cat->getOneCat($book["idCategory"]);
//$auteur = $auteur->getOneAuthor($book["idBook"]);
*/

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/app.css" rel="stylesheet" media="screen"/>
    <title>Passion Lecture</title>
</head>

<body>

    <header>
        <?php
            include("header.inc.php");
        ?>
    </header>

    <div class="container-details">
        <di class="book-info">
            <div class="book-name">
                <?php
                    echo"<h2>" . $oneBook["title"] . "</h2>";
                ?>
                <a href="#"><img src="../Img/icons/modify.png" alt="modify"></a>
                <a href=""><img src="../Img/icons/delete.png" alt="delete"></a>
            </div>
            <div class="book-name">
                <h2>catégorie</h2>
                <h2>nb page</h2>
            </div>
            <div class="book-details">
                <h2>auteur</h2>
                <h2>editeur</h2>
                <h2>années</h2>
            </div>
            <div class="book-resume">
                <h2>résumé</h2>
                <p>
                blablablablablablablablablablablablablablablablablablablablablabla
                blablablablablablablablablablablablablablablablablablablablablabla
                blablablablablablablablablablablablablablablablablablablablablabla
                blablablablablablablablablablablablablablablablablablablablablabla
                blablablablablablablablablablablablablablablablablablablablablabla
                </p>
                <p>Extrait</p>
            </div>
        </div>
        <div class="book-img">
            <img src="../Img/books/livre01.jpg" alt="livre01">
        </div>
        

            
    </div>

    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>

</body>

</html>