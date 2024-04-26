<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include connection file
include 'includes/connection.php';

// Function to display actors
function displayActors($conn) {
    $output = "<h3 class='mt-5'>Actors</h3>";
    $sql = "SELECT * FROM actor";
    $result = $conn->query($sql);

    if ($result === false) {
        // Query failed
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Fetch and display actors
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped'>";
        $output .= "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th><th>Place of Origin</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['actor_id'] . "</td>";
            $output .= "<td>" . $row['first_name'] . "</td>";
            $output .= "<td>" . $row['last_name'] . "</td>";
            $output .= "<td>" . $row['birth_date'] . "</td>";
            $output .= "<td>" . $row['place_of_origin'] . "</td>";
            $output .= "<td><a class='btn btn-primary btn-sm' href='change_actor.php?id=" . $row['actor_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table>";
        $output .= "</div>";
    } else {
        // No actors found
        $output .= "0 results";
    }
    echo $output;
}

// Function to display movies
function displayMovies($conn) {
    $output = "<h3 class='mt-5'>Movies</h3>";
    $sql = "SELECT * FROM movie";
    $result = $conn->query($sql);

    if ($result === false) {
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped'>";
        $output .= "<thead><tr><th>ID</th><th>Title</th><th>Release Date</th><th>Duration</th><th>Description</th><th>Box Office Rating</th><th>Genre</th><th>Studio</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
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
            $output .= "<td><a class='btn btn-primary btn-sm' href='change_movie.php?id=" . $row['movie_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table>";
        $output .= "</div>";
    } else {
        $output .= "0 results";
    }
    echo $output;
}

// Function to display directors
function displayDirectors($conn) {
    $output = "<h3 class='mt-5'>Directors</h3>";
    $sql = "SELECT * FROM director";
    $result = $conn->query($sql);

    if ($result === false) {
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped'>";
        $output .= "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Country of Origin</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['director_id'] . "</td>";
            $output .= "<td>" . $row['first_name'] . "</td>";
            $output .= "<td>" . $row['last_name'] . "</td>";
            $output .= "<td>" . $row['date_of_birth'] . "</td>";
            $output .= "<td>" . $row['country_of_origin'] . "</td>";
            $output .= "<td><a class='btn btn-primary btn-sm' href='change_director.php?id=" . $row['director_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table>";
        $output .= "</div>";
    } else {
        $output .= "0 results";
    }
    echo $output;
}

// Function to display awards
function displayAwards($conn) {
    $output = "<h3 class='mt-5'>Awards</h3>";
    $sql = "SELECT * FROM awards";
    $result = $conn->query($sql);

    if ($result === false) {
        $output .= "Error executing the query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped'>";
        $output .= "<thead><tr><th>ID</th><th>Award Name</th><th>Year Won</th><th>Category</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['award_id'] . "</td>";
            $output .= "<td>" . $row['award_name'] . "</td>";
            $output .= "<td>" . $row['year_won'] . "</td>";
            $output .= "<td>" . $row['category'] . "</td>";
            $output .= "<td><a class='btn btn-primary btn-sm' href='change_award.php?id=" . $row['award_id'] . "'>Edit</a></td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table>";
        $output .= "</div>";
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Movie Data</a>
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
    <h2 class="mt-5">Change Movie Data</h2>

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

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
