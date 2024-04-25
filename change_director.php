<?php
// Include connection file
include 'includes/connection.php';

// Function to edit director
function editDirector($conn) {
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $country_of_origin = $_POST['country_of_origin'];

        // Update the director record in the database
        $sql = "UPDATE director SET first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', country_of_origin='$country_of_origin' WHERE director_id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            echo "<script>window.location.href = 'change_movie_directory.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Check if form is submitted for editing director
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editDirector($connection);
}

// Check if an ID parameter is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the director record from the database based on the provided ID
    $sql = "SELECT * FROM director WHERE director_id = $id";
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
    <title>Edit Director</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit Director</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['director_id']; ?>">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>"><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>"><br>
        <label for="date_of_birth">Date of Birth:</label><br>
        <input type="text" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>"><br>
        <label for="country_of_origin">Country of Origin:</label><br>
        <input type="text" id="country_of_origin" name="country_of_origin" value="<?php echo $row['country_of_origin']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Director not found.";
    }
} else {
    echo "Director ID parameter is missing.";
}

?>
