<!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	page affichant la liste des livres enregistrées et groupés selon la catégorie
-->


<?php

include("../Passion_Lecture/model/ModelBook.php");

$db2 = new ModelBook();
$books = $db2->getAllBooks();
$categories = $db2->getAllCategories();
?>

<div class="container">
    <h1>Bibliothèque</h1>

    <!--barre de recherche-->
    <div class="research-bar">
        <input type="text" placeholder="Recherche...">
        <button type="submit"><img src="resources/image/icons/research.png" alt="research-icon"></button>
    </div>
    
    <form action="#" method="post">
        <?php
            foreach($categories as $categorie) {
                
                echo "<h4>" . $categorie["label"] . "</h4>";

                echo "<div class=\"box-same-category-books\">";

                    foreach($books as $book) {
                    
                        if($book["idCategory"] == $categorie["idCategory"]){
                            
                            echo "<div class=\"box-book\">";
                                echo "<a href=\"index.php?controller=page&action=home?idBook=" . $book["idBook"] . "\"><img src=\"resources/image/books/book" . $book["idBook"] . ".jpg\" alt=\"image" . $book["idBook"] . " \"></a>";
                                echo "<p>" . $book["title"] . "</p>";
                            echo "</div>";
                        }
                    } 

                echo "</div>";
            }    
        ?>
    </form>
</div>
