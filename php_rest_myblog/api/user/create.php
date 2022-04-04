<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog user object
  $user = new User($db);

  // Get posted data
  $data = json_decode(file_get_contents("php://input"));

  $user->ref = $data->ref;
  $user->nom = $data->nom;
  $user->prenom = $data->prenom;
  $user->date_naissance = $data->date_naissance;

  // Create user
  if($user->create()) {
    echo json_encode(
      array('message' => 'user Created')
    );
  } else {
    echo json_encode(
      array('message' => 'user Not Created')
    );
  }

