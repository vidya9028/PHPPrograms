<?php
interface Computer{

    public function setRAM($ram);
    public function getRAM();

    public function setHDD($hdd);
    public function getHDD();

    public function setCPU($cpu);
    public function getCPU();
} 
?>