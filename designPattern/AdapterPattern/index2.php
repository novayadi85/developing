
<?php
class FoodToItemAdapter extends Item {
  public function __construct($food) {
    $this->setItemType('food');
    $this->setItemName($food->getFoodName());
  }
}
 
$food = new Food();
$food->setFoodName('Chicken Teriyaki');
 
$item = new FoodToItemAdapter($food);
 
echo $item->getItemType() . '<br />';
echo $item->getItemName();