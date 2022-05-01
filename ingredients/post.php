<?php

        //headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods : POST');
        header('Access-Control-Allow-Headers : Access-Control-Allow-Headers,Content-type, Access-control-Allow-Methods, Authorization, X-Requested-With');
    
        include_once('../config/Database.php');
        include_once('../models/ingr.php');
    
        //instanciate database and connect
        $database = new Database();
        $db = $database->connect();


        //instance db
        $ingr = new Ingr($db);

        //get raw posted data
        $data = json_decode(file_get_contents('php://input'));

        $ingr->name = $data->name;
        $ingr->quantity = $data->quantity;

        //create ingredients
        if($ingr->create()){
                echo json_encode(
                        array('message'=>'ingredients submitted')
                );
        }else{
                echo json_encode(
                        array('message'=>'ingredients not submitted')
                );
        }