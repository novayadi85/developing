<?php
class Item {
  private $_itemType;
  private $_itemName;
 
  public function setItemType($type) {
    $this->_itemType = $type;
  }
 
  public function getItemType() {
    return $this->_itemType;
  }
 
  public function setItemName($name) {
    $this->_itemName = $name;
  }
 
  public function getItemName() {
    return $this->_itemName;
  }
}
 
// class food tanpa hubungan dengan item
class Food {
  private $_foodName;
 
  public function setFoodName($food) {
    $this->_foodName = $food;
  }
 
  public function getFoodName() {
    return $this->_foodName;
  }
}
 
$item = new Item();
// membuat object food
$food = new Food();
$food->setFoodName('butter');
// memasukkan nilai, mengubah item menjadi food
$item->setItemType('food');
$item->setItemName($food->getFoodName());
 
echo $item->getItemType() . '<br />';
echo $item->getItemName();