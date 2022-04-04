<?php

if(isset($_POST['submit'])){
    $createUser = new UserController();
    $createUser->register(); 
}

?>


<div class="container">
    <div class="row my-3">
        <div class="col-md-5 mx-auto">
            <?php include('./views/includes/alerts.php');
            ?>
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <div class="card-header">
                            <h3 class="text-center">Sign Up</h3>
                        </div>
                        <form method="post" class="mr-1" >
                            <div class="form-group p-1">
                                <input type="text"  required name="prenom" placeholder="First Name" class="form-control" >
                            </div>
                            <div class="form-group p-1">
                                <input type="text"   required name="nom" placeholder="Last Name" class="form-control">
                            </div>
                            <div class="form-group p-1">
                                <input type="text"   required required name="usern" placeholder="User name" class="form-control" >
                            </div>
                            <div class="form-group p-1">
                                <input type="password"  required name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group p-1">
                                <input type="text"  required name="adresse" placeholder="Address" class="form-control" >
                            </div>
                            <div class="form-group p-1">
                                <input type="number"  required name="tele" placeholder="Phone Number" class="form-control">
                            </div>
                            <button name="submit" class="btn btn-sm btn-primary m-1">Sign Up</button>
                            <p><br>If you already have an account </p>
                            <a href="<?php echo BASE_URL;?>login" class="btn btn-sm btn-primary m-1" >Log in</a>
                        </form>
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>