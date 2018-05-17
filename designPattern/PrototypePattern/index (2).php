<?php
// gunakan class Robot di atas juga
// prototype untuk aibo
class RobotAiboPrototype extends Robot {
  public function __construct() {
    $this->setType('aibo');
  }
 
  public function __clone() {
    // lakukan apapun saat proses cloning
  }
}
 
// test program
// buat prototype
$aibo_prototype = new RobotAiboPrototype();
// prototype tanpa class
$asimo_prototype = new Robot();
$asimo_prototype->setType('asimo');
 
// clone aibo
$aibo1 = clone $aibo_prototype;
$aibo2 = clone $aibo_prototype;
$aibo1->setName('Aibo 1');
$aibo2->setName('Aibo 2');
echo 'Tipe '.$aibo1->getType().' Nama '.$aibo1->getName().'<br />';
echo 'Tipe '.$aibo2->getType().' Nama '.$aibo2->getName().'<br />';
 
// clone asimo
$asimo1 = clone $asimo_prototype;
$asimo2 = clone $asimo_prototype;
$asimo1->setName('Asimo 1');
$asimo2->setName('Asimo 2');
echo 'Tipe '.$asimo1->getType().' Nama '.$asimo1->getName().'<br />';
echo 'Tipe '.$asimo2->getType().' Nama '.$asimo2->getName().'<br />';