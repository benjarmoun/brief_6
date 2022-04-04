<?php
if(isset($_POST['id'])){
    $Flight = new FlightsController();
    $flight = $Flight->getOneFlight();
    // die(print_r($flight));
}
// $nbr_pass = 1;
// if(isset($_POST['nbr_pass'])){
//     $nbr_pass = $_POST['nbr_pass'];
//     // die(print_r($nbr_pass));
// }

if(isset($_POST['submit'])){
    // if(isset($_POST['nbbPlace']))
    //     $nbr_pass = $_POST['nbbPlace'];
    $nbPlaces=$_POST['nbbPlace'];
    $newReservation = new ReservationController();
    $newReservation->addReservation();
}
?>


<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Booking</div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    
                    <form method="post" >
                        
                        
                    <?php
                        for($i=0; $i<$_POST['nbbPlace'];$i++):
                    ?>
                    <br>
                        <h5>Passager <?php echo $i+1 ?> </h5>
                        <div class="form-group">
                            <label class="m-2 mb-0" for="passenger_fname">passenger's first name</label>
                            <input type="text" name="<?php echo"passenger_fname".$i+1 ?>" class="form-control m-2" placeholder="First name" required>
                        </div>
                        <div class="form-group">
                            <label class="m-2 mb-0" for="passenger_lname">passenger's last name</label>
                            <input type="text" name=<?php echo "passenger_lname".$i+1 ?> class="form-control m-2" placeholder="Last name" required>
                            <input type="hidden" name="nbr_pass" value="<?= $_POST['nbbPlace'];?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" >
                            <input type="hidden" name="flight_id" value="<?php echo $flight->id;?>" >
                            <input type="hidden" name="depart" value="<?php echo $flight->depart;?>" >
                            <input type="hidden" name="arrive" value="<?php echo $flight->arrive;?>" >
                            <input type="hidden" name="depart_date" value="<?php echo $flight->date_depart;?>" >
                            
                        </div>
                        <div class="form-group">
                            <label class="m-2 mb-0" for="passenger_birth_date">passenger's date of birth</label>
                            <input type="date" name="<?php echo"passenger_birth_date".$i+1 ?>" class="form-control m-2"  max="<?= date("Y-m-d") ?>">
                        </div>
                        
                        
                        <?php
                            endfor;
                        ?>

                    

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary m-2">ADD</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>