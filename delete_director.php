<?php
// Check if actor's first name and last name are provided
if(isset($_POST['first_name']) && isset($_POST['last_name'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'movie_directory');
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        // Prepare and bind the SQL statement with placeholders
        $stmt = $conn->prepare("DELETE FROM director WHERE first_name = ? AND last_name = ?");
        
        // Bind parameters to the statement
        $stmt->bind_param("ss", $first_name, $last_name);
        
        // Execute the statement
        if ($stmt->execute() === TRUE) {
            echo "<script>alert('Director deleted successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        // Redirect back to the main page
        echo "<script>window.location.href = 'delete_movie_directory.html';</script>";
    }
} else {
    echo "<script>alert('Actor's first name and last name not provided');</script>";
}
?>
