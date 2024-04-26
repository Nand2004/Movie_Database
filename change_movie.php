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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Movie Directory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="delete_movie_directory.php">Delete Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movie_directory.php">Movie Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="change_movie_directory.php">Change Section</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Edit Movie</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['movie_id']; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
            </div>
            <div class="mb-3">
                <label for="releaseDate" class="form-label">Release Date:</label>
                <input type="text" class="form-control" id="releaseDate" name="releaseDate" value="<?php echo $row['releaseDate']; ?>">
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration:</label>
                <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $row['duration']; ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>">
            </div>
            <div class="mb-3">
                <label for="box_office_rating" class="form-label">Box Office Rating:</label>
                <input type="text" class="form-control" id="box_office_rating" name="box_office_rating" value="<?php echo $row['box_office_rating']; ?>">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre:</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $row['genre']; ?>">
            </div>
            <div class="mb-3">
                <label for="studio" class="form-label">Studio:</label>
                <input type="text" class="form-control" id="studio" name="studio" value="<?php echo $row['studio']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
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
