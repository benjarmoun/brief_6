<?php
  class Reservations {
    // DB Stuff
    private $conn;
    private $table = 'reservations';

    // Properties
    public $id;
    public $date;
    public $creneau;
    public $ref;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get reservations
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        date,
        creneau,
        ref
      FROM
        ' . $this->table . '
      ORDER BY
        date ,  creneau';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get reservations by ref
    public function readRef($ref) {
      // Create query
      $query = 'SELECT
        id,
        date,
        creneau,
        ref
      FROM
        ' . $this->table . ' where ref = ?
      ORDER BY
        date ,  creneau';

        
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        
        //bind values
        $stmt->bindParam(1, $ref);
        
      // Execute query
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // Get Single Category
  public function read_single($id){
    // Create query
    $query = 'SELECT
          id,
        date,
        creneau,
        ref
        FROM
          ' . $this->table . '
      WHERE id = ?';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $id);

      // Execute query
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

}

// Create reservation
public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      ref = :ref,
      date = :date,
      creneau = :creneau';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->date = htmlspecialchars(strip_tags($this->date));
    $this->creneau = htmlspecialchars(strip_tags($this->creneau));
    $this->ref = htmlspecialchars(strip_tags($this->ref));

    // Bind data
    $stmt-> bindParam(':ref', $this->ref);
    $stmt-> bindParam(':date', $this->date);
    $stmt-> bindParam(':creneau', $this->creneau);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
}

// Update Category
public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      date = :date,
      creneau = :creneau
      WHERE
      id = :id';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->date = htmlspecialchars(strip_tags($this->date));
  $this->creneau = htmlspecialchars(strip_tags($this->creneau));
  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt-> bindParam(':date', $this->date);
  $stmt-> bindParam(':creneau', $this->creneau);
  $stmt-> bindParam(':id', $this->id);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  }
