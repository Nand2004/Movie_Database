<?php
// Include connection file
include 'includes/connection.php';

// Function to edit award
function editAward($conn) {
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $award_name = $_POST['award_name'];
        $year_won = $_POST['year_won'];
        $category = $_POST['category'];

        // Update the award record in the database
        $sql = "UPDATE awards SET award_name='$award_name', year_won='$year_won', category='$category' WHERE award_id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            echo "<script>window.location.href = 'change_movie_directory.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Check if form is submitted for editing award
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editAward($connection);
}

// Check if an ID parameter is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the award record from the database based on the provided ID
    $sql = "SELECT * FROM awards WHERE award_id = $id";
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
    <title>Edit Award</title>
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
        <h2>Edit Award</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['award_id']; ?>">
            <div class="mb-3">
                <label for="award_name" class="form-label">Award Name:</label>
                <input type="text" class="form-control" id="award_name" name="award_name" value="<?php echo $row['award_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="year_won" class="form-label">Year Won:</label>
                <input type="text" class="form-control" id="year_won" name="year_won" value="<?php echo $row['year_won']; ?>">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $row['category']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "Award not found.";
    }
} else {
    echo "Award ID parameter is missing.";
}


?>
