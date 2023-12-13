<?php
include_once("ModelMain.php");

Class ModelAuthor extends ModelMain {


    // Variable de classe
    //private $connector;

    /**
     * Fonction pour se connecter via PDO et utiliser la variable de classe $connector
     * Utilise un trycatch pour renvoyer une erreur dans la variable $e
     */
    public function __construct(){
        parent::__construct();
        //$this->__construct();
    }

    

    /**
     * Méthode pour récupérer la liste de tous les auteurs de la DB
     */
    public function getAllAuthors()
    {
        // Récupère les données sur la table auteur avec une requête sql
        $query = "SELECT * FROM t_author;";

        //appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        //Retourne dans un tableau les données des auteurs
        $authors = $this->formatData($req);
        
        return $authors;

    }

    /**
     * Méthode qui récupère la liste des informations pour 1 livre
     * Prend en argument l'ID du livre
     * Doit être associée à un $_GET dans la page concernée
     * Utilisée dans la page "Détail d'un livre"
     */
    public function getOneAuthor($id){
        // Récupère les données sur la table livre avec une requête sql
        // en utilisant son ID
        $query = "SELECT * FROM t_author WHERE idAuthor= :id"; 
        $binds = [
            ['id', $id, PDO::PARAM_INT]
        ];

        //appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($query,$binds);

        //Retourne dans un tableau associatif à une seule 
        //entrée les données d'un livre
        $author =$this->formatData($req);
        
        //Retourne la première (et unique) entrée du tableau
        return $author[0];
    }

}
   

?>


