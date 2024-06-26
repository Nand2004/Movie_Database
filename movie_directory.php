<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="date"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }
        /* Add space between sections */
        section {
            margin-bottom: 40px; /* Adjust the value as needed */
        }
    </style>
</head>
<body>

    <div class="navbar navbar-expand-lg navbar-light bg-light">
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
    </div>

<div class="container">
    <h2 class="text-center">Edit Movie Data</h2>

    <!-- Actor Form -->
    <section class="actor_section">
        <form action="edit_actor.php" method="post">
            <label for="first_name">Actor's First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $actor_first_name; ?>" required>
            <label for="last_name">Actor's Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $actor_last_name; ?>" required>
            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date" value="<?php echo $actor_birth_date; ?>" required>
            <label for="place_of_origin">Place of Origin:</label>
            <input type="text" id="place_of_origin" name="place_of_origin" value="<?php echo $actor_place_of_origin; ?>" required>
            <input type="submit" value="Save Actor">
        </form>
    </section>


        <!-- Awards Form -->
        <section class="awards_section">
        <form action="edit_award.php" method="post">
            <label for="award_name">Award Name:</label>
            <select id="award_name" name="award_name" required>
                <option value="Best Picture">Best Picture</option>
                <option value="Best Director">Best Director</option>
                <option value="Best Actor">Best Actor</option>
                <option value="Best Actress">Best Actress</option>
                <option value="Best Supporting Actor">Best Supporting Actor</option>
                <option value="Best Supporting Actress">Best Supporting Actress</option>
                <option value="Best Original Screenplay">Best Original Screenplay</option>
                <option value="Best Adapted Screenplay">Best Adapted Screenplay</option>
                <option value="Best Cinematography">Best Cinematography</option>
                <option value="Best Film Editing">Best Film Editing</option>
                <option value="Best Costume Design">Best Costume Design</option>
                <option value="Best Production Design">Best Production Design</option>
                <option value="Best Makeup and Hairstyling">Best Makeup and Hairstyling</option>
                <option value="Best Visual Effects">Best Visual Effects</option>
                <option value="Best Sound Mixing">Best Sound Mixing</option>
                <option value="Best Sound Editing">Best Sound Editing</option>
                <option value="Best Original Score">Best Original Score</option>
                <option value="Best Original Song">Best Original Song</option>
                <option value="Best Animated Feature">Best Animated Feature</option>
                <option value="Best Documentary Feature">Best Documentary Feature</option>
                <option value="Best Foreign Language Film">Best Foreign Language Film</option>
                <option value="Other">Other</option>
            </select>
            
            <label for="year_won">Year Won:</label>
            <input type="number" id="year_won" name="year_won" class="form-control" placeholder="Enter year" required>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
            <input type="submit" value="Save Award">
        </form>
    </section>

    <!-- Director Form -->
    <section class="director_section">
        <form action="edit_director.php" method="post">
            <label for="first_name">Director First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">Director Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <label for="date_of_birth">Director Birth Date:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
            <label for="country_of_origin">Director Country of Origin:</label>
            <input type="text" id="country_of_origin" name="country_of_origin" required>
            <input type="submit" value="Save Director">
        </form>
    </section>

    <!-- Movie Form -->
    <section class="movie_form_section">
        <form action="edit_movie.php" method="post">
            <label for="title">Movie Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="releaseDate">Release Date:</label>
            <input type="date" id="releaseDate" name="releaseDate" required>
            <label for="duration">Duration (minutes):</label>
            <input type="number" id="duration" name="duration" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea>
            <label for="box_office_rating">Box Office Rating:</label>
            <input type="number" id="box_office_rating" name="box_office_rating" step="0.5" required>
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>
            <label for="studio">Studio:</label>
            <input type="text" id="studio" name="studio" required>
            <input type="submit" value="Save Movie">

        </form>
    </section>


</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
