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
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-bordered'>";
        $output .= "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th><th>Place of Origin</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['actor_id'] . "</td>";
            $output .= "<td>" . $row['first_name'] . "</td>";
            $output .= "<td>" . $row['last_name'] . "</td>";
            $output .= "<td>" . $row['birth_date'] . "</td>";
            $output .= "<td>" . $row['place_of_origin'] . "</td>";
            $output .= "<td>
                            <form action='delete_actor.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['actor_id'] . "'>
                                <button type='submit' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table></div>";
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
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-bordered'>";
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
            $output .= "<td>
                            <form action='delete_movie.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['movie_id'] . "'>
                                <button type='submit' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table></div>";
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
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-bordered'>";
        $output .= "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Country of Origin</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['director_id'] . "</td>";
            $output .= "<td>" . $row['first_name'] . "</td>";
            $output .= "<td>" . $row['last_name'] . "</td>";
            $output .= "<td>" . $row['date_of_birth'] . "</td>";
            $output .= "<td>" . $row['country_of_origin'] . "</td>";
            $output .= "<td>
                            <form action='delete_director.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['director_id'] . "'>
                                <button type='submit' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table></div>";
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
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-bordered'>";
        $output .= "<thead><tr><th>ID</th><th>Award Name</th><th>Year Won</th><th>Category</th><th>Action</th></tr></thead>";
        $output .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . $row['award_id'] . "</td>";
            $output .= "<td>" . $row['award_name'] . "</td>";
            $output .= "<td>" . $row['year_won'] . "</td>";
            $output .= "<td>" . $row['category'] . "</td>";
            // Add the delete button with the award ID as a POST parameter
            $output .= "<td>
                            <form action='delete_award.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['award_id'] . "'>
                                <button type='submit' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>";
            $output .= "</tr>";
        }
        $output .= "</tbody></table></div>";
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
    <title>Delete Movie Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Movie Data</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="delete_movie_directory.php">Delete Section</a>
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
    <h2>Delete Movie Data</h2>

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
