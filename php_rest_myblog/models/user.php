<?php
  class User
  {
      // DB stuff
      private $conn;
      private $table = 'user';

      // user Properties
      public $ref;
      public $nom;
      public $prenom;
      public $date_naissance;

      // Constructor with DB
      public function __construct($db)
      {
          $this->conn = $db;
      }

      // Get users
      public function read()
      {
          // Create query
          $query = 'SELECT ref, nom, prenom, date_naissance
                                FROM ' . $this->table .'';
      
          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Execute query
          $stmt->execute();

          return $stmt;
      }

      // write a function to do login
      // public function login() {
      //   // Create query
      //   $query = 'SELECT * FROM ' . $this->table . ' WHERE ref = :ref';
      
      //   // Prepare statement
      //   $stmt = $this->conn->prepare($query);
      //   $stmt->bindParam(':ref', $this->ref);

      //   // Execute query
      //   $stmt->execute();

      //   return $stmt;
      // }
      public function login($data)
      {
          $ref = $data['ref'];
          // die();
          // die(print_r($data));
      
          $query = 'SELECT * FROM user WHERE ref = :ref';

          $DB = new Database ;
          $stmt = $DB->connect()->prepare($query);
          $stmt->execute(array(":ref" => $ref));
          $user = $stmt->fetch(PDO::FETCH_OBJ);
          return $user;
          if ($stmt->execute()) {
              return 'OK';
          }
      




          // $req='SELECT * FROM user WHERE ref = :ref';
      // $DB = new Database ;
      // $stmt=$DB->conn()->prepare($req);
      // $stmt-> binParam(1,$this->ref);
      // $stmt->execute();
      // $user = $stmt->fetch(PDO::FETCH_ASSOC);
      // return $user;
      }

      // Get Single user
      public function read_single($ref)
      {
          // Create query
          $query = 'SELECT ref, nom, prenom, date_naissance
                                  FROM ' . $this->table .'
                                    WHERE
                                      ref = ?';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ref
          $stmt->bindParam(1, $ref);

          // Execute query
          $stmt->execute();

          return $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          // $this->nom = $row['nom'];
          // $this->prenom = $row['prenom'];
          // $this->date_naissance = $row['date_naissance'];
      }


      // Create Post
      public function create()
      {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET ref = :ref, nom = :nom, prenom = :prenom, date_naissance = :date_naissance';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->ref = htmlspecialchars(strip_tags($this->ref));
          $this->nom = htmlspecialchars(strip_tags($this->nom));
          $this->prenom = htmlspecialchars(strip_tags($this->prenom));
          $this->date_naissance = htmlspecialchars(strip_tags($this->date_naissance));

          // Bind data
          $stmt->bindParam(':ref', $this->ref);
          $stmt->bindParam(':nom', $this->nom);
          $stmt->bindParam(':prenom', $this->prenom);
          $stmt->bindParam(':date_naissance', $this->date_naissance);

          // Execute query
          if ($stmt->execute()) {
              return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
      }

      // Update Post
      public function update()
      {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance
                                WHERE ref = :ref';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->nom = htmlspecialchars(strip_tags($this->nom));
          $this->prenom = htmlspecialchars(strip_tags($this->prenom));
          $this->date_naissance = htmlspecialchars(strip_tags($this->date_naissance));
          $this->ref = htmlspecialchars(strip_tags($this->ref));

          // Bind data
          $stmt->bindParam(':nom', $this->nom);
          $stmt->bindParam(':prenom', $this->prenom);
          $stmt->bindParam(':date_naissance', $this->date_naissance);
          $stmt->bindParam(':ref', $this->ref);

          // Execute query
          if ($stmt->execute()) {
              return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
      }

      // Delete Post
      public function delete()
      {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE ref = :ref';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->ref = htmlspecialchars(strip_tags($this->ref));

          // Bind data
          $stmt->bindParam(':ref', $this->ref);

          // Execute query
          if ($stmt->execute()) {
              return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
      }
  }
