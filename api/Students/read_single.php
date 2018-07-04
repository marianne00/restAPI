<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Users.php';

    //Instantiate Database Class
    $database = new Database();
    $db = $database->connect();

    //Instantiate Users Class
    $users = new Users($db); 

    //Get ID from URL
    $users->stud_id = isset($_GET['stud_id']) ? $_GET['stud_id'] : die();
    
    //Get Post
    $users->singleStudent();

    //Create array
    $student_arr = array(
        'stud_id' => $users->stud_id,
        'fname' => $users->fname,
        'mname' => $users->mname,
        'lname' => $users->lname,
        'section' => $users->section_name
    );

    print_r(json_encode($student_arr));