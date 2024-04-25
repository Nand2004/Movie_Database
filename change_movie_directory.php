<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include connection file
include 'includes/connection.php';

// Function to display actors
function displayActors($conn) {
    $output = "<h3>Actors</h3>";
    $sql = "SELECT * FROM actor";
    $result = $conn->query($sql);

    if ($result === false) {
        // Query failed
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Fetch and display actors
        $output .= "<table border='1'>";
        $output .= "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th><th>Place of Origin</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['actor_id'] . "</td>";
            $output .= "<td>" . $row['first_name'] . "</td>";
            $output .= "<td>" . $row['last_name'] . "</td>";
            $output .= "<td>" . $row['birth_date'] . "</td>";
            $output .= "<td>" . $row['place_of_origin'] . "</td>";
            $output .= "<td><a href='change_actor.php?id=" . $row['actor_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
    } else {
        // No actors found
        $output .= "0 results";
    }
    echo $output;
}
// Function to display movies
function displayMovies($conn) {
    $output = "<h3>Movies</h3>";
    $sql = "SELECT * FROM movie";
    $result = $conn->query($sql);

    if ($result === false) {
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $output .= "<table border='1'>";
        $output .= "<tr><th>ID</th><th>Title</th><th>Release Date</th><th>Duration</th><th>Description</th><th>Box Office Rating</th><th>Genre</th><th>Studio</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['movie_id'] . "</td>";
            $output .= "<td>" . $row['title'] . "</td>";
            $output .= "<td>" . $row['releaseDate'] . "</td>";
            $output .= "<td>" . $row['duration'] . "</td>";
            $output .= "<td>" . $row['description'] . "</td>";
            $output .= "<td>" . $row['box_office_rating'] . "</td>";
            $output .= "<td>" . $row['genre'] . "</td>";
            $output .= "<td>" . $row['studio'] . "</td>";
            $output .= "<td><a href='change_movie.php?id=" . $row['movie_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
    } else {
        $output .= "0 results";
    }
    echo $output;
}

// Function to display directors
function displayDirectors($conn) {
    $output = "<h3>Directors</h3>";
    $sql = "SELECT * FROM director";
    $result = $conn->query($sql);

    if ($result === false) {
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $output .= "<table border='1'>";
        $output .= "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Country of Origin</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['director_id'] . "</td>";
            $output .= "<td>" . $row['first_name'] . "</td>";
            $output .= "<td>" . $row['last_name'] . "</td>";
            $output .= "<td>" . $row['date_of_birth'] . "</td>";
            $output .= "<td>" . $row['country_of_origin'] . "</td>";
            $output .= "<td><a href='change_director.php?id=" . $row['director_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
    } else {
        $output .= "0 results";
    }
    echo $output;
}

// Function to display awards
function displayAwards($conn) {
    $output = "<h3>Awards</h3>";
    $sql = "SELECT * FROM awards";
    $result = $conn->query($sql);

    if ($result === false) {
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $output .= "<table border='1'>";
        $output .= "<tr><th>ID</th><th>Award Name</th><th>Year Won</th><th>Category</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['award_id'] . "</td>";
            $output .= "<td>" . $row['award_name'] . "</td>";
            $output .= "<td>" . $row['year_won'] . "</td>";
            $output .= "<td>" . $row['category'] . "</td>";
            $output .= "<td><a href='change_award.php?id=" . $row['award_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
    } else {
        $output .= "0 results";
    }
    echo $output;
}

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
        // Call the function to display actors
        displayActors($connection);
        ?>
    </section>

    <!-- Movie Section -->
    <section class="movie_section">
        <?php 
        // Call the function to display movies
        displayMovies($connection);
        ?>
    </section>

    <!-- Director Section -->
    <section class="director_section">
        <?php 
        // Call the function to display directors
        displayDirectors($connection);
        ?>
    </section>

    <!-- Awards Section -->
    <section class="awards_section">
        <?php 
        // Call the function to display awards
        displayAwards($connection);
        ?>
    </section>

</div>

</body>
</html>
