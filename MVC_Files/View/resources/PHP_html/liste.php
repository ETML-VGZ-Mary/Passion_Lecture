 <!--
    Auteur        :	Wu Guo Yu
    Date          :	04.10.2023
    Description   :	Accueil du site "Sunom des enseignants"
                    Le nom des enseignants et de leur surnom est affichée en liste.
                    Une connexion en haut de page permet de s'identifier avec un compte user ou admin.
                    -Les users ne peuvent seulement consulter les détails des enseignants.
                    -Les admins peuvent, en plus, modifier et supprimer des surnoms
-->

<?php
// connexion à la BD
//include("../../../Model/ModelAuthor.php");
//$db = new ModelAuthor();
//$authors = $db->getAllAuthors();

include("../../../Model/ModelBook.php");
include("../MVC_Files/Model/ModelSearch.php");
$db2 = new ModelBook();
$modelSearch = new ModelSearch();
$books = $db2->getAllBooks();
$categories = $db2->getAllCategories();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/app.css" rel="stylesheet" media="screen"/>
    <title>Liste des livres</title>
</head>

<body>

    <header>
        <?php
            include("header.inc.php");
        ?>
    </header>

    <div class="container">
        <h4>Bibliothèque</h4>

        <!--barre de recherche-->
        <div class="research-bar">
            <form action="#" method="get">
                <input type="search" name="searchUser" placeholder="Recherche...">
                <input type="submit" value="Valider">
            </form>
        </div>
        <?php 
            if(isset($_GET["searchUser"]) && !empty($_GET["searchUser"]))
            {
                $query = $_GET["searchUser"];
                $results = $modelSearch-> searchBook($query);

                if(!empty($results))
                {
                    echo"<h2>Résultats de votre recherche :</h2>";
                    foreach($result as $book)
                    {
                        if($book["idCategory"] == $categorie["idCategory"]){
                                
                            echo "<div class=\"box-book\">";
                                echo "<a href=\"details.php?idBook=" . $book["idBook"] . "\"><img src=\"../Img/books/livre01.jpg\" alt=\"image01\"></a>";
                                echo "<a href=\"details.php?idBook=" . $book["idBook"] . "\"><img src=\"../Img/books/book" . $book["idBook"] . ".jpg\" alt=\"image01\"></a>";
                                echo "<p>" . $book["title"] . "</p>";
                            echo "</div>";
                        }
                        else 
                        {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                    }
                }
            }
        ?>
        
        <form action="#" method="post">
            <?php
            //ajout by chatgpt
                foreach($categories as $categorie) {
                    //Si la catégorie contient ou non un livre
                    $bookInCategory = false;

                    echo "<h4>" . $categorie["label"] . "</h4>";

                    echo "<div class=\"box-same-category-books\">";

                        foreach($books as $book) {
                        
                            if($book["idCategory"] == $categorie["idCategory"]){
                                //Si la catégorie contient un livre 
                                $bookInCategory = true;
                                echo "<div class=\"box-book\">";
                                    //echo "<a href=\"details.php?idBook=" . $book["idBook"] . "\"><img src=\"../Img/books/livre01.jpg\" alt=\"image01\"></a>";
                                    echo "<a href=\"details.php?idBook=" . $book["idBook"] . "\"><img src=\"../Img/books/book" . $book["idBook"] . ".jpg\" alt=\"image01\"></a>";
                                    echo "<p>" . $book["title"] . "</p>";
                                echo "</div>";
                            }
                        } 
                    // Afficher la catégorie uniquement si elle a des livres
                    // if ($hasBooksInCategory) {
                     //echo "<h4>" . $categorie["label"] . "</h4>";
                    //}

                    echo "</div>";
                }    
            ?>
        </form>
    </div>

    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>

</body>

</html>