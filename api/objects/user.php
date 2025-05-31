<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $username;
    public $password;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
 
    // signup user
    function signup(){
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, created=:created";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->created=htmlspecialchars(strip_tags($this->created));
    
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
    }
 
    // login user
    function login(){
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username = :username AND password = :password";
    
        $stmt = $this->conn->prepare($query);
    
        // Sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
    
        // Bind parameters
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
    
        $stmt->execute();
    
        // Check if login is successful
        if ($stmt->rowCount() > 0) {
            // Start session and store username
            session_start();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $row['username'];
            $_SESSION['last_activity'] = time();
    
            // Update is_logged_in status
            $update_query = "UPDATE " . $this->table_name . " SET is_logged_in = 1 WHERE username = :username";
            $update_stmt = $this->conn->prepare($update_query);
            $update_stmt->bindParam(':username', $this->username);
            $update_stmt->execute();
        }
    
        return $stmt;
    }
 
    // check if username already exists
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username = :username";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        // bind parameter
        $stmt->bindParam(':username', $this->username);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
?>