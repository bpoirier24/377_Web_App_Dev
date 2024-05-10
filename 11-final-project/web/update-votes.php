<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the necessary data is provided
    if (isset($_POST['image_filename']) && isset($_POST['action'])) {
        // Extract the image filename and action
        $image_filename = $_POST['image_filename'];
        $action = $_POST['action'];

        // Connect to the database
        $servername = 'localhost';
        $username = 'root';
        $password = 'Indians2016!';
        $dbname = 'likesordislike';
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Update the database based on the action
        if ($action === 'thumbsUp') {
            $sql = "UPDATE image_votes SET num_likes = num_likes + 1 WHERE image_filename = '$image_filename'";
        } elseif ($action === 'thumbsDown') {
            $sql = "UPDATE image_votes SET num_dislikes = num_dislikes + 1 WHERE image_filename = '$image_filename'";
        }

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // Retrieve the updated counts and send them back as JSON
            $sql = "SELECT num_likes, num_dislikes FROM image_votes WHERE image_filename = '$image_filename'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $response = array(
                    'num_likes' => $row['num_likes'],
                    'num_dislikes' => $row['num_dislikes']
                );
                echo json_encode($response);
            }
        } else {
            echo 'Error updating record: ' . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo 'Missing parameters';
    }
} else {
    echo 'Invalid request method';
}
?>
