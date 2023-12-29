 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture"
                    
-->

<?php
// connexion à la BD
include("../../../Model/ModelBook.php");

$dbBook = new ModelBook();
$fiveLastBooks = $dbBook->getNLastBooks(5);
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
    <div>
        <?php
        /*
            if (isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
                echo "NON-CONNECTED";
            }else{
                echo "CONNECTED";
            }
            */
        ?>
    </div>

    <div class="container" id="containerHomePage">
        <div class="bloc01">
            <h1>Nouveautés</h1>
            <div class="newBook">
                <?php
                    foreach($fiveLastBooks as $book){
                        echo "<a href=\"../PHP_html/details.php?idBook=" . $book["idBook"] . "\"><img src=\"../Img/books/book" . $book["idBook"] .".jpg\" alt=\"image01\"></a>";
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
                ---------------------------------------------
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

    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>

</body>

</html>