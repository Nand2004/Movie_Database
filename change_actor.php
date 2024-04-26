<?php
// Include connection file
include 'includes/connection.php';

// Function to edit actor
function editActor($conn) {
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $place_of_origin = $_POST['place_of_origin'];

        // Update the actor record in the database
        $sql = "UPDATE actor SET first_name='$first_name', last_name='$last_name', birth_date='$birth_date', place_of_origin='$place_of_origin' WHERE actor_id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            echo "<script>window.location.href = 'change_movie_directory.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Check if form is submitted for editing actor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editActor($connection);
}

// Check if an ID parameter is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the actor record from the database based on the provided ID
    $sql = "SELECT * FROM actor WHERE actor_id = $id";
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
    <title>Edit Actor</title>
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
        <h2>Edit Actor</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['actor_id']; ?>">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birth Date:</label>
                <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?php echo $row['birth_date']; ?>">
            </div>
            <div class="mb-3">
                <label for="place_of_origin" class="form-label">Place of Origin:</label>
                <input type="text" class="form-control" id="place_of_origin" name="place_of_origin" value="<?php echo $row['place_of_origin']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "Actor not found.";
    }
} else {
    echo "Actor ID parameter is missing.";
}
?>
