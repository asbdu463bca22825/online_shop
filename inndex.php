<!DOCTYPE html>
<html>
<head>
 
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/validation.js"></script>

</head>

<body>

<form id="registerForm" action="register.php" method="POST">
	<h3>REGISTRATION FORM</h3>

    <input type="text" id="name" name="name" placeholder="Enter name">

    <input type="email" id="email" name="email" placeholder="Enter Email">

    <input type="password" id="password" name="password" placeholder="Enter password">

    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Enter confirm password">

    <input type="text" id="phonenum" name="phonenum" placeholder="Enter phone number">

    <select id="role" name="role" placeholder="Enter role">
        <option value="">Select Role</option>
        <option value="USER">User</option>
        <option value="ADMIN">Admin</option>
    </select>

    <button type="submit" name="submit">Register</button>

</form>

</body>
</html>
