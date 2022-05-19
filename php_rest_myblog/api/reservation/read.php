<?php 

  // Headers
  // header('Access-Control-Allow-Origin: *');
  // header('Content-Type: application/json');

  // include_once '../../config/Database.php';
  // include_once '../../models/reservations.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate reservation object
  $reservation = new Reservations($db);

  // reservation read query
  $result = $reservation->read();
  
  // Get row count
  $num = $result->rowCount();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
}
  // Check if any categories
  if($num > 0) {
        // Cat array
        $cat_arr = array();
        $cat_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            'id' => $id,
            'date' => $date,
            'creneau' => $creneau,
            'ref' => $ref
          );

          // Push to "data"
          array_push($cat_arr['data'], $cat_item);
        }

        // Turn to JSON & output
        echo json_encode($cat_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Categories Found')
        );
  }
