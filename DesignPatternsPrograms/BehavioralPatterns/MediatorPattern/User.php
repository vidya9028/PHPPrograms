<?php
require_once "ChatMediatorImpl.php";
abstract class User{
    protected $name;
    protected $mediator;

    public function __construct(ChatMediatorImpl $mediator,$name){
        $this->name = $name;
        $this->mediator = $mediator;
    }
    
    public abstract function send($message);
    public abstract function receive($message);

}
?>