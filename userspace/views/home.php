<?php

if(isset($_POST['find'])){
    $data = new FlightsController();
    $flights = $data->findFlights2(); 

}else{
    $data = new FlightsController();
    $flights = $data->getAllFlights(); 
}
?>

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <i class="fas fa-solid fa-plane-departure me-2"></i>GLOBAL AIR
        </div>
                
        <div class="list-group list-group-flush my-3">
            <a href="<?php echo BASE_URL;?>home" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="fas fa-home me-2"></i>Home</a>

            <a href="<?php echo BASE_URL;?>reservations" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-shopping-cart me-2"></i>My Reservations</a>
            
            <a href="<?php echo BASE_URL;?>logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  fw-bold" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php echo $_SESSION['usern'];?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo BASE_URL;?>logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php');
            ?>
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <h2></h2>
                        <form class="d-flex flex-column"  method="post" action="">
                            <div class=" d-flex  col-xs-3">
                                <div class="col-sm-6 p-3">
                                    <label class="form-label" for="depart" >Depart</label>
                                    <input type="text" class="form-control mb-3" name="depart" placeholder="Depart">
                                    <label class="form-label" for="arrive">Arrive</label>
                                    <input type="text" class="form-control mb-3" name="arrive" placeholder="Arrive">
                                </div>
                                <div class="col-sm-6 p-3">
                                    <label class="form-label" for="nbr_pass">Number of passengers</label>
                                    <input type="number" class="form-control mb-3" id="nbr_pass" name="nbr_pass" min="1" value="1" />
                                    
                                    <label class="form-label" for="dated">Depart date</label>
                                    <input type="date" class="form-control mb-3" name="dated"  min="<?= date("Y-m-d") ?>">
                                </div>
                            </div>
                            <button class="btn btn-primary mt-0 m-3" name="find"  type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <!-- <?php include('./views/includes/alerts.php');
            ?> -->
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <h2 class="p-3">All flights</h2>
                        
                        <table class="table caption-top table-striped ">
                        
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">flight Number</th>
                                <th scope="col">Depart</th>
                                <th scope="col">Arrivé</th>
                                <th scope="col">Date de depart</th>
                                <th scope="col">prix</th>
                                <th scope="col">Nbr de places</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach($flights as $flight):
                                // if(empty($flights)){
                                    
                                // }
                                    ?>
                                    
                                    <tr>
                                        <th scope="row"><?php echo $flight['id'];?></th>
                                        <td><?php echo $flight['flight_num'];?></td>
                                        <td><?php echo $flight['depart'];?></td>
                                        <td><?php echo $flight['arrive'];?></td>
                                        <td><?php echo $flight['date_depart'];?></td>
                                        <td><?php echo $flight['prix'];?></td>
                                        <td><?php echo $flight['nb_places'];?></td>
                                        <td >
                                            <form method="post" class="mr-1" action="addReservation">
                                                <input type="hidden" name="nbbPlace" value="<?php if(isset($_POST['find'])) echo $_POST['nbr_pass']; else echo $_POST['nbr_pass']=1?>">
                                                <input type="hidden" name="id" value="<?php echo $flight['id'];?>" >
                                                <!-- <input type="hidden" class="form-control mb-3" id="nbr_pass" name="nbr_pass" value="1" /> -->
                                                <!-- <input type="hidden" name="depart" value="<?php echo $flight['depart'];?>" >
                                                <input type="hidden" name="arrive" value="<?php echo $flight['arrive'];?>" > -->
                                                <button id="test" class="btn btn-primary">BOOK</button>
                                            </form>
                                            <!-- <form method="post" class="mr-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $flight['id'];?>" >
                                                <button class="btn "><i class="fa fa-trash"></i></button>
                                            </form> -->
                                        </td>                                    
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
