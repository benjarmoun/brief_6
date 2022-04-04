<?php
 class Reservation {
    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO reservation(flight_id,user_id,passenger_fname,passenger_lname,passenger_birth_date,depart,arrive,depart_date) VALUES(:flight_id,:user_id,:passenger_fname,:passenger_lname,:passenger_birth_date,:depart,:arrive,:depart_date);');
        
        $stmt->bindParam(':flight_id',$data['flight_id']);
        $stmt->bindParam(':user_id',$data['user_id']);
        $stmt->bindParam(':passenger_fname',$data['passenger_fname']);
        $stmt->bindParam(':passenger_lname',$data['passenger_lname']);
        $stmt->bindParam(':passenger_birth_date',$data['passenger_birth_date']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':arrive',$data['arrive']);
        $stmt->bindParam(':depart_date',$data['depart_date']);

        if($stmt->execute()){
            // echo "<script>alert('yes');</script>";
            return 'OK';
        }else{
            echo "<script>alert('No');</script>";
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM reservation');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function getid(){
        $stmt = DB::connect()->prepare('SELECT  FROM reservation where ');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function getReservation($data){
        $id = $data['id'];
        try{
           $query = 'SELECT * FROM reservation WHERE id = :id';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array(":id" => $id));
           $reservation = $stmt -> fetch(PDO::FETCH_OBJ);
           return $reservation;
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }

    static public function searchReservation($data){
        $search = $data['search'];
        try{
        $query = 'SELECT * FROM reservation WHERE passenger_fname LIKE ? or passenger_lname LIKE ?';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
            return $reservation= $stmt->fetchAll();
        } catch(PDOExeption $ex){
        echo 'erreur' . $ex->getMessage();
        }
    }





 }