<!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	06.12.2023
    Description   :	Fichier inc pour le header du site. Affiche le logo-titre, le LOGIN et le menu de navigation
-->

<header>
    <div class="container-header">
        <div class="titre-header">
            <a href="index.php?controller=page&action=home"><img class="mainLogo" src="../resources/image/icons/mainLogo1.png" alt="mainLogo"></a>
        </div>
        
        <!-- connexion -->
        <?php
            echo "<form action=\"controller/ControllerConnexion.php\" method=\"post\" class=\"box-login\">";

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
                //echo "<button type=\"submit\" class=\"btn btn-login\">Logout</button>";
                echo "<button type=\"submit\" class=\"bg-red-300 hover:bg-gray-700\">Logout</button>";
            }else{
                /*utilisateur non-connecté : USERNAME + PASSWORD + LOGOUT*/
                echo "<label for=\"user\"></label>";
                echo "<input type=\"text\" name=\"user\" id=\"userLogin\" placeholder=\"Pseudo\">";
                echo "<label for=\"password\"></label>";
                echo "<input type=\"password\" name=\"password\" id=\"passwordLogin\" placeholder=\"Mot de passe\">";
                echo "<button type=\"submit\" class=\"bg-gray-300 hover:bg-gray-400 h-10 w-16\">Login</button>";
            }
            echo "</form>";
        ?>

    </div>
    <nav>
        <div class="nav-links">
            <a href="index.php?controller=page&action=home">Accueil</a>
            <a href="index.php?controller=page&action=listBook">Bibliothèque</a>
            <a href="index.php?controller=page&action=addBook">Ajout</a>
            <a href="index.php?controller=page&action=account">Compte</a>
        </div>
    </nav>
</header>
    