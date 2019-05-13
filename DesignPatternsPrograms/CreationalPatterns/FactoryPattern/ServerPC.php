<?php
require_once "Computer.php";
class ServerPC implements Computer{
    private $ram;
    private $hdd;
    private $cpu;

    public function __construct($ram,$hdd,$cpu)
    {
        $this->ram = $ram;
        $this->hdd = $hdd;
        $this->cpu = $cpu;
    }

    public function setRAM($ram){
        $this->ram = $ram;
    }

    public function getRAM(){
        return $this->ram;
    }

    public function setHDD($hdd){
        $this->hdd = $hdd;
    }

    public function getHDD(){
        return $this->hdd;
    }

    public function setCPU($cpu){
        $this->cpu = $cpu;
    }

    public function getCPU(){
        return $this->cpu;
    }
}
?>