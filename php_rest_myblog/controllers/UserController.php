<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST, DELETE, PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



  class UserController
  {
      public function auth()
      {
          // Instantiate DB & connect
          $database = new Database();
          $db = $database->connect();

          // Instantiate  user object
          $user = new User($db);

          // Get posted data
          $data = json_decode(file_get_contents("php://input"), true);
        //   die(var_dump($data));
          $user = new User($db);
          $result = $user->login($data);
            // print_r($result);
          // $result = User::login($data);
          if ($result->ref === $data['ref'] && $result->nom === $data['nom']) {
              echo json_encode($result);
          } else {
              echo json_encode(
                  array('message' => 'Login Failed')
              );
          }
      }

      public function addUser()
      {
          // Instantiate DB & connect
          $database = new Database();
          $db = $database->connect();

          // Instantiate  user object
          $user = new User($db);

          // Get posted data
          $data = json_decode(file_get_contents("php://input"));

          $user->ref = $data->ref;
          $user->nom = $data->nom;
          $user->prenom = $data->prenom;
          $user->date_naissance = $data->date_naissance;

          // Create user
          if ($user->create()) {
              echo json_encode(
                  array('message' => 'user Created')
              );
          } else {
              echo json_encode(
                  array('message' => 'user Not Created')
              );
          }
      }
    
      public function deleteUser()
      {
          // Instantiate DB & connect
          $database = new Database();
          $db = $database->connect();

          // Instantiate user object
          $user = new User($db);

          // Get raw posted data
          $data = json_decode(file_get_contents("php://input"));

          // Set ref to update
          $user->ref = $data->ref;

          // Delete user
          if ($user->delete()) {
              echo json_encode(
                  array('message' => 'User Deleted')
              );
          } else {
              echo json_encode(
                  array('message' => 'User Not Deleted')
              );
          }
      }
    
      public function getSingleUser()
      {
          $data = json_decode(file_get_contents("php://input"));
          // Instantiate DB & connect
          $database = new Database();
          $db = $database->connect();

          // Instantiate  user object
          $user = new User($db);

          // Get ID
          //   $user->ref = isset($_GET['ref']) ? $_GET['ref'] : die();

          // Get user
          $user_arr = $user->read_single($data->ref);

          // Create array
          //   $user_arr = array(
          //     'ref' => $user->ref,
          //     'nom' => $user->nom,
          //     'prenom' => $user->prenom,
          //     'date_naissance' => $user->date_naissance
          //   );

          // Make JSON
          print_r(json_encode($user_arr));
      }

      public function getUsers()
      {
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
          if ($num > 0) {
              // user array
              $users_arr = array();
              // $users_arr['data'] = array();

              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
      }

      public function updateUser()
      {
          // Instantiate DB & connect
          $database = new Database();
          $db = $database->connect();

          // Instantiate  user object
          $user = new User($db);

          // Get raw posted data
          $data = json_decode(file_get_contents("php://input"));

          // Set ref to update
          $user->ref = $data->ref;

          $user->nom = $data->nom;
          $user->prenom = $data->prenom;
          $user->date_naissance = $data->date_naissance;

          // Update user
          if ($user->update()) {
              echo json_encode(
                  array('message' => 'User Updated')
              );
          } else {
              echo json_encode(
                  array('message' => 'User Not Updated')
              );
          }
      }
  }
