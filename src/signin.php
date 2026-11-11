<?php
require('../settings/database.php');

    // get data from frontend
    $email_name = $_POST['emailname'];
    $password_name = MD5($_POST['passwordname']);

    $sql_check_email = "SELECT * FROM users WHERE email = '$email_name'";
    $res = pg_query($local_conn, $sql_check_email);
    $total = pg_num_rows($res);

    if ($total > 0){   
        header('refresh: 0; url=home.php');
    }else{
        echo "<script>alert('user email does not exists. try again !!!')</script>";
       // header('refresh: 0; url=signin.html');
    }