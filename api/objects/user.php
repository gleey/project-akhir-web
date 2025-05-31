<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $role;
    public $created;

    public function __construct($db) {
        $this->conn = $db;
    }

    function login() {
        $query = "SELECT id, username, password, role, created FROM " . $this->table_name . " WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        try {
            $stmt->execute();
            error_log("Login query executed: username={$this->username}, rowCount={$stmt->rowCount()}"); // Debug query
        } catch (PDOException $e) {
            error_log('Login query error: ' . $e->getMessage());
            return false;
        }

        return $stmt;
    }

    function signup() {
        if ($this->isAlreadyExist()) {
            return false;
        }
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, password=:password, role=:role, created=:created";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->role = htmlspecialchars(strip_tags($this->role ?? 'member'));
        $this->created = htmlspecialchars(strip_tags($this->created));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":created", $this->created);

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    function isAlreadyExist() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>