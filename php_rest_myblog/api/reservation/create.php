<?php
  // Headers
  // header('Access-Control-Allow-Origin: *');
  // header('Content-Type: application/json');
  // header('Access-Control-Allow-Methods: POST');
  // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  // include_once '../../config/Database.php';
  // include_once '../../models/reservations.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $reservation = new Reservations($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $reservation->ref = $data->ref;
  $reservation->date = $data->date;
  $reservation->creneau = $data->creneau;
 
  // Create reservation
  if($reservation->create()) {
    echo json_encode(
      array('message' => 'Reservation Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Reservation Not Created')
    );
  }
