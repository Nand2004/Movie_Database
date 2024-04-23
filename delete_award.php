<?php
// Check if award name, year won, and category are provided
if(isset($_POST['award_name']) && isset($_POST['year_won']) && isset($_POST['category'])) {
    $award_name = $_POST['award_name'];
    $year_won = $_POST['year_won'];
    $category = $_POST['category'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'movie_directory');
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        // Prepare and bind the SQL statement with placeholders
        $stmt = $conn->prepare("DELETE FROM awards WHERE award_name = ? AND year_won = ? AND category = ?");
        
        // Bind parameters to the statement
        $stmt->bind_param("sds", $award_name, $year_won, $category);
        
        // Execute the statement
        if ($stmt->execute() === TRUE) {
            echo "<script>alert('Award deleted successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        // Redirect back to the main page
        echo "<script>window.location.href = 'delete_movie_directory.php';</script>";
    }
} else {
    echo "<script>alert('Award information not provided');</script>";
}
?>
