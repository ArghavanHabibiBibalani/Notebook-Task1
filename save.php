<?php
include 'Database.php';
include 'Note.php';

$noteObj = new Note($conn);

$TITLE = $_POST['title'];
$CONTENT = $_POST['content'];

if ($noteObj->addNote($TITLE, $CONTENT)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>