<?php

/**
 * ETML
 * Auteur           : Déglise Camille - Vougaz Maryline - Wu Guo Yu
 * Date             : 06.12.2023
 * Description      : Class DataBase : connexion à la BD, requêtes MySQL, query, prepare
 */



 class Database {

    // Variable de classe
    private $connector;

    /**
     * Méthode de création d'un objet PDO et se connecter à la BD
     */
    public function __construct() {
        try
        {
            // depuis Docker
            $this->connector = new PDO('mysql:host=localhost:8081;dbname=db_passion;charset=utf8' , 'root', 'root');
            
            // depuis UWAMP
            //$this->connector = new PDO('mysql:host=localhost:3306;dbname=db_nickname_guywu;charset=utf8' , 'root', 'root');
        
            // depuis UWAMP (version Sébeillon)
            //$this->connector = new PDO('mysql:host=localhost;dbname=db_passion;charset=utf8' , 'root', 'root');
        

        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }


    /**
     * Méthode qui exécute une simple requête mySQL
     */
    private function querySimpleExecute($query){

        // permet de préparer et d’exécuter une requête de type simple (sans where)
        $req = $this->connector->query($query);
        return $req;
    }

    /**
     * Méthode prepare, execution d'une requête de manière sécurisée
     */
    private function queryPrepareExecute($query, $binds){
        
        // TODO: permet de préparer, de binder et d’exécuter une requête (select avec where ou insert, update et delete)
        /**
         * A COMPLETER PLUS TARD 
         */
        $req = $this->connector->prepare($query);
        foreach($binds as $bind) {
            $req -> bindValue($bind[0], $bind[1], PDO::PARAM_STR);
        }
        $req -> execute();
        return $req;
    }

    /**
     * TODO: à compléter
     */
    private function formatData($req){

        // TODO: traiter les données pour les retourner par exemple en tableau associatif (avec PDO::FETCH_ASSOC)
        $result = $req->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * TODO: à compléter
     */
    private function unsetData($req){

        // TODO: vider le jeu d’enregistrement
        $req->closeCursor();
    }

    /**
     * Récupère la liste de tous les livres de la BD
     */
    public function getAllBooks(){
 
        // Avoir la requête sql
        $query = "SELECT * FROM t_book";
 
        // Appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);
 
 
        // Appeler la méthode pour avoir le résultat sous forme de tableau
        $books = $this->formatData($req);
 
        // retour tous les enseignants
        return $books;
    }
    
    /**
     * Méthode qui récupère la liste des informations pour 1 livre
     * Prend en argument l'ID du livre
     * Doit être associée à un $_GET dans la page concernée
     * Utilisée dans la page "Détail d'un livre"
     */
    public function getOneBook($id){
        // Récupère les données sur la table livre avec une requête sql
        // en utilisant son ID
        $query = "SELECT * FROM t_book WHERE idbook = :id";
        $binds = [
            ['id', $id, PDO::PARAM_INT]
        ];
 
        //appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($query,$binds);
 
        //Retourne dans un tableau associatif à une seule
        //entrée les données d'un livre
        $book =$this->formatData($req);
       
        //Retourne la première (et unique) entrée du tableau
        return $book[0];
    }
    




 }


?>