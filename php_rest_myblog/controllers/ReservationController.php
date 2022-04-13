<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, DELETE, PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

// include_once '../../config/Database.php';
// include_once '../../models/reservations.php';


class ReservationController{
    public function addReservation(){
        
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
    }
    public function getReservations(){

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate reservation object
        $reservation = new Reservations($db);

        // reservation read query
        $result = $reservation->read();

        // Get row count
        $num = $result->rowCount();

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
    }

    public function getUserReservations(){
        $data = json_decode(file_get_contents("php://input"));
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();
        // Instantiate reservation object
        $reservation = new Reservations($db);

        // Get ref
        // $reservation->ref = isset($_GET['ref']) ? $_GET['ref'] : die();

        // Get post
        $res = $reservation->readRef($data->ref);

        // Make JSON
        print_r(json_encode($res));
    }


    public function getSingleReservation(){
        $data = json_decode(file_get_contents("php://input"));
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();
        // Instantiate reservation object
        $reservation = new Reservations($db);

        // Get ref
        // $reservation->ref = isset($_GET['ref']) ? $_GET['ref'] : die();

        // Get post
        $res = $reservation->read_single($data->id);

        
        // Make JSON
        print_r(json_encode($res));
    }

    public function deleteReservation(){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate blog post object
        $reservation = new Reservations($db);

        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        // Set ID to UPDATE
        $reservation->id = $data->id;

        // Delete post
        if($reservation->delete()) {
            echo json_encode(
            array('message' => 'Reservation deleted')
            );
        } else {
            echo json_encode(
            array('message' => 'Reservation not deleted')
            );
        }
    }    

    public function updateReservation(){
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
    }
}
