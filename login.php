<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<form id="loginForm">
    <h2>Login Page</h2>

    <input type="email" id="email" name="email" placeholder="Enter Email" required>
    <br><br>

    <input type="password" id="password" name="password" placeholder="Enter Password" required>
    <br><br>

    <button type="submit">Login</button>
</form>

<h3 id="result"></h3>

<script>
$(document).ready(function () {

    $("#loginForm").submit(function (e) {

        e.preventDefault();

        $.ajax({
            url: "login_db.php",
            type: "POST",
            data: {
                email: $("#email").val(),
                password: $("#password").val()
            },

            success: function(response) {

                response = response.trim();

                if (response === "USER") {
                    window.location.href = "home.php";
                }
                else if (response === "ADMIN") {
                    window.location.href = "view_table.php";
                }
                else {
                    $("#result").html(response);
                }
            },

            error: function() {
                $("#result").html("Something went wrong");
            }
        });

    });

});
</script>

</body>
</html> 
