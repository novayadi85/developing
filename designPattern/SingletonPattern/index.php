<?php
class User {
  private $username;
 
  public function getUsername() {
    return $this->username;
  }
 
  public function __construct($id) {
    // ambil data user dari database
    $this->username = 'Haqqi';
  }
}
 
class CurrentUser {
  private static $user;
 
  // untuk mencegah instantiasi object
  private function __construct() {}
 
  public static function getUser() {
    if(!self::$user) {
      // ambil data dari session
      // id disesuaikan dari session
      self::$user = new User(1);
    }
    return self::$user;
  }
 
  // untuk mencegah clone
  private function __clone() {}
}
 
echo CurrentUser::getUser()->getUsername();