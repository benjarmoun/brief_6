<?php
// require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';
$home = new HomeController();
$res = new ReservationController();
$user = new userController();


$pages = ['addReservation','getReservations','getUserReservations','deleteReservation','getSingleReservation','updateReservation','auth','addUser','deleteUser','getSingleUser','getUsers','updateUser'];
// $parts = explode('/',$_GET['page']);
// print_r($parts) ;
// if(isset($_SESSION['log']) && $_SESSION['log'] === true){
        if(isset($_GET['page'])){
            if(in_array($_GET['page'] , $pages)){
                $page = $_GET['page'];
                // echo $page;
                if(method_exists($res, $page)){
                    $home->index($page,$res);
                }else{
                    if(method_exists($user, $page)){
                        $home->index($page,$user);
                    }
                }
                
            }else{
                // include('./views/includes/404.php');
                echo "not found";
            }
        }else{
            // $home->index();
            $res->readReservation();

        }
        
    // }else
    //     if( isset($_GET['page']) && $_GET['page'] === 'register'){ 
    //         $home->index('register');
    //     }
    // else{
    //     $home->index('login');
    // }

?>
