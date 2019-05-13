<?php
require_once "Computer.php";
require_once "ComputerFactory.php";

    $pc = ComputerFactory::getComputer("PersonalPC","4GB","1TB","2.4GHz");
    $server = ComputerFactory::getComputer("ServerPC","8GB","2TB","3.5GHz");
    
    echo "Configuration of Local PC:\n";
    echo "RAM: ".$pc->getRAM()."\nHard Disk: ".$pc->getHDD()."\nCPU: ".$pc->getCPU();

    echo "\n\nConfiguration of Server PC:\n";
    echo "RAM: ".$server->getRAM()."\nHard Disk: ".$server->getHDD()."\nCPU: ".$server->getCPU()."\n";
    
?>