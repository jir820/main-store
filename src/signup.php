<?php
    // get data from frontend
    $firs_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $iden_name = $_POST['idname'];
    $phone_name = $_POST['phonename'];
    $email_name = $_POST['emailname'];
    $password_name = MD5($_POST['passwordname']);


    echo "<br>" . $firs_name;
    echo "<br>" . $last_name;
    echo "<br>" . $iden_name;
    echo "<br>" . $phone_name;
    echo "<br>" . $email_name;
    echo "<br>" . $password_name;

