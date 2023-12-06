<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];

?>

<?php

/**************************************************************************************************************************************************
 * ETML
 * Auteur           : Déglise Camille - Vougaz Maryline - Wu Guo Yu
 * Date             : 29.11.2023
 * Description      : Class DataBase : connexion à la BD, requêtes MySQL, query, prepare
 **************************************************************************************************************************************************/


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
            $this->connector = new PDO('mysql:host=localhost:6033;dbname=db_nickname_guywu;charset=utf8' , 'root', 'root');
            
            // depuis UWAMP
            //$this->connector = new PDO('mysql:host=localhost:3306;dbname=db_nickname_guywu;charset=utf8' , 'root', 'root');
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
     * Récupère la liste de tous les enseignants de la BD
     */
    public function getAllTeachers(){

        // Avoir la requête sql
        $query = "SELECT * FROM t_teacher";

        // Appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);


        // Appeler la méthode pour avoir le résultat sous forme de tableau
        $teachers = $this->formatData($req);

        // retour tous les enseignants
        return $teachers;
    }

    /**
     * TODO: récupère la liste des informations pour 1 enseignant
     */
    public function getOneTeacher($idTeacher){

        // TODO: avoir la requête sql pour 1 enseignant (utilisation de l'id)
        $query = "SELECT * FROM t_teacher WHERE idTeacher = $idTeacher";

        // TODO: appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);
        // utilisation de [queryPrepareExecute($query, $binds)] ?

        // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
        $teachers = $this->formatData($req);

        // TODO: retour l'enseignant
        return $teachers[0];
    }


    // + tous les autres méthodes dont vous aurez besoin pour la suite (insertTeacher ... etc)


    /**
     * Récupère la liste de toutes les sections de la BD
     */
    public function getAllSections(){

        // Avoir la requête sql
        $query = "SELECT * FROM t_section";

        // Appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);


        // Appeler la méthode pour avoir le résultat sous forme de tableau
        $sections = $this->formatData($req);

        // retour tous les enseignants
        return $sections;
    }


    /**
     * récupère le nom de section pour un enseignant
     */
    public function getSectionForOneTeacher($id){

        // TODO: avoir la requête sql pour 1 enseignant (utilisation de l'id)
        $query = "SELECT secName FROM t_section INNER JOIN t_teacher ON fkSection = idSection WHERE idTeacher = $id";

        // TODO: appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
        $sections = $this->formatData($req);

        // TODO: retour l'enseignant
        return $sections[0];
    }


    /**
     * ajoute un enseignant dans la db
     * à partir d'un tableau de paramètres (teaFirstname, teaName, teaGender, teaNickname, teaOrigine, fkSection) 
     * J'aurai aimé utiliser un tableau avec tous les paramètres mais je n'arrive pas à prendre les éléments tab[i]
     */
    public function insertTeacher($data){

        // var_dump($data);


        // TODO: avoir la requête sql pour 1 enseignant
        $query = "INSERT INTO t_teacher(teaFirstname, teaName, teaGender, teaNickname, teaOrigine, fkSection) 
                    VALUES (
                        :firstname,
                        :name,
                        :gender,
                        :nickname,
                        :origin,
                        :fkSection
                    );";

        $binds = [ 
            ['firstname', $data["firstName"]],
            ['name', $data["name"]],
            ['gender', $data["genre"]],
            ['nickname', $data["nickName"]],
            ['origin', $data["origin"]],
            ['fkSection', $data["section"]]
        ];

        // TODO: appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($query, $binds);
    }


    /**
     * permet la modification d'un enseignant
     * Les nouvelles valeurs vont "écraser" les anciennes pour les remplacer
     */
    public function updateTeacher($newData){

        
        // TODO: avoir la requête sql pour 1 enseignant
        $query = "UPDATE t_teacher
                    SET
                        teaFirstname = :firstname,
                        teaName = :name,
                        teaGender = :gender,
                        teaNickname = :nickname,
                        teaOrigine = :origin,
                        fkSection = :fkSection
                    WHERE idTeacher = " . $newData["idTeacher"] . "
                    ;";
                     
                    // problème au niveau de l'attribution de fkSection --> mélange avec le n° (int) de la section et son nom (string)
        $binds = [ 
            ['firstname', $newData["firstName"]],
            ['name', $newData["name"]],
            ['gender', $newData["genre"]],
            ['nickname', $newData["nickName"]],
            ['origin', $newData["origin"]],
            ['fkSection', 2]
        ];
        
        //$query = "UPDATE t_teacher SET teaFirstname = '" . $newData["firstName"] . "' WHERE idTeacher = " . $newData["idTeacher"] . ";";

        // TODO: appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($query, $binds);
    }


    /**
     * permet la suppression d'un enseignant
     */
    public function deleteTeacher($teacherID){

        // TODO: avoir la requête sql pour modifier 1 enseignant
        $query = "DELETE FROM t_teacher WHERE idTeacher = '$teacherID' ;";

        // TODO: appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);
    }



 }


?>
