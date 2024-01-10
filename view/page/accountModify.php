 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Pafge de modification du compte utilisateur
-->

<?php
// connexion à la BD
//include("../../../Model/ModelBook.php");
//include("../../../Model/ModelAuthor.php");

//$db3 = new ModelBook();
//$oneBook = $db3->getOneBookGW(2); // id entrée en "dure"
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
        <h1>Modifier les informations du compte</h1>

        <form action="../../../Controller/ControllerAccount.php" method="post" id="accountDetail" enctype="multipart/form-data">
                    
            <div class="form-data">
                <label class="accountMetaData" for="accountLogin" >Identifiant :</label>
                <input type="text" name="accountLogin" id="accountLogin" value="<?=$_SESSION["account"]["login"]?>">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountLastName" >Nom :</label>
                <input type="text" name="accountLastName" id="accountLastName" value="<?=$_SESSION["account"]["lastName"]?>">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountFirstName"> Prénom :</label>
                <input type="text" name="accountFirstName" id="accountFirstName" value="<?=$_SESSION["account"]["firstName"]?>">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountEmail">Adresse E-mail :</label> 
                <input type="text" name="accountEmail" id="accountEmail" value="<?=$_SESSION["account"]["mailAddress"]?>">
            </div>
            
            <div class="form-data">
                <label class="accountMetaData" for="accountBirthDate">Date de naissance :</label>
                <input type="text" name="accountBirthDate" id="accountBirthDate" value="<?=$_SESSION["account"]["birthDate"]?>">
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="btnSubmit"></label>
                <div class="endForm">
                    <input class="bg-gray-300 hover:bg-gray-400 h-10 w-16" type="submit" name="btnSubmit" id="btnSubmit" value="Enregistrer">
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