<?php
require_once "Volts.php";
class Socket{
    public function getVolt()
    {
        return new Volts(120);
    }
}
?>