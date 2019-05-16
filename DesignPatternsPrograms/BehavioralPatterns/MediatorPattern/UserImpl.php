<?php
require_once "User.php";
require_once "ChatMediatorImpl.php";
class UserImpl extends User{
    public function __construct(ChatMediatorImpl $mediator,$name){
        parent::__construct($mediator,$name);

    }
    
    public function send($message){
        $obj = new ChatMediatorImpl();
        echo $obj->this->users[$this->name]." Sending Message ".$message;
        $mediator->sendMessage($message,$this);
    }

    public function receive($message){
        $obj = new ChatMediatorImpl();
        echo $obj->$this->users[$this->name]." Received Messsage ".$message;
    }

}
?>