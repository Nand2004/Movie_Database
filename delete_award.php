<?php
// Check if award ID is provided
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'movie_directory');
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        // Prepare and bind the SQL statement with placeholders
        $stmt = $conn->prepare("DELETE FROM awards WHERE award_id = ?");
        
        if ($stmt === false) {
            echo "<script>alert('Error preparing statement: " . $conn->error . "');</script>"; // Debug statement
        } else {
            // Bind parameters to the statement
            $stmt->bind_param("i", $id);
            
            // Execute the statement
            if ($stmt->execute() === TRUE) {
                echo "<script>alert('Award deleted successfully');</script>";
            } else {
                echo "<script>alert('Error executing query: " . $stmt->error . "');</script>"; // Debug statement
            }
    
            // Close the statement
            $stmt->close();
        }
        
        // Close the connection
        $conn->close();

        // Redirect back to the main page
        echo "<script>window.location.href = 'delete_movie_directory.php';</script>";
    }
} else {
    echo "<script>alert('Award ID not provided');</script>";
}
?>
