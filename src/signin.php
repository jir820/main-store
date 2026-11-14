<?php
require('../settings/database.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header('refresh:0;url=signin.html');
} else {
    header('refresh:0;url=home.php');
}

    // get data from frontend
    $email_name = $_POST['emailname'];
    $password_name = MD5($_POST['passwordname']);

   $sql_check_email = "
   
    SELECT
        id,
        firstname,
        lastname,
        email,
        url_photo
 
    FROM
        users
    WHERE
 
        email = '$email_name' and
        password ='$password_name'
 
";
    
    $res = pg_query($local_conn, $sql_check_email);
    $total = pg_num_rows($res);
    $row = pg_fetch_assoc($res);

    if ($total > 0){   
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];

        header('refresh: 0; url=home.php');
    }else{
        echo "<script>alert('user email does not exists. try again !!!')</script>";
        header('refresh: 0; url=signin.html');
    }