<?php
//get data connection
    require('../settings/database.php');

    // get data from frontend
    $firs_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $iden_name = $_POST['idname'];
    $phone_name = $_POST['phonename'];
    $email_name = $_POST['emailname'];
    $password_name = MD5($_POST['passwordname']);

    // prepare query
    $sql="
    INSERT INTO 
    users (firstname, lastname, ident_number, email, password) 
    VALUES ('$firs_name', '$last_name', '$iden_name', '$email_name', '$password_name');
        ";

    
    // execute query
    $res = pg_query($local_conn, $sql);
    if ($res){
        echo "user has been created successfully"
    }else{
        echo "error creating user";
    }
  

