<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/reservations.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $reservation = new Reservations($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $reservation->id = $data->id;
  
  $reservation->date = $data->date;
  $reservation->creneau = $data->creneau;

  // Update post
  if($reservation->update()) {
    echo json_encode(
      array('message' => 'Reservation Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Reservation not updated')
    );
  }
