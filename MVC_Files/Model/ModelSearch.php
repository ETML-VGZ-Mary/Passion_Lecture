<?php
 include_once("ModelMain.php");

Class ModelSearch extends ModelMain{
   

    /**
     * Fonction pour se connecter via PDO et utiliser la variable de classe $connector
     * Utilise un trycatch pour renvoyer une erreur dans la variable $e
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Méthode pour récupérer la recherche de l'utilisateur dans la bibliothèque
     */

     public function searchBook($query)
     {
        
        //Requête préparée pour éviter injections SQL
        $query = "SELECT * from t_book 
                    WHERE  title LIKE :searchQuery";
        
        //% servent pour le LIKE 
        $searchQuery = '%' . $query . '%';
        
        $binds = [
            [
                ':searchUser', $searchQuery, PDO::PARAM_STR
            ]
        ];  

        // Appeler la méthode pour exécuter la requête
         $req = $this->queryPrepareExecute($query, $binds);

        // Retourner les résultats sous forme de tableau associatif
        return $this->formatData($req);
     }

}
