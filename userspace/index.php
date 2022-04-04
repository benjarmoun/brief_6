<?php
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';
$home = new HomeController();


$pages = ['home','homeee','add','update','delete','logout','addReservation','reservations','reservations2'];
    

if(isset($_SESSION['log']) && $_SESSION['log'] === true){
        if(isset($_GET['page'])){
            if(in_array($_GET['page'] , $pages)){
                $page = $_GET['page'];
                $home->index();
            }else{
                include('./views/includes/404.php');
            }
        }else{
            $home->index('home');
        }
        
    }else
        if( isset($_GET['page']) && $_GET['page'] === 'register'){ 
            $home->index('register');
        }
    else{
        $home->index('login');
    }
?>

<?php
    require_once './views/includes/footer.php';
?>
