<?php
/*
Use this Endpoint to test request
http://localhost/main-store/src/update_user.php?userID=ANY-ID-NUMBER
*/
session_start();
if (!isset($_SESSION['user_id'])) {
    header('refresh:0;url=signin.html');
} else {
    header('refresh:0;url=home.php');
}
 

include('../settings/database.php');
// get data
$user_id           = $_GET['userID'];
$user_status           = $_GET['userStatus'];

// prepare query
if ($user_status == 'active') {
    $new_userStatus = 'false';
} else {
    $new_userStatus = 'true';
}

$sql_update_user_status = "UPDATE users SET status = $new_userStatus WHERE id = $user_id";
$res = pg_query($local_conn, $sql_update_user_status);

if (!$res) {
    echo "<script>alert('user status has been updated successfully !!!')</script>"
    header("refresh: 0; url=list_users.php");
}else {
    echo "<script>alert('user status has not been updated successfully !!!')</script>"
    header('refresh: 0; url=list_users.php');
}
?>