<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth']; 
$country_of_origin = $_POST['country_of_origin']; 

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'movie_directory');
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    // Prepare and bind the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO director (first_name, last_name, date_of_birth, country_of_origin) 
                            VALUES (?, ?, ?, ?)");
    
    // Bind parameters to the statement
    $stmt->bind_param("ssss", $first_name, $last_name, $date_of_birth, $country_of_origin);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Director saved successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the HTML page
    echo "<script>window.location.href = 'movie_directory.php';</script>";
}
?>
