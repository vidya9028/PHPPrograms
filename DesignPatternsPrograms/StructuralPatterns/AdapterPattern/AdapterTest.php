<?php
require_once "Volts.php";
require_once "Socket.php";
require_once "SocketAdapterInterface.php";
require_once "SocketClassAdapter.php";

class AdapterTest{
    function main(){
        
        $voltClassImpl = new SocketClassAdapter();

        try{
            echo "Enter the voltage: ";
            fscanf(STDIN,"%d\n",$voltage);
            if($voltage == $voltClassImpl->get3Volt()){
                echo "\nMobile Charging!\n";
            }
            else{
                throw new Exception("\nMobile Not Charging!\n");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
$obj = new AdapterTest();
$obj->main();
?>