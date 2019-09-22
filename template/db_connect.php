<?php
    $conn = mysqli_connect('localhost', 'root', '', 'food');
    if (!$conn) {
        echo "Connection Error" . mysqli_connect_error();
    }
?>