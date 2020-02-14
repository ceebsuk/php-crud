<?php
require_once('Database.php');

class Post
{
    private $pdo;

    // Grab an instance of the Database class and PDO object.
    function __construct()
    {
        $connection = new Database();
        $this->pdo = $connection->getConnection();
    }

    // Get all the posts in the database returning an array of stdObjects.
    public function getPosts()
    {
        try
        {
            $opertaion = $this->pdo->prepare("SELECT title, body FROM posts");
            $opertaion->execute();

            $result = $opertaion->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }
        catch(PDOException $e)
        {
            http_response_code(500);
            die("Server Error: Fetching - " . $e->getMessage());
        }  
    }

    // Create a post from the passed title and body parameters.
    public function create($title, $body)
    {
        try
        {
            $opertaion = $this->pdo->prepare("INSERT INTO posts (title, body) VALUES(:title, :body)");
            $success = $opertaion->execute([
                ':title' => $title,
                ':body' => $body
            ]);

            if($success)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e)
        {
            http_response_code(500);
            die("Server Error: Creating - " . $e->getMessage());
        }
    }
}
