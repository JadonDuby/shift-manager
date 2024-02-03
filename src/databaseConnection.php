<?php

class DatabaseConnection {
   private $host;
   private $username;
   private $password;
   private $database;
   public $connection;

   public function __construct($host, $username, $password, $database) {
       $this->host = $host;
       $this->username = $username;
       $this->password = $password;
       $this->database = $database;
       $this->connect();
   }

   private function connect() {
       $this->connection = new mysqli($this->host, $this->username, $this->password);

       if ($this->connection->connect_error) {
           die("Connection failed: " . $this->connection->connect_error);
       }
       $this->query("CREATE DATABASE IF NOT EXISTS " . $this->database);
       $this->connection->select_db($this->database);
   }

   public function query($sql, $params = []) {
      $statement = $this->connection->prepare($sql);

      if (!$statement) {
          die("Error preparing query: " . $this->connection->error);
      }

      if (!empty($params)) {
          $types = str_repeat('s', count($params)); // Assuming all parameters are strings, adjust accordingly
          $statement->bind_param($types, ...$params);
      }

      $result = $statement->execute();

      if (!$result) {
          die("Error executing query: " . $statement->error);
      }

      return $statement->get_result();
  }


   public function close() {
       $this->connection->close();
   }
}
?>