<?php
// Get form data
$title = $_POST['title'];
$releaseDate = $_POST['releaseDate'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'movie_directory');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute SQL statement to delete the movie
$stmt = $conn->prepare("DELETE FROM movie WHERE title = ? AND releaseDate = ?");
$stmt->bind_param("ss", $title, $releaseDate);

if ($stmt->execute() === TRUE) {
    echo "<script>alert('Movie deleted successfully');</script>";
} else {
    echo "<script>alert('Error deleting movie: " . $conn->error . "');</script>";
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect back to the HTML page
echo "<script>window.location.href = 'movie_directory.html';</script>";
?>
