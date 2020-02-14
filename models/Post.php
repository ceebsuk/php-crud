<?php
require_once('Database.php');
require_once('./classes/Util.php');

class Post
{
    public $title;
    public $body;
    public $slug;
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
            $opertaion = $this->pdo->prepare("SELECT title, body, slug FROM posts");
            $opertaion->execute();

            $result = $opertaion->fetchAll(PDO::FETCH_CLASS, "Post");

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
        $slug = Util::slugify($title);

        try
        {
            $opertaion = $this->pdo->prepare("INSERT INTO posts (title, body, slug) VALUES(:title, :body, :slug)");
            $success = $opertaion->execute([
                ':title' => $title,
                ':body' => $body,
                ':slug' => $slug
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

    // Get post by slug.
    public function getPostBySlug($slug)
    {
        try
        {
            $opertaion = $this->pdo->prepare("SELECT title, body, slug FROM posts WHERE slug=:slug LIMIT 1");
            $opertaion->execute([
                ':slug' => $slug
            ]);

            $result = $opertaion->fetchObject("Post");

            return $result;
        }
        catch(PDOException $e)
        {
            http_response_code(500);
            die("Server Error: Fetching - " . $e->getMessage());
        }  
    }

    public function deleteBySlug($slug)
    {
        try
        {
            $opertaion = $this->pdo->prepare("SELECT * FROM posts WHERE slug=:slug LIMIT 1");
            $opertaion->execute([
                ':slug' => $slug
            ]);

            $result = $opertaion->fetchObject("Post");

            if($result)
            {
                $opertaion = $this->pdo->prepare("DELETE FROM posts WHERE slug=:slug");
                if($opertaion->execute([ ':slug' => $slug ]))
                {
                    return true;
                }
                else
                {
                    http_response_code(500);
                    die("Server Error: Something went wrong during deletion.");
                }
            }
        }
        catch(PDOException $e)
        {
            http_response_code(500);
            die("Server Error: Fetching - " . $e->getMessage());
        } 
    }
}
