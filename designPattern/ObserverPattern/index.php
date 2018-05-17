<?php
// interface untuk observer / pengawas
interface IObserver {
  function onChanged($sender, $args);
}
 
// interface untuk observable / yang memberitahu pengawas
interface IObservable {
  function addObserver($observer);
}
 
// class daftar item
class ItemList implements IObservable {
  private $_observers = array();
  private $_listName = '';
 
  public function addItem($name) {
    foreach($this->_observers as $observer) {
      $observer->onChanged($this, $name);
    }
  }
 
  public function addObserver($observer) {
    $this->_observers[] = $observer;
  }
 
  public function __construct($listName) {
    $this->_listName = $listName;
  }
 
  public function __toString() {
    return $this->_listName . ' List';
  }
}
 
// class logger untuk item
class ItemListLogger implements IObserver {
  public function onChanged($sender, $args) {
    echo $args . ' has been added to ' . $sender . '<br />';
  }
}
 
// testing
$il = new ItemList('Stationary');
$il->addObserver(new ItemListLogger());
$il->addItem('Pencil');
$il->addItem('Ruler');