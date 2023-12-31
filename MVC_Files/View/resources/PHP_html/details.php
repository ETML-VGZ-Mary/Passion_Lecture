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
        <div class="page-part1">
            <div class="book-name">
                <?php
                    echo"<h2>" . $oneBook["title"] . "</h2>";
                ?>
                <a href="#"><img class="icon" src="../Img/icons/modify.png" alt="modify"></a>
                <a href="#"><img class="icon" src="../Img/icons/delete.png" alt="delete"></a>
            </div>
            <div class="book-details">
                <h2><?=$oneBook["idCategory"]?> - Nombres de pages: <?=$oneBook["nbPage"]?></h2>
            </div>
            <div class="book-info">
                <h2><?=""?> John Doe - </h2>
                <h2> <?=$oneBook["editor"]?> - </h2>
                <h2> <?=$oneBook["yearEdit"]?></h2>
            </div>
            <div class="book-resume">
                <h2>Résumé</h2>
                <p class="resume">
                    <?=$oneBook["resume"]?>
                </p>
                <p class="extrait">Extrait</p>
            </div>
        </div>
        <div class="page-part2">
            <img class="book-image" src="../Img/books/livre01.jpg" alt="livre01">
             <div class="rating gap-1">
                <label>Note : </label>
                <?php
                for($i=0 ; $i < 5; $i++){
                    echo "<input type=\"radio\" name=\"rating-" . $i . "\" class=\"mask mask-heart text-red-400\" />";
                }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>

</body>

</html>