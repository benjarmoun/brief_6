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

  // Get ref
  $reservation->ref = isset($_GET['ref']) ? $_GET['ref'] : die();

  // Get post
  $reservation->read_single();

  // Create array
  $reservation_arr = array(
    'id' => $reservation->id,
    'date' => $reservation->date,
    'creneau' => $reservation->creneau,
    'ref' => $reservation->ref
  );

  // Make JSON
  print_r(json_encode($reservation_arr));
