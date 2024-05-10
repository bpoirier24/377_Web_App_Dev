<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Image Generator</title>
    <link rel="stylesheet" href="style.css">
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Random Image Generator</h1>
        <?php
            $imagesDir = 'images/';
            $images = array_diff(scandir($imagesDir), array('..', '.'));
            $randomImage = $images[array_rand($images)]; 

            // Initialize thumbs up and thumbs down counts
            $thumbsUpCount = 0;
            $thumbsDownCount = 0;

            // Function to get database connection
            function get_database_connection()
            {
                $servername = 'localhost';
                $username = 'root';
                $password = 'Indians2016!';
                $dbname = 'likesordislike';

                $connection = new mysqli($servername, $username, $password, $dbname);
                if ($connection->connect_error)
                {
                    die('Connection failed: ' . $connection->connect_error);
                }

                return $connection;
            }

            // Retrieve thumbs up and thumbs down counts from the database
            $conn = get_database_connection();
            $sql = "SELECT num_likes, num_dislikes FROM image_votes WHERE image_filename = '$randomImage'";
            $result = $conn->query($sql);
            if($row = $result->fetch_assoc()){
                $thumbsUpCount = $row['num_likes'];
                $thumbsDownCount = $row['num_dislikes'];
            }
        ?>
        <img id="randomImage" src="images/<?php echo $randomImage; ?>" alt="Random Image">
        <form id="voteForm" action="index.php" method="post">
            <button type="submit" name="generateButton">Generate Random Image</button>
            <input type="hidden" id="currentImageInput" name="currentImage" value="<?php echo $randomImage; ?>">
            <!-- Thumbs up button -->
            <button type="button" id="thumbsUpButton">Thumbs Up</button>
            <!-- Thumbs down button -->
            <button type="button" id="thumbsDownButton">Thumbs Down</button>
        </form>
        <!-- Display vote counts -->
        <p>Thumbs Up: <span id="thumbsUpCount"><?php echo $thumbsUpCount; ?></span></p>
        <p>Thumbs Down: <span id="thumbsDownCount"><?php echo $thumbsDownCount; ?></span></p>
    </div>

    <script>
        // Thumbs up button click event
        $('#thumbsUpButton').on('click', function() {
            var currentImage = $('#currentImageInput').val();
            // Send AJAX request to update thumbs up count
            $.ajax({
                type: 'POST',
                url: 'update-votes.php',
                data: { image_filename: currentImage, action: 'thumbsUp' },
                success: function(response) {
                    $('#thumbsUpCount').text(response.num_likes);
                }
            });
        });

        // Thumbs down button click event
        $('#thumbsDownButton').on('click', function() {
            var currentImage = $('#currentImageInput').val();
            // Send AJAX request to update thumbs down count
            $.ajax({
                type: 'POST',
                url: 'update-votes.php',
                data: { image_filename: currentImage, action: 'thumbsDown' },
                success: function(response) {
                    $('#thumbsDownCount').text(response.num_dislikes);
                }
            });
        });
    </script>
</body>
</html>
