<?php
$award_name = $_POST['award_name'];
$year_won = $_POST['year_won'];
$category = $_POST['category'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'movie_directory');
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    // Prepare and bind the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO awards (award_name, year_won, category) 
                            VALUES (?, ?, ?)");
    
    // Bind parameters to the statement
    $stmt->bind_param("sis", $award_name, $year_won, $category);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Award saved successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the HTML page
    echo "<script>window.location.href = 'your_html_page.html';</script>";
}
?>
