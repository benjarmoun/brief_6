<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog user object
  $user = new User($db);

  // Get ID
  $user->ref = isset($_GET['ref']) ? $_GET['ref'] : die();

  // Get user
  $user->read_single();

  // Create array
  $user_arr = array(
    'ref' => $user->ref,
    'nom' => $user->nom,
    'prenom' => $user->prenom,
    'date_naissance' => $user->date_naissance
  );

  // Make JSON
  print_r(json_encode($user_arr));