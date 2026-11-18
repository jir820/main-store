<?php
/*session_start();
if (!isset($_SESSION['user_id'])) {
    header('refresh:0;url=signin.html');
} else {
    header('refresh:0;url=home.php');
}
 */
 

require('../settings/database.php');
// get data from users
$sql = "
select 
    id,
    firstname || ' '  || lastname as fullname, 
    email, 
    mobile_phone, 
    case when status = true then 'active' else 'inactive' end as status,  
    url_photo
from 
   users
";
$res = pg_query($local_conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main store - list users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <h1>Lista de usuarios</h1>
    <table class="table table-striped">
        <tr>
            <th>Photo</th>         
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile Phone</th>
            <th>Status</th>
            <th>...</th>
        </tr>
        <?php while ($row = pg_fetch_assoc($res)) { ?>
        <tr>     
         <!-- here print data from database--> 
          <td>    
            <?php if ($row['url_photo'] != "") { ?>
                    <img src="<?php echo $row['url_photo']; ?>" width="60" height="60">
                <?php } else { ?>
                    Sin foto
                <?php } ?>
          </td>
          <td><?= $row['fullname']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['mobile_phone']; ?></td>
          <td><?= $row['status']; ?></td>
          <td><?= $row['url_photo']; ?></td>
          <td align="center">
            <a href="edit_user.php?id=<?=  $row['id']; ?>">
                <img src="icons/pencil.png" alt="edit user" width="20" >
            </a>
            <a href="#">
                <img src="icons/search.png" alt="search user" width="20" >
            </a>
            <a href="delete_user.php?id=<?= $row['id']; ?>">
                <img src="icons/trash.png" alt="delete user" width="20" >
            </a>
          </td>

        </tr>
    <?php } ?>

    </table>
    
</body>

menu:
<a href="home.php">home</a> |
</html>