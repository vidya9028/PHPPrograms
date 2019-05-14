<?php
require_once "Volts.php";
require_once "Socket.php";
require_once "SocketAdapterInterface.php";

class SocketClassAdapter extends Socket implements SocketAdapterInterface{
    
    public function get120Volt(){
        return (Socket::getVolt());
    }

    public function get12Volt(){
        $volt2 = Socket::getVolt();
        return SocketClassAdapter::convertVolt($volt2,20);
    }

    public function get3Volt(){
        $volt3 = Socket::getVolt();
        return SocketClassAdapter::convertVolt($volt3,80);
    }

    public function convertVolt($volt,$val){
        return($volt->getVolts()/$val);

    }
}

?>