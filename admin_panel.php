<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$servername = "localhost";
$username = "root";  // Update with your DB username
$password = "";      // Update with your DB password
$dbname = "user_submit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

echo "<div class='container'>";
echo "<h2>Appointments List</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Date</th><th>Time</th><th>Notes</th></tr>";
    while($row = $result->fetch_assoc()) {
        $name = isset($row['name']) ? $row['name'] : 'N/A';
        $email = isset($row['email']) ? $row['email'] : 'N/A';
        $phone = isset($row['phone']) ? $row['phone'] : 'N/A';
        $service = isset($row['service']) ? $row['service'] : 'N/A';
        $date = isset($row['date']) ? $row['date'] : 'N/A';
        $time = isset($row['time']) ? $row['time'] : 'N/A';
        $notes = isset($row['notes']) ? $row['notes'] : 'N/A';

        echo "<tr><td>" . $row["id"]. "</td><td>" . $name. "</td><td>" . $email. "</td><td>" . $phone. "</td><td>" . $service. "</td><td>" . $date. "</td><td>" . $time. "</td><td>" . $notes. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No appointments found.</p>";
}

echo "</div>";
$conn->close();
?>
