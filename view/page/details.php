<!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture" 
-->

<?php
// connexion à la BD
include("model/ModelBook.php");
include("model/ModelAuthor.php");

$db3 = new ModelBook();
$oneBook = $db3->getOneBookGW($_GET["idBook"]);

?>

<div class="container" id="containerBookInfos">
    <div class="page-part1">
        <div class="book-name">
            <?php
                echo"<h2>" . $oneBook["title"] . "</h2>";
            ?>
            <a href="#"><img class="icon" src="resources/image/icons/modify.png" alt="modify"></a>
            <a href="#"><img class="icon" src="resources/image/icons/delete.png" alt="delete"></a>
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
        
        <?php
            echo "<img class=\"book-image\" src=\"resources/image/books/book" . $oneBook["idBook"] . ".jpg\" alt=\"img book " . $oneBook["idBook"] ."\">";
        ?>

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
