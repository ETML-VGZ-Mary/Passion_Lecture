<!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	page affichant la liste des livres enregistrées et groupés selon la catégorie
-->


<?php

include("../Passion_Lecture/model/ModelBook.php");
include("../Passion_Lecture/model/ModelSearch.php");
$modelSearch = new ModelSearch();

$db2 = new ModelBook();
$books = $db2->getAllBooks();
$categories = $db2->getAllCategories();

if(!isset($_GET["searchQuery"])){
    $_GET["searchQuery"] = "null";
}
?>

<div class="container">
    <h1>Bibliothèque</h1>

    <!--barre de recherche-->
    <div class="research-bar">
        <?="<form action=\"index.php?controller=page&action=listBook&searchQuery=" . $_GET["searchQuery"] . "\" method=\"post\">"?>
            <input type="search" name="searchQuery" placeholder="Rechercher un livre">
            <input type="submit" value="Valider">
        </form>
    </div>
    <?php 
        if(isset($_GET["searchQuery"]) && !empty($_GET["searchQuery"]))
        {
            $query = $_GET["searchQuery"];
            $results = $modelSearch-> searchBook($query);

            echo"<h2>Résultats de votre recherche :</h2>";
                if(!empty($results)){
                foreach($results as $book)
                {   
                        echo "<div class=\"box-book\">";
                            echo "<a href=\"details.php?idBook=" . $book["idBook"] . "\"><img src=\"../Img/books/book" . $book["idBook"] . ".jpg\" alt=\"image01\"></a>";
                            echo "<p>" . $book["title"] . "</p>";
                        echo "</div>";
                    }
                }
                else 
                {
                    echo "<p>Aucun résultat trouvé.</p>";
                }
        }
    ?>


    
    <form action="#" method="post">
        <?php
            foreach($categories as $categorie) {
                
                echo "<h4>" . $categorie["label"] . "</h4>";

                echo "<div class=\"box-same-category-books\">";

                    foreach($books as $book) {
                    
                        if($book["idCategory"] == $categorie["idCategory"]){
                            
                            echo "<div class=\"box-book\">";
                                echo "<a href=\"index.php?controller=page&action=details&idBook=" . $book["idBook"] . "\"><img src=\"resources/image/books/book" . $book["idBook"] . ".jpg\" alt=\"image" . $book["idBook"] . " \"></a>";
                                echo "<p>" . $book["title"] . "</p>";
                            echo "</div>";
                        }
                    } 

                echo "</div>";
            }    
        ?>
    </form>
</div>
