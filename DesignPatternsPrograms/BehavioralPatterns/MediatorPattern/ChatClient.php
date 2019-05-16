<?php
require_once "ChatRoom.php";
require_once "ChatMediatorImpl.php";
require_once "User.php";
require_once "UserImpl.php";

$mediator = new ChatMediatorImpl();
$user1 = new UserImpl($mediator,"Abhay");
$user2 = new UserImpl($mediator,"Sagar");

$mediator->addUser($user1);
$mediator->addUser($user2);

$user1->send($user1,"Hi All");
?>