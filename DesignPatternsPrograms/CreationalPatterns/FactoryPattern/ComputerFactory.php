<?php
require_once "Computer.php";
require_once "LocalPC.php";
require_once "ServerPC.php";

class ComputerFactory{
    public static function getComputer($type,$ram,$hdd,$cpu){
        if(strcasecmp($type,"PersonalPC")==0){
            return new LocalPC($ram,$hdd,$cpu);
        }
        else if(strcasecmp($type,"ServerPC")==0){
            return new ServerPC($ram,$hdd,$cpu);
        }
        else{
            return null;
        }
    }
}
?>