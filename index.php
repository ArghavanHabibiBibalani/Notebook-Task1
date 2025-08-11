<?php
include 'Database.php';

$sql = "SELECT * FROM notes";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My notes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>My Notes</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Creation Date</th>
            <th>Edit note</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Body']) . "</td>";
                echo "<td>" . htmlspecialchars($row['CreationDate']) . "</td>";
                echo "<td><a class='btn' href='Edit.php?id=" . $row['id_Notes'] . "'>Edit</a></td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No notes found</td></tr>";
        }
        ?>
    </table>
    <br><br>
    <button onclick="window.location.href='Add.php'">Add New</button>
</body>
</html>