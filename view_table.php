<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "database.php";

$db = new Database();
$conn = $db->getConnection(); 
?>

<table border="1" cellpadding="10">
<p><h3>registration table</h3></p>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Role</th>
    <th>update</th>
    <th>Delete</th>
   
    
</tr>

<?php
$result = $conn->query("SELECT * FROM register");

while($row = $result->fetch_assoc()){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phonenum']; ?></td>
    <td><?php echo $row['role']; ?></td>
    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>

<?php } ?>

</table>

<br>

<a href="logout.php">Logout</a>
