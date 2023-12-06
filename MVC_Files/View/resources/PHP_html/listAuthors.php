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
        <h3>Liste des auteurs</h3>
        
        <form action="#" method="post">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach($authors as $author) {

                        // Affichage dynamique des enseignants
                        echo "<tr>";
                        echo "<td>" . $author["idAuthor"] . "</td>";
                        echo "<td>" . $author["firstName"] . "</td>";
                        echo "<td>" . $author["lastName"] . "</td>";
                        
                        

                        echo "</tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
            </form>
    </div>

    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>

</body>

</html>