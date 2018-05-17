<?php
 
// interface
interface IUser {
 
  function getName();
  function getAddress();
}
 
// class utama
class User implements IUser {
  public function __construct($id) {
	  
  }
  
  public static function load($id) {
    return new User($id);
  }
  
  public function getName() {
    return 'Komang Novayadi';
  }
  
  public function getAddress() {
    return 'Denpasar Timur';
  }
  
}
 
// class factory
class UserFactory {
  public static function create($id = null) {
    return new User($id);
  }
}
 
// contoh penggunaan
$u = UserFactory::create(1);
echo $u->getAddress();

//Tanpa menggunakan class Factory tapi factory dalam class User
$u = User::load(1);
echo $u->getName();