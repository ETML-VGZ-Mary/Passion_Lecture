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
include("../../../Model/DATABASE.php");

$db = new Database();
$authors = $db->getAllAuthors();
$books = $db->getAllBooks();
$categories = $db->getAllCategories();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../src/css/style.css" rel="stylesheet" media="screen"/>
    <title>Liste auteurs</title>
</head>

<body>

    <header>
        <?php
            include("header.inc.php");
        ?>
    </header>

    <div class="container">
        <h4>Liste des livres</h4>

        <!--barre de recherche-->
        <div class="research-bar">
            <input type="text" placeholder="Recherche...">
            <button type="submit"><img src="../Img/icons/research.png" alt="research-icon"></button>
        </div>
        
        <form action="#" method="post">
            <?php
                foreach($categories as $categorie) {
                    
                    echo "<h4>" . $categorie["label"] . "</h4>";

                    echo "<div class=\"box-same-category-books\">";

                        foreach($books as $book) {
                        
                            if($book["idCategory"] == $categorie["idCategory"]){
                                
                                echo "<div class=\"box-book\">";
                                    echo "<a href=\"../views/details.php\"><img src=\"../Img/books/livre01.jpg\" alt=\"image01\"></a>";
                                    echo "<p>" . $book["title"] . "</p>";
                                echo "</div>";
                            }
                        } 

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