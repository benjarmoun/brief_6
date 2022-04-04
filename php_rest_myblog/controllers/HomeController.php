<?php

class HomeController{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST, DELETE, PUT');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    }
    // public function index(){
    //     echo json_encode(array("Success"=>"yeees"));
    // }

    // public function index($page){
    //     include ('views/'.$page.'.php');
    // }
    
    public function index($page,$res){
        // $res = new ReservationController();
        // $res = new userController();
        $res->$page();
    }

}