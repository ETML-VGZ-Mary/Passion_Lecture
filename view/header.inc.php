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
                echo "<a href=\"index.php?controller=page&action=account\">";
                echo "<div class=\"link\">";
                    if($_SESSION['typeUser'] == "user"){
                        echo "<img src=\"../resources/image/icons/accountUser.png\" alt=\"account-icon\">";
                        
                    }else{
                        echo "<img src=\"../resources/image/icons/accountAdmin.png\" alt=\"account-icon\">";
                    }
                    echo "<label>" . $_SESSION["user"] . " (" . $_SESSION['typeUser'] . ")</label>";
                echo "</div>";
                echo "</a>";
                echo "<div class=\"btnLogout\">";
                    echo "<button id=\"btnLogout\" type=\"submit\" class=\"bg-gray-300 hover:bg-gray-400 h-10 w-16\">Logout</button>";
                echo "</div>";
                }else{
                /*utilisateur non-connecté : USERNAME + PASSWORD + LOGOUT*/
                echo "<div class=\"\">";
                    echo "<label for=\"user\"></label>";
                    echo "<input type=\"text\" name=\"user\" id=\"userLogin\" placeholder=\"Pseudo\">";
                    echo "<label for=\"password\"></label>";
                    echo "<input type=\"password\" name=\"password\" id=\"passwordLogin\" placeholder=\"Mot de passe\">";
                    
                    echo "<button type=\"submit\" class=\"bg-gray-300 hover:bg-gray-400 h-10 w-16\">Login</button>";
                    
                echo "</div>";
                echo "<div class=\"\">";
                    echo "<a href=\"index.php?controller=page&action=newAccount\" class=\"link\">S'inscrire</a>";
                echo "</div>";
            }
            echo "</form>";
        ?>

    </div>
    <nav>
        <div class="nav-links">
            <a href="index.php?controller=page&action=home">Accueil</a>
            <a href="index.php?controller=page&action=listBook">Bibliothèque</a>
            

            <?php
            if(isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
                echo "<a href=\"index.php?controller=page&action=addBook\">Ajout</a>";
                echo "<a href=\"index.php?controller=page&action=account\">Compte</a>";
            }
            ?>
            
        </div>
    </nav>
</header>
    