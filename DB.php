<?php
class DB {
    protected $conn;
    protected $table;
    public $last_message = '';

    public function __construct($table_name) {

        $this->table = $table_name;
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "test";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function setData($text, $status) {
      if ($status === '') {
        $status = 0;
      }
      $d = new DateTime();
      $d->setTimezone(new DateTimeZone('Europe/Riga'));
      $createdAt =  $d->format("Y-m-d H:m:s");
      $modifiedAt = $d->format("Y-m-d H:m:s");

      $this->set([
        'text' => $text,
        'status' => $status,
        'createdAt' => $createdAt,
        'modifiedAt' => $modifiedAt
      ]);
    }

    public function get() {
      include 'template.php';
        $sql = "SELECT * FROM `$this->table`";
        $result = $this->conn->query($sql);
        
        if ($result) {
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              template($row['text'], $row['status']);
            }
          } else {
            $this->last_message = "0 results";
          }
        }
        else {
          $this->last_message = "Result is wrong";
        }
    }

    public function set($entries) {
      $columns = '';
      $values = '';
      $i = 0;
      foreach ($entries as $key => $value) {
        $columns .= "`$key`";
        $values .= "'$value'";
        $i++;
        if (count($entries) > $i) {
          $columns .= ", ";
          $values .= ", ";
        }
      }


      $sql = "INSERT INTO `$this->table` ($columns) VALUES ($values); SELECT LAST_INSERT_ID();";
      $result = $this->conn->query($sql);
    
      if ($result === true) {
        $this->last_message = "ieraksts pievienots";
      }
      else {
        $this->last_message = $sql. "neizdevās inserts";
      }
    }

    public function update($id, $values) {
      $set_values = '';
      $i = 0;
      foreach ($values as $key => $value) {
        $i = $i + 1;
        $set_values = $set_values . $key . "=" . "'$value'";
        if (count($values) > $i) {
          $set_values = $set_values . ", ";
        }
      }

      $sql = "UPDATE `$this->table` SET $set_values WHERE id=$id";
      $result = $this->conn->query($sql);
    
      if ($result === true) {
        $this->last_message = "ieraksts izmainīts";
      }
      else {
        $this->last_message = "neizdevās updates";
      }
    }

    public function delete() {

    }
}