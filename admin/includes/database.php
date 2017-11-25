<?php
require_once('new_config.php');

class Database {

  public $conn;

  function __construct(){

    $this->open_db_connection();

  }


      public function open_db_connection(){

      //$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if($this->conn->connect_error) {

        die("NO!!!!" . $this->conn->connect_error);
      }
    }

    public function query($sql) {

      $result = $this->conn->query($sql);
      $this->confirm($result);
      return $result;
    }

    private function confirm($result) {

      if(!$result) {
        die("Query Failed". $this->conn->error);
      }
    }

    public function escape($string){

      $escaped = $this->conn->real_escape_string($string);
      return $escaped;
    }

    public function the_insert_id() {

      return $this->conn->insert_id;
    }


}

$db = new Database();

?>
