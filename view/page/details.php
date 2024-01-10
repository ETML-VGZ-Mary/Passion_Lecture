<!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	page de détails d'un livre
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
                echo"<h1>" . $oneBook["title"] . "</h1>";

                if($_SESSION["isConnected"]){
                    echo "<a href=\"index.php?controller=page&action=modifyBook&idBook=" . $oneBook["idBook"] . "\"><img class=\"icon\" src=\"resources/image/icons/modify.png\" alt=\"modify\"></a>";
                    echo "<a href=\"#\"><img class=\"icon\" src=\"resources/image/icons/delete.png\" alt=\"delete\"></a>";
                }
            ?>
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
                echo "<input type=\"radio\" name=\"rating-3\" value=\" . $i . \" class=\"mask mask-heart bg-red-500\" />";
            }
            ?>
        </div>

    </div>
</div>
