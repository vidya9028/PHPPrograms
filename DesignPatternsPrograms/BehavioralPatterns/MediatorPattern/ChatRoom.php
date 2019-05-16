<?php
interface ChatRoom{
    public function sendMessage($message,User $user);
    public function addUser(User $user);
}
?>