<?php


class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


  public static function find_all_users() {

    return self::find_query('SELECT * FROM users');

  }


public static function find_user_id($id){

  $result = self::find_query("SELECT * FROM users WHERE id= $id LIMIT 1");
  $found = mysqli_fetch_array($result);
  return $found;

  }


  public static function find_query($sql) {
    global $db;
    $result = $db->query($sql);
    return $result;

  }


public static function instantiation($record) {

  $obj = new self;

  // $obj->id          = $found['id'];
  // $obj->username    = $found['username'];
  // $obj->password    = $found['password'];
  // $obj->first_name  = $found['first_name'];
  // $obj->last_name   = $found['last_name'];

  foreach ($record as $attr => $value) {
    if($obj->has_attr($attr)){
      $obj->attr = $value;
    }
  }

  return $obj;

  }

  private function has_attr($attr) {

    $obj_properties = get_object_vars($this);
    return array_key_exists($attr, $obj_properties);

  }



}







 ?>
