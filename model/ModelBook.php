<?php
 include_once("ModelMain.php");

class ModelBook extends ModelMain{
   

    /**
     * Méthode qui récupère la liste de toutes les catégories de la BD
     * Utilisée dans les pages "Ajouter un livre", "Modifier un livre"
     */
    public function getAllCategories()
    {
        // Récupère les données sur la table catégories avec une requête sql
        $query = "SELECT * FROM t_category;";

        //appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        //Retourne dans un tableau les données des catégories
        $categories = $this->formatData($req);
        
        return $categories;

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
     * Méthode pour récupérer la liste de tous les livres de la DB
     * Utilisée dans la page "Listes des ouvrages", dans la page "Accueil"
     */
    public function getAllBooks()
    {
        // Récupère les données sur la table livre avec une requête sql
        $query = "SELECT * FROM t_book;";

        //appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        //Retourne dans un tableau les données des livres
        $books = $this->formatData($req);
        
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
        $query = "SELECT * FROM t_book WHERE idbook = :id LEFT JOIN t_author ON t_book.authorfirstName = t_author.firstName AND t_book.authorlastName = t_author.lastName"; 
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

    /*
    Guo Yu tente un getOneBook
    */
    public function getOneBookGW($id){
        // TODO: avoir la requête sql pour 1 book (utilisation de l'id)
        $query = "SELECT * FROM t_book WHERE idBook = $id";

        // TODO: appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);
        // utilisation de [queryPrepareExecute($query, $binds)] ?

        // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
        $oneBook = $this->formatData($req);

        // TODO: retour l'enseignant
        return $oneBook[0];
    }


    /**
     * Méthode pour insérer les données d'un nouveau livre
     * Prend en argument les données du $_POST de la page qui l'appelle
     * Utilisée dans la page "Ajouter un livre"
     */
    public function addBook($data)
    {
        //Ajout des données de $_POST ($data) dans de nouvelles variables
        //pour des questions de lisibilité. 
        $title = $data["title"];
        $nbPage = $data["nbPage"];
        $editor = $data["editor"];
        $yearEdit = $data["yearEdit"];
        $bookExtract = $data["bookExtract"];
        $resume = $data["resume"];
        $fkCategory = $data["category"];
        $idUser = $_SESSION["account"]["idUser"];
        
        /*
        $pictureCover = $data["pictureCover"];
        $fkAuthor = $data["namAuthor"];
        */

        /*
        //Requête sur la db pour insérer les nouvelles données avec prepare
        //:xxx == étiquette 
        */

        $query = "INSERT INTO t_book(title, nbPage , editor, yearEdit, bookExtract, resume, fkCategory, idUser)
        VALUES(:title, :nbPage, :editor, :yearEdit, :bookExtract, :resume, :category, idUser)";
        
        
        /*
        $query = "INSERT INTO t_book(title, nbPage , editor, 
        yearEdit, pictureCover, bookExtract, `resume` fkCategory, fkAuthor)
        VALUES(:title, :nbPage$, :editor, :yearEdit, :pictureCover, :bookExtract, :`resume` :category, :author)";
        */

        //Liasion des variables avec le marqueur 
        $binds = [
            ['title', $title, PDO::PARAM_STR],
            ['nbPage', $nbPage, PDO::PARAM_INT],
            ['editor', $editor, PDO::PARAM_STR],
            ['yearEdit', $yearEdit, PDO::PARAM_INT],
            ['bookExtract', $bookExtract, PDO::PARAM_STR],
            ['resume', $resume, PDO::PARAM_STR],
            ['category', $fkCategory, PDO::PARAM_INT],
            ['idUser', $idUser, PDO::PARAM_STR],
            /*
            ['pictureCover', $pictureCover, PDO::PARAM_STR],
            ['author', $fkAuthor, PDO::PARAM_INT]
            */
        ];

        $this->queryPrepareExecute($query, $binds);

    }



    /**
     * Méthode pour modifier les données d'un livre déjà existant
     * Prend en arguement les données du $_POST de la page qui l'appelle
     * Fonctionne avec un prepare-query
     * Utilisée dans la page "Modifier un livre"
     */

    public function updateBook($data)
    {
         //Ajout des données de $_POST ($data) dans de nouvelles variables
        //pour des questions de lisibilité. 
        $title = $data["title"];
        $nbPage = $data["page"];
        $editor = $data["editor"];
        $yearEdit = $data["yearEdit"];
        $pictureCover = $data["pictureCover"];
        $bookExtract = $data["bookExtract"];
        $resume = $data["resume"];
        $fkAuthor = $data["author"];
        $fkCategory = $data["category"];

         //Requête sur la db pour modifier les nouvelles données avec prepare
        //:xxx == étiquette 
        $query = "UPDATE t_book
                  SET title = :title, 
                      nbPage = :nbPage,          
                      editor = :editor,
                      yearEdit = :yearEdit, 
                      pictureCover = :pictureCover, 
                      bookExtract = :bookExtract,
                      `resume` = :`resume`,
                      fkAuthor = :fkAuthor,
                      fkCategory = :fkCategory
                  WHERE idBook = ". $data['idBook'] . ";";
        
        //Liasion des variables avec le marqueur 
        $binds = [
            ['title', $title, PDO::PARAM_STR],
            ['nbPage', $nbPage::PARpageTR],
            ['editor', $editor, PDO::PARAM_STR],
            ['yearEdit', $yearEdit, PDO::PARAM_INT],
            ['pictureCover', $pictureCover, PDO::PARAM_STR],
            ['bookExtract', $bookExtract, PDO::PARAM_STR],
            ['resume', $resume, PDO::PARAM_STR],
            ['author', $fkAuthor, PDO::PARAM_INT],
            ['category', $fkCategory, PDO::PARAM_INT]
        ];
        $this->queryPrepareExecute($query, $binds);
    }



    /**
     * Fonction pour supprimer dans la base de donnée un livre 
     * Prend en paramètre l'ID du livre sélectionné 
     */
    public function deleteBook($id)
    {
        $query = "DELETE FROM t_teacher WHERE idTeacher = :id";
        $binds = [
            ['id', $id, PDO::PARAM_INT]
        ];
        $this->queryPrepareExecute($query, $binds);
        
    }


    /*
     * Fonction qui retourne la liste des N derniers livres ajoutés
     */
    public function getNLastBooks($nbLastBooks){
        // avoir la requête sql pour N derniers livres
        $query = "SELECT * FROM t_book ORDER BY idBook DESC LIMIT $nbLastBooks";

        // appelle la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        // appelle la méthode pour avoir le résultat sous forme de tableau
        $lastBooks = $this->formatData($req);

        //retourne les N derniers livres
        return $lastBooks;
    }

     









}
   


?>


