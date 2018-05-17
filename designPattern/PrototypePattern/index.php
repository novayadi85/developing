<?php
// class utama
class Robot {
  private $_name;
  private $_type;
 
  public function setType($type) {
    $this->_type = $type;
  }
 
  public function getType() {
    return $this->_type;
  }
 
  public function setName($name) {
    $this->_name = $name;
  }
 
  public function getName() {
    return $this->_name;
  }
}
 
// perulangan yang tidak perlu
$aibo1 = new Robot();
$aibo2 = new Robot();
$aibo3 = new Robot();
$aibo1->setType('aibo');
$aibo2->setType('aibo');
$aibo3->setType('aibo');