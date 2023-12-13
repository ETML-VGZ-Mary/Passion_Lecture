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

$book = new ModelBook();
$auteur = new ModelAuthor();
$bookPage = $book->getOneBook($bookPage["idBook"]);
$cat = $cat->getOneCat($book["idCategory"]);
//$auteur = $auteur->getOneAuthor($book["idBook"]);

session_start();
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
        <div class="container-header">
            <div class="titre-header">
                <h1>Passion Lecture</h1>
            </div>
            
            <!-- connexion -->
            <div class="box-login">
                <label for="user"></label>
                <input type="text" name="user" id="user" placeholder="Username">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
            

        </div>
        <nav>
            <div class="nav-links">
                <a href="../views/index.php">Accueil</a>
                <a href="../views/liste.php">Liste</a>
                <a href="#">Ajout</a>
                <a href="#">Profil</a>
                <a href="#">Contacts</a>
            </div>
            
        </nav>
    </header>

    <div class="container-details">
        <div class="book-name">
            <?php
                $html += "<h2>"; 
                $html+= $book["title"];
                $html+= "<a href=\"#\"><img src=\"../Img/icons/modify.png\" alt=\"modify\"></a>
                <a href=\"\"><img src=\"../Img/icons/delete.png\" alt=\"delete\"></a>\"</h2>";
                $html+= "</div>";

                $html+= "<div class=\"infoBook\">";
                $html+= "<h3>";
                $html+= $book["idCategory"];
                $html+= $book["nbPage"];
                $html+= "</h3>";
                $html+= "<h3>";
                $html+= $book["author"];
                $html+= $book["editor"];
                $html+= $book["yearEdit"];
                $html+="</h3>";
                $html+= "<h4>Résumé</h4>";
                $html+= "<p>";
                $html+= $book["resume"];
                $html+= "</p>";
                $html+= "<a class=\"extractBook\" href=" . $book["bookExtract"]. ">Extrait du livre</a>";
                $html+= "</div>";
                echo $html;
                //<script src="./js/script.js"></script>
            ?>
    </div>

    <footer>
        <p>© Camille Déglise - Guo Yu Wu - Maryline Vougaz - 2024</p>
    </footer>

</body>

</html>