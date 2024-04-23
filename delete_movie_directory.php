<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Actor</title>
    <!-- Your CSS styles here -->
    <style>
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

    <div class="navbar">
        <a href="delete_movie_directory.php">Delete Section</a>
        <a href="movie_directory.php">Movie Section</a>
        <a href="change_movie_directory.php">Change Section</a>
    </div>

<div class="container">
    <h2>Delete Actor</h2>


    <!-- Delete Actor Form -->
    <section class="delete_actor_section">
        <form action="delete_actor.php" method="post">
            <label for="first_name">Actor's First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            <br>
            <label for="last_name">Actor's Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <br>
            <input type="submit" value="Delete Actor">
        </form>
    </section>

    <section class="delete_awards_section">
        <form action="delete_award.php" method="post">
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
            <input type="number" id="year_won" name="year_won" required>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
            <input type="submit" value="Delete Award">
        </form>
    </section>

    <section class="delete_director_section">
        <form action="delete_director.php" method="post">
            <label for="first_name">Director's First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            <br>
            <label for="last_name">Director's Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <br>
            <input type="submit" value="Delete Director">
        </form>
    </section>

    <section class="delete_movie_section">
        <form action="delete_movie.php" method="post">
            <label for="title">Movie Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="eleaseDate">Release Date:</label>
            <input type="date" id="releaseDate" name="releaseDate" required>
            <input type="submit" value="Delete Movie">
        </form>
    </section>
    

</div>

</body>
</html>