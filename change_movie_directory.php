<?php
// Include connection file
include 'connection.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Movie Data</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>

    <div class="navbar">
        <a href="delete_movie_directory.php">Delete Section</a>
        <a href="movie_directory.php">Movie Section</a>
        <a href="change_movie_directory.php">Change Section</a>
    </div>

<div class="container">
    <h2>Change Movie Data</h2>

    <!-- Actor Section -->
    <section class="actor_section">
        <?php 
        function displayActors($conn) {
            $output = "<h3>Actors</h3>";
            $sql = "SELECT * FROM actor";
            $result = $conn->query($sql);
        
            if ($result) {
                if ($result->num_rows > 0) {
                    $output .= "<table border='1'>";
                    $output .= "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th><th>Place of Origin</th><th>Action</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        $output .= "<tr>";
                        $output .= "<td>" . $row['actor_id'] . "</td>";
                        $output .= "<td>" . $row['first_name'] . "</td>";
                        $output .= "<td>" . $row['last_name'] . "</td>";
                        $output .= "<td>" . $row['birth_date'] . "</td>";
                        $output .= "<td>" . $row['place_of_origin'] . "</td>";
                        $output .= "<td><button>Edit</button></td>";
                        $output .= "</tr>";
                    }
                    $output .= "</table>";
                } else {
                    $output .= "0 results";
                }
            } else {
                $output .= "Error: " . $conn->error;
            }
            echo $output;
        }
        displayActors($conn);
        ?>
    </section>

    <!-- Awards Section -->
    <!-- Include other sections in a similar manner -->

</div>

</body>
</html>
