<?php


if(isset($_POST['find'])){
    $data = new ReservationController();
    $reservations = $data->findReservation();
}else{
    $data = new ReservationController();
    $reservations = $data->getAllReservations();
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
    <div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php');
            ?>
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                    <h2 class="p-3">My reservations</h2>
                        

                        <form class="float-right d-flex flex-row mb-2" method="post" action="">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                            <button class="btn btn-info btn-sm" name="find"  type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">flight id</th>
                                <th scope="col">Depart</th>
                                <th scope="col">Arrivé</th>
                                <th scope="col">Date de depart</th>
                                <th scope="col">passenger date of birth</th>
                                <th scope="col">pass fname</th>
                                <th scope="col">pass Lname</th>
                                <!-- <th scope="col">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach($reservations as $reservation):?>
                                    <tr>
                                        <th scope="row"><?php echo $reservation['id'];?></th>
                                        <td><?php echo $reservation['flight_id'];?></td>
                                        <td><?php echo $reservation['depart'];?></td>
                                        <td><?php echo $reservation['arrive'];?></td>
                                        <td><?php echo $reservation['depart_date'];?></td>
                                        <td><?php echo $reservation['passenger_birth_date'];?></td>
                                        <td><?php echo $reservation['passenger_fname'];?></td>
                                        <td><?php echo $reservation['passenger_lname'];?></td>
                                        <!-- <td class="d-flex flex-row">
                                            <form method="post" class="mr-1" action="updateReservation">
                                                <input type="hidden" name="id" value="<?php echo $reservation['id'];?>" >
                                                
                                                <button class="btn "><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="post" class="mr-1" action="delete">
                                                
                                                <button class="btn "><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>                                     -->
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
    
    






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
