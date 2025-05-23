<?php
if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $queryadd = mysqli_query($conn, "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$name', '$password', '$email')");
    $URL  = $_SERVER['REQUEST_URI'];
    header("location: $URL");
    exit();
}
?>
<div class="container">
    <form id="signupForm"  method="post">
        <h2>Sign Up</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" ><span id="nameError" class="error"></span>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"> <span id="emailError" class="error"></span>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"> <span id="passwordError" class="error"></span>
        <button type="submit" name="add_user">Sign Up</button>
    </form>
</div>

<script>

    document.getElementById('signupForm').addEventListener('submit', function(event) {
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    
    let valid = true;

    const name = document.getElementById('name').value;
    if (name.trim() === '') {
        document.getElementById('nameError').textContent = 'Name is required.';
        valid = false;
    }

    const email = document.getElementById('email').value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email.trim() === '') {
        document.getElementById('emailError').textContent = 'Email is required.';
        valid = false;
    } else if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format.';
        valid = false;
    }

    const password = document.getElementById('password').value;
    if (password.trim() === '') {
        document.getElementById('passwordError').textContent = 'Password is required.';
        valid = false;
    } else if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Password must be at least 6 characters long.';
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});
</script>