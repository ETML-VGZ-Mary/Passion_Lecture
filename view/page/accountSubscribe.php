 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	08.12.2024
    Description   :	Nouvelle insciption de compte : Formulaire pour créer un compte utilisateur
-->

<?php
// connexion à la BD
include("../../../Model/ModelBook.php");
include("../../../Model/ModelAuthor.php");

$db3 = new ModelBook();
$oneBook = $db3->getOneBookGW(2); // id entrée en "dure"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/app.css">
    <link href="../CSS/app.css" rel="stylesheet" media="screen"/>
    <title>Modifier les informations du compte</title>
</head>
<body>
    <header>
        <?php
            include("header.inc.php");
        ?>
    </header>
    <div class="container">
        <h1>Créer un nouvel utilisateur</h1>

        <form action="#" method="post" id="accountDetail" enctype="multipart/form-data">
                    
            <div class="form-data">
                <label class="accountMetaData" for="accountLogin" >Identifiant :</label>
                <input type="text" name="accountLogin" id="accountLogin">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountLastName" >Nom :</label>
                <input type="text" name="accountLastName" id="accountLastName">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountFirstName"> Prénom :</label>
                <input type="text" name="accountFirstName" id="accountFirstName">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountEmail">Adresse E-mail :</label> 
                <input type="text" name="accountEmail" id="accountEmail">
            </div>
            
            <div class="form-data">
                <label class="accountMetaData" for="accountBirthDate">Date de naissance :</label>
                <input type="text" name="accountBirthDate" id="accountBirthDate">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="btnSubmit"></label>
                <div class="endForm">
                    <input class="bg-gray-300 hover:bg-gray-400 h-10 w-16" type="submit" name="btnSubmit" id="btnSubmit" value="Créer le compte">
                </div>
            </div>
        </form>
    </div>
    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>
</body>
</html>