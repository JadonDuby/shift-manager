<?php

include_once("databaseConnection.php");

class AuthService {
    private $db;

    public function __construct(DatabaseConnection $db) {
        $this->db = $db;
    }

    public function authenticateUser($username, $password) {
        // Validate and sanitize inputs

        // Query the database to get user information based on the provided username
        // Example query (consider using prepared statements)

        $username = $this->db->connection->real_escape_string($username);
		$password = $this->db->connection->real_escape_string($password);
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "SELECT id, username, hashed_password, role FROM user WHERE username = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($id, $username, $passwordHash, $role);

        if ($stmt->fetch() && password_verify($password, $passwordHash)) {
            // Authentication successful
            return new User($id, $username, $passwordHash, $role);
        }

        // Authentication failed
        return null;
    }
}
