<?php
$title = $_POST['title'];
$releaseDate = $_POST['releaseDate'];
$duration = $_POST['duration'];
$description = $_POST['description'];
$box_office_rating = $_POST['box_office_rating'];
$genre = $_POST['genre'];
$studio = $_POST['studio'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'movie_directory');
if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    // Prepare and bind the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO movie (title, releaseDate, duration, description, box_office_rating, genre, studio) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters to the statement
    $stmt->bind_param("ssdssss", $title, $releaseDate, $duration, $description, $box_office_rating, $genre, $studio);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Movie saved successfully');</script>";
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
