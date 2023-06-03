<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orders";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert"])) {
    $name = $_POST['customerName'];
    $Details = $_POST['orderDetails'];

    $sql = "INSERT INTO `order` (Name, orders) VALUES ('$name', '$Details')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $name = $_POST['customerName'];

    $sql = "DELETE FROM  `order` WHERE Name='$name'";
    if ($conn->query($sql) === TRUE) {
        echo "Data deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




if (isset($_GET["query"])) {
    $selectQuery = "SELECT * FROM `order`";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo "Records in the table:<br>";
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row['Name'] . ", Orders: " . $row['orders'] ."<br>";
        }
    } else {
        echo "No records found in the table";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $name = $_POST['customerName'];
    $Details = $_POST['orderDetails'];

    $sql = "UPDATE  `order` SET orders =' $Details' WHERE Name='$name'";
    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



// Step 4: Close the database connection
$conn->close();
?>
