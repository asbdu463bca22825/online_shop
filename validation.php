$(document).ready(function () {

    $("#registerForm").on("submit", function (e) {

        if (!validateForm()) {
            e.preventDefault(); 
        }

    });

});

function validateForm() {

    let name = $("#name").val().trim();
    let email = $("#email").val().trim();
    let password = $("#password").val();
    let confirmpassword = $("#confirmpassword").val();
    let phonenum = $("#phonenum").val().trim();
    let role = $("#role").val();

    let namePattern = /^[A-Za-z\s]{3,50}$/;
    if (!namePattern.test(name)) {
        alert("Name should contain only letters and spaces (3-50 characters)");
        return false;
    }

    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    let passwordPattern =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passwordPattern.test(password)) {
        alert(
            "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character"
        );
        return false;
    }

    if (password !== confirmpassword) {
        alert("Passwords do not match");
        return false;
    }

    let phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phonenum)) {
        alert("Phone number must be exactly 10 digits");
        return false;
    }

    if (role === "") {
        alert("Please select a role");
        return false;
    }

    return true;
