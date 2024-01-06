<?php
 include_once("ModelMain.php");

Class ModelUser extends ModelMain{
   

    /**
     * Fonction pour se connecter via PDO et utiliser la variable de classe $connector
     * Utilise un trycatch pour renvoyer une erreur dans la variable $e
     */
    public function __construct(){
        parent::__construct();
    }



    /**
     * Méthode pour récupérer la liste de tous les auteurs de la DB
     */
    public function getAllUsers()
    {
        // Récupère les données sur la table auteur avec une requête sql
        $query = "SELECT * FROM t_user;";

        //appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        //Retourne dans un tableau les données des auteurs
        $users = $this->formatData($req);
        
        return $users;

    }



}

?>


