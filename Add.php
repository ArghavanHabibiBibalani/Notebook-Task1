<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add note</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add Note</h1>

    <form action="save.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" placeholder="title" id="title" name="title" required><br><br>

        <textarea id="content" placeholder="type your note HERE." name="content" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Submit</button>
        <button onclick="window.location.href='index.php'">Home</button>

</body>
</html>