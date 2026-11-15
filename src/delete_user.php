<?php
 /*
 user this empoint to request

 */
include('../settings/database.php');

$user_id =$_GET['userID'];
$sql_delete_user = "DELETE FROM users WHERE id = $user_id";
$res= pg_query($local_conn, $sql_delete_user);

if($res){
 echo "<script>alert('user has been deleted successfully !!!')</script>";
       header('refresh: 0; url=list_users.php');
    
}else{
    echo "<script>alert('user has not been deleted successfully !!!')</script>";
       header('refresh: 0; url=list_users.php');
}

?>
