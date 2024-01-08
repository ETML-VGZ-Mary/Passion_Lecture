 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture"
-->

<?php
// connexion à la BD
include("../Passion_Lecture/model/ModelBook.php");

$dbBook = new ModelBook();
$fiveLastBooks = $dbBook->getNLastBooks(5);

//$controller = new ControllerBook();
//$fiveLastBooks = $dbBook->getNLastBooks(5);
?>

<div class="container" id="containerHomePage">
    <div class="bloc01">
        <h1>Derniers ajouts</h1>
        <div class="newBook">
            <?php
                foreach($fiveLastBooks as $book){
                    echo "<div class=\"oneHomeBook\">";
                        echo "<a href=\"index.php?controller=page&action=details&idBook=" . $book["idBook"] . "\"><img src=\"../resources/image/books/book" . $book["idBook"] .".jpg\" alt=\"imgBook". $book["idBook"] ."\"></a>";
                    echo "<p>" . $book["title"] . "</p>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <div class="bloc02">
        <h3>À propos</h3>
        <br>
        <p>
            Bienvenu à "Passion Lecture" !
        </p>
        <p>
            ------------------------------------------
        </p>
        <p>
            Cette application a été développée par 3 informaticiens de la FIN2 dans le cadre du projet P_WEB02.
            Vous pouvez consulter les ouvrages de la biblithèque triés selon le genre.
        </p>
        <p>
            En vous connectant, vous avez la possibilité d'ajouter vos propres livres et les modifier.
        </p>
        <p>
            "Bonne visite !"
        </p>
    </div>
</div>