<?php
class Note{

    const TABLE_NAME = "notes";
    const FIELD_ID   = "id_Notes";
    const FIELD_TITLE = "Title";
    const FIELD_BODY  = "Body";
    const FIELD_DATE  = "CreationDate";

    public $id;
    public $title;
    public $body;
    public $date;

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addNote($title, $body) {
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_TITLE . ", " . self::FIELD_BODY . ", " . self::FIELD_DATE . ")
                VALUES ('$title', '$body', '$date')";
        return mysqli_query($this->conn, $sql);
    }

    public function updateNote($id, $title, $body) {
        $sql = "UPDATE " . self::TABLE_NAME . " 
                SET " . self::FIELD_TITLE . " = '$title', " . self::FIELD_BODY . " = '$body' 
                WHERE " . self::FIELD_ID . " = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteNote($id) {
        $sql = "DELETE FROM " . self::TABLE_NAME . " WHERE " . self::FIELD_ID . " = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function getNoteById($id) {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::FIELD_ID . " = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getAllNotes() {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " ORDER BY " . self::FIELD_DATE . " DESC";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }


    
}

?>