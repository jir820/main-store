<?php
 /*
 user this empoint to request

 */
/*session_start();
if (!isset($_SESSION['user_id'])) {
    header('refresh:0;url=signin.html');
} else {
    header('refresh:0;url=home.php');
}*/
 


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
