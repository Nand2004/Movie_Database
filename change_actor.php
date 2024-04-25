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
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit Actor</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['actor_id']; ?>">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>"><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>"><br>
        <label for="birth_date">Birth Date:</label><br>
        <input type="text" id="birth_date" name="birth_date" value="<?php echo $row['birth_date']; ?>"><br>
        <label for="place_of_origin">Place of Origin:</label><br>
        <input type="text" id="place_of_origin" name="place_of_origin" value="<?php echo $row['place_of_origin']; ?>"><br>
        <button type="submit">Update</button>
    </form>
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
