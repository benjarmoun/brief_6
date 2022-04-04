<?php

if(isset($_POST['submit'])){
    $loginUser = new UserController();
    $loginUser->auth(); 
}else{
    // die(print('error'));

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
                            <h3 class="text-center">Log In</h3>
                        </div>
                        <form method="post" class="mr-1" >
                            <div class="form-group p-1">
                                <input type="text" name="usern" placeholder="User name" class="form-control" >
                            </div>
                            <div class="form-group p-1">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <button name="submit" class="btn btn-sm btn-primary m-1">Log In</button>
                        </form>
                        <div>
                            <a href="<?php echo BASE_URL;?>register" class="btn btn-link p-1" > Singn Up</a>
                        </div>
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body{
        background-image: url("css/maroc_menara-airport-1.jpg");
        background-image: no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

    }
</style>