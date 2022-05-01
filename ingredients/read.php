<?php

    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../config/Database.php');
    include_once('../models/ingr.php');

    //instanciate database and connect
    $database = new Database();
    $db = $database->connect();

    //instanciate ingredients object 
    $ingredients = new Ingr($db);

    //ingredients query
    $result = $ingredients->read();

    //get row count
    $num = $result->rowCount();

    //check if any ingredients
    if ( $num > 0){
        //ing array
        $ing_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $ing_item = array(
                'name' => $name,
                'quantity' => $quantity
            );

            //push to data
            array_push($ing_arr,$ing_item);
        };

        //turn into json and output
        echo json_encode($ing_arr);
    }
    else{
        //No post
        echo json_encode(array('message'=>'no item found'));
    };
    
