<?php
// Include connection file
include 'includes/connection.php';

// Function to edit movie
function editMovie($conn) {
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $releaseDate = $_POST['releaseDate'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $box_office_rating = $_POST['box_office_rating'];
        $genre = $_POST['genre'];
        $studio = $_POST['studio'];

        // Update the movie record in the database
        $sql = "UPDATE movie SET title='$title', releaseDate='$releaseDate', duration='$duration', description='$description', box_office_rating='$box_office_rating', genre='$genre', studio='$studio' WHERE movie_id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            echo "<script>window.location.href = 'change_movie_directory.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Check if form is submitted for editing movie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editMovie($connection);
}

// Check if an ID parameter is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the movie record from the database based on the provided ID
    $sql = "SELECT * FROM movie WHERE movie_id = $id";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display a form with input fields pre-filled with the current values
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit Movie</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['movie_id']; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
        <label for="releaseDate">Release Date:</label><br>
        <input type="text" id="releaseDate" name="releaseDate" value="<?php echo $row['releaseDate']; ?>"><br>
        <label for="duration">Duration:</label><br>
        <input type="text" id="duration" name="duration" value="<?php echo $row['duration']; ?>"><br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>"><br>
        <label for="box_office_rating">Box Office Rating:</label><br>
        <input type="text" id="box_office_rating" name="box_office_rating" value="<?php echo $row['box_office_rating']; ?>"><br>
        <label for="genre">Genre:</label><br>
        <input type="text" id="genre" name="genre" value="<?php echo $row['genre']; ?>"><br>
        <label for="studio">Studio:</label><br>
        <input type="text" id="studio" name="studio" value="<?php echo $row['studio']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Movie not found.";
    }
} else {
    echo "Movie ID parameter is missing.";
}


?>
