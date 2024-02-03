<?php
// password_hash($password, PASSWORD_BCRYPT);
class User {
    private $id;
    private $username;
    private $password;
    private $role; // 'employee' or 'admin'

    public function __construct($id, $username, $passwordHash, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->role = $role;
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function getRole(){
        return $this->role;
    }

    // Add getter and setter methods as needed

    public function isAdmin() {
        return $this->role == 'admin';
    }
}
?>
