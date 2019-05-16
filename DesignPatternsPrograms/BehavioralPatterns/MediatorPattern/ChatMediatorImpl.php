<?php
require_once "ChatRoom.php";
require_once "User.php";
class ChatMediatorImpl implements ChatRoom{
    public $users = [];

    public function __construct(){
        $this->users  = [];
    }

    public function addUser($user){
        $this->users[] = $user;
    }

    public function sendMessage($message,User $user){
        foreach($this->users as  $u){
            if($u!=$user){
                $u->receive($message);
            }
        }
    }
}
?>