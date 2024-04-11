<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Image Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Random Image Generator</h1>
        <?php
            $imagesDir = 'images/';
            $images = array_diff(scandir($imagesDir), array('..', '.'));
            $randomImage = $images[array_rand($images)]; 
        ?>
        <img id="randomImage" src="images/<?php echo $randomImage; ?>" alt="Random Image">
        <form action="index.php" method="post">
            <button type="submit" name="generateButton">Generate Random Image</button>
            <input type="hidden" name="currentImage" value="<?php echo $randomImage; ?>">
            <button type="submit" name="thumbsUpButton">Thumbs Up</button>
            <button type="submit" name="thumbsDownButton">Thumbs Down</button>
        </form>
        <?php
            // Load votes from file
            $votes = [];
            if (file_exists("votes.txt")) {
                $votes = unserialize(file_get_contents("votes.txt"));
            }

            // Get vote counts for the current image
            $currentImage = $randomImage;
            $thumbsUpCount = isset($votes[$currentImage]['thumbsUp']) ? $votes[$currentImage]['thumbsUp'] : 0;
            $thumbsDownCount = isset($votes[$currentImage]['thumbsDown']) ? $votes[$currentImage]['thumbsDown'] : 0;

            // Display vote counts
            echo "<p>Thumbs Up: $thumbsUpCount</p>";
            echo "<p>Thumbs Down: $thumbsDownCount</p>";

            // Update votes
            if(isset($_POST['thumbsUpButton']) || isset($_POST['thumbsDownButton'])) {
                $currentImage = $_POST['currentImage'];
                if(isset($_POST['thumbsUpButton'])) {
                    if(!isset($votes[$currentImage]['thumbsUp'])) {
                        $votes[$currentImage]['thumbsUp'] = 0;
                    }
                    $votes[$currentImage]['thumbsUp']++;
                } elseif(isset($_POST['thumbsDownButton'])) {
                    if(!isset($votes[$currentImage]['thumbsDown'])) {
                        $votes[$currentImage]['thumbsDown'] = 0;
                    }
                    $votes[$currentImage]['thumbsDown']++;
                }
                file_put_contents("votes.txt", serialize($votes));
            }
        ?>
    </div>
</body>
</html>
