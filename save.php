<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raisoni";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected<br>";
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email']; 
    $pwd = $_POST['password'];
    $repwd = $_POST['repassword'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];

    // Prepare the SQL statement
    $sql = "INSERT INTO `staff` (`first`, `last`, `email`, `pwd`, `repwd`, `mobile`, `gender`) 
            VALUES ('$first', '$last', '$email', '$pwd', '$repwd', '$mobile', '$gender')";

    if (mysqli_query($con, $sql)) {
        echo "Data Submitted";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "No data submitted. Please fill out the form.";
}

// Close the connection
mysqli_close($con);
?>
