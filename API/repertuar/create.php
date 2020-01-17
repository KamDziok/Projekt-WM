<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once './../config/Database.php';
    include_once './../models/Repertuar.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu Repertuar
    $repertuar = new Repertuar($db);

    try{
        $data = json_decode(file_get_contents('php://input'), true);
    
        $repertuar->id_filmu = $data['film'];
        $repertuar->id_saliFKRep = $data['id_sali'];
        $repertuar->data = $data['data']['date'];

        //utworz repertuar
        if($repertuar->create()){
            echo json_encode(array('message' => 'Repertuar Created'));
        }else{
            echo json_encode(array('message' => 'Repertuar Not Created'));
        }
        }catch(Exception $e){
            echo $e->getMessage();
        }