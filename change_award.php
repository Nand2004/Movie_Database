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
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit Award</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['award_id']; ?>">
        <label for="award_name">Award Name:</label><br>
        <input type="text" id="award_name" name="award_name" value="<?php echo $row['award_name']; ?>"><br>
        <label for="year_won">Year Won:</label><br>
        <input type="text" id="year_won" name="year_won" value="<?php echo $row['year_won']; ?>"><br>
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>"><br>
        <button type="submit">Update</button>
    </form>
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
