<?php
// Database connection
$db = new mysqli("localhost", "root", "", "services");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['pass'];

// SQL query to check user credentials
$query = "SELECT * FROM login_point WHERE email = '$email' AND passward = '$password'";
$result = $db->query($query);

if ($result->num_rows > 0) {
    // Successful login
    session_start();
    $_SESSION['email'] = $email;
    $filePath = '/Pro_ii/darkpan1/form.html';

    header("Location:  $filePath"); // Redirect to a dashboard or homepage
} else {
    // Failed login
    echo "Invalid email or password. <a href='login.php'>Try again</a>";
}

$db->close();
?>
