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

$sql_check_email = "SELECT * FROM users WHERE email = '$email_name'";
$res = pg_query($local_conn, $sql_check_email);
$total = pg_num_rows($res);
if ($total < 1){   
    // prepare query
        $sql="
        INSERT INTO 
        users (firstname, lastname, ident_number, email, password) 
        VALUES ('$firs_name', '$last_name', '$iden_name', '$email_name', '$password_name');
            ";
    
    
    // execute query
    $res = pg_query($local_conn, $sql);
    if ($res){
       // echo "user has been created successfully";
       echo "<script>alert('user has't been created successfully !!!";
       header('refresh: 0; url=signin.html');
       }else{
        echo "error creating user";
       }
}else{
        echo "<script>alert('user email already exists. try again !!!')</script>";
       header('refresh: 0; url=signup.html');
}
  

