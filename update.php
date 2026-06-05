

<?php
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenum = $_POST['phonenum'];

    
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $password = $row['password']; // keep old password
    }

    $result = $user->updateUser($id, $name, $email, $password, $phonenum);

    if($result === "success"){
        header("Location: view_table.php");
        exit();
    } else {
        echo $result;
    }
}
?>
<form method="POST">

<input type="text" name="name"
value="<?php echo $row['name']; ?>"><br><br>

<input type="email" name="email"
value="<?php echo $row['email']; ?>"><br><br>

<input type="password" name="password"
placeholder="Enter new password (leave blank to keep old)"><br><br>

<input type="tel" name="phonenum"
value="<?php echo $row['phonenum']; ?>"><br><br>

<!-- REMOVE ROLE INPUT (security issue) -->

<button type="submit" name="update">Update</button>

</form>
