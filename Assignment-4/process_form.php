<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contactusforminfo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO my_table (first_name, last_name, email, phone, message)
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
        $conn->close();
        echo '<script>setTimeout(function() { window.location.href = "index.html"; }, 3000);</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
