 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	06.12.2023
    Description   :	Fichier inc pour le header du site 
-->

<?php
//démarre la session pour se souvenir de celui qui se connecte
session_start();

// détruit la session en cours
//session_destroy();
?>

<header>
    <div class="container-header">
        <div class="titre-header">
            <h1>Passion Lecture</h1>
        </div>
        
        <!-- connexion -->

        <?php
            echo "<form action=\"../../../Controller/ControllerConnexion.php\" method=\"post\" class=\"box-login\">";

            if (isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
                    echo "<label>" . $_SESSION["user"] . " (" . $_SESSION['typeUser'] . ")</label>";
                    echo "<button type=\"submit\" class=\"btn btn-login\">Logout</button>";
            }else{
                    echo "<label for=\"user\"></label>";
                    echo "<input type=\"text\" name=\"user\" id=\"user\" placeholder=\"Username\">";
                    echo "<label for=\"password\"></label>";
                    echo "<input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\">";
                    echo "<button type=\"submit\" class=\"btn btn-login\">Login</button>";
            }
            echo "</form>";

            //var_dump($_SESSION);
        ?>

        <!--
        <form action="validationConnexion.php" method="post" class="box-login">
            <label for="user"></label>
            <input type="text" name="user" id="user" placeholder="Username">
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" class="btn btn-login">Login</button>
        </form>
        -->

        

    </div>
    <nav>
        <div class="nav-links">
            <a href="../PHP_html/index.php">Accueil</a>
            <a href="../PHP_html/liste.php">Liste</a>
            <a href="../PHP_html/addBook.inc.php">Ajout</a>
            <a href="#">Profil</a>
        </div>
        
    </nav>
</header>
    