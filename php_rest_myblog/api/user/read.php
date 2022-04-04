<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate user object
  $user = new User($db);

  // Blog user query
  $result = $user->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any users
  if($num > 0) {
      // user array
      $users_arr = array();
      // $users_arr['data'] = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
          'ref' => $ref,
          'nom' => $nom,
          'prenom' => $prenom,
          'date_naissance' => $date_naissance
        );

        // Push to "data"
        array_push($users_arr, $user_item);
        // array_push($users_arr['data'], $user_item);
      }

      // Turn to JSON & output
      echo json_encode($users_arr);
      
  } else {
      // No users
      echo json_encode(
        array('message' => 'No users Found')
      );
  }