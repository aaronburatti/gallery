<?php


class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


  public static function find_all_users() {

    return self::find_query("SELECT * FROM users");

  }


public static function find_user_id($id){
  global $db;
  $result_array = self::find_query("SELECT * FROM users WHERE id= $id LIMIT 1");
  return !empty($result_array) ? array_shift($result_array) : false;

  // if(!empty($result)){
  //   $first_item = array_shift($result);
  //   return $first_item;
  // } else {
  //   return false;
  // }

  }


  public static function find_query($sql) {
    global $db;
    $result = $db->query($sql);
    $obj_array = array();

    while($row = mysqli_fetch_array($result)){

      $obj_array[] = self::instantiation($row);

    }

    return $obj_array;

  }


public static function instantiation($record) {

  $obj = new self;

  foreach ($record as $attr => $value) {
    if($obj->has_attr($attr)){
      $obj->$attr = $value;
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
