<?php
// interface untuk command
interface ICommand {
  function onCommand($name, $args);
}
 
// class kunci untuk command chain
class CommandChain {
  private $_commands = array();
 
  public function addCommand($cmd) {
    $this->_commands[] = $cmd;
  }
 
  public function runCommand($name, $args) {
    foreach($this->_commands as $cmd) {
      if($cmd->onCommand($name, $args)) {
        return;
      }
    }
    // ketika tidak ada handler yang sesuai
    echo 'No registered found, command is not executed<br />';
  }
}
 
// command untuk user
class UserCommand implements ICommand {
  public function onCommand($name, $args) {
    if($name != 'addUser') {
      return false;
    }
    // perintah dijalankan di baris ini
    echo 'UserCommand handling \'addUser\'<br />';
    return true;
  }
}
 
// command untuk item
class ItemCommand implements ICommand {
  public function onCommand($name, $args) {
    if($name != 'addItem') {
      return false;
    }
    // perintah dijalankan di baris ini
    echo 'ItemCommand handling \'addItem\'<br />';
    return true;
  }
}
 
$cc = new CommandChain();
$cc->addCommand(new UserCommand());
$cc->addCommand(new ItemCommand());
$cc->runCommand('addUser', null);
$cc->runCommand('addItem', null);
$cc->runCommand('mail', null);