<?php


class DatabaseService {
  private $db;
  public function __construct() {
   
      $this->db = new PDO("sqlite:/home/runner/projectfinalphp/database.sqlite");
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function query($sql) {
    return $this->db->query($sql);
  }
  public function exec($sql) {
    return $this->db->exec($sql);
  }
  
}