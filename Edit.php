<?php
 include 'Database.php';

 if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM notes WHERE id_Notes = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "No note found with the given ID.";
    exit;   
}

$note = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newTitle = $_POST['title'];
    $newBody = $_POST['body'];

    $updateSql = "UPDATE notes SET Title = '$newTitle', Body = '$newBody' WHERE id_Notes = $id";

    if (mysqli_query($conn, $updateSql)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit note</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Note</h1>

    <form method="post" action="">
        <label>Title</label><br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($note['Title']); ?>" required><br><br>

        <textarea name="body" rows="5" cols="40" required><?php echo htmlspecialchars($note['Body']); ?></textarea><br><br>

        <button type="submit">Save</button>
        <button onclick="window.location.href='index.php'"> Back home</button>
    </form>
    <br>    
</body>
</html>