 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture"
-->

<?php
// connexion à la BD
//include("./DATABASE.php");

//$db = new Database();
//$teachers = $db->getAllTeachers();

//session_start();
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
                <a href="../PHP_html/index.php">Accueil</a>
                <a href="../PHP_html/liste.php">Liste</a>
                <a href="../PHP_html/addBook.inc.php">Ajout</a>
                <a href="#">Profil</a>
                <a href="#">Contacts</a>
            </div>
        </nav>
    </header>

    <div class="container-index">
        <div class="bloc01">
            <h3>Nouveautés</h3>
            <a href="../PHP_html/details.php"><img src="../Img/books/livre01.jpg" alt="image01"></a>
            <a href="../PHP_html/details.php"><img src="../Img/books/livre02.jpg" alt="image02"></a>
            <a href="../PHP_html/details.php"><img src="../Img/books/livre03.jpg" alt="image03"></a>
            <a href="../PHP_html/details.php"><img src="../Img/books/livre04.jpg" alt="image04"></a>
            <a href="../PHP_html/details.php"><img src="../Img/books/livre05.jpg" alt="image05"></a>
        </div>
        <div class="bloc02">
            <h3>À propos</h3>
            <p>
                Bienvenu à "Passion Lecture" !
            </p>
            <p>
                -------------------------------------------------------------
            </p>
            <p>
                coucou
            </p>
        </div>
        <!-- <script src="./js/script.js"></script> -->
    </div>

    <footer>
        <p>© Camille Déglise - Guo Yu Wu - Maryline Vougaz - 2024</p>
    </footer>

</body>

</html>