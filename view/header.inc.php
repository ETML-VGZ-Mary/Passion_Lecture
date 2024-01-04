<!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	06.12.2023
    Description   :	Fichier inc pour le header du site. Affiche le logo-titre, le LOGIN et le menu de navigation
-->

<header>
    <div class="container-header">
        <div class="titre-header">
            <a href="#"><img class="mainLogo" src="../resources/image/icons/mainLogo1.png" alt="mainLogo"></a>
            <!--<h1>Passion Lecture</h1>-->
        </div>
        
        <!-- connexion -->
        <?php
            echo "<form action=\"../../../Controller/ControllerConnexion.php\" method=\"post\" class=\"box-login\">";

            if (isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
                /*utilisateur connecté : affiche son nom + LOGOUT*/
                echo "<a href=\"../PHP_html/account.php\">";
                echo "<div class=\"link\">";
                    if($_SESSION['typeUser'] == "user"){
                        echo "<img src=\"../resources/image/icons/accountUser.png\" alt=\"account-icon\">";
                        
                    }else{
                        echo "<img src=\"../resources/image/icons/accountAdmin.png\" alt=\"account-icon\">";
                    }
                    echo "<label>" . $_SESSION["user"] . " (" . $_SESSION['typeUser'] . ")</label>";
                echo "</div>";
                echo "</a>";
                echo "<button type=\"submit\" class=\"btn btn-login\">Logout</button>";
            }else{
                /*utilisateur non-connecté : USERNAME + PASSWORD + LOGOUT*/
                echo "<label for=\"user\"></label>";
                echo "<input type=\"text\" name=\"user\" id=\"user\" placeholder=\"Username\">";
                echo "<label for=\"password\"></label>";
                echo "<input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\">";
                //echo "<div class=\"endForm\">";
                echo "<button type=\"submit\" class=\"btn btn-login\">Login</button>";
                //echo "</div>";
            }
            echo "</form>";
        ?>

    </div>
    <nav>
        <div class="nav-links">
            <a href="index.php?controller=home&action=index">Accueil</a>
            <a href="index.php?controller=home&action=index">Bibliothèque</a>
            <a href="index.php?controller=home&action=index">Ajout</a>
            <a href="index.php?controller=home&action=index">Compte</a>
        </div>
    </nav>
</header>
    