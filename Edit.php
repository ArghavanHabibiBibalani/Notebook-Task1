<?php
 include 'Database.php';
 include 'Note.php';

 if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$noteObj = new Note($conn);

$id = $_GET['id'];

$note = $noteObj->getNoteById($id);

if (!$note) {
    echo "No note found with the given ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newTitle = $_POST['title'];
    $newBody = $_POST['body'];

    if ($noteObj->updateNote($id, $newTitle, $newBody)) {
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