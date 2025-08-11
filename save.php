<?php
include 'Database.php';

$TITLE = $_POST['title'];
$CONTENT = $_POST['content'];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO notes (Title, Body, CreationDate) VALUES ('$TITLE', '$CONTENT', '$date')";   

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>