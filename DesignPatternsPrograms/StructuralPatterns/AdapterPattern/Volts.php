<?php
class Volts{
    private $volts;

    public function __construct($volts)
    {
        $this->volts = $volts;
    }

    public function setVolts($volts)
    {
        $this->volts = $volts;
    }

    public function getVolts()
    {
        return $this->volts;
    }
}
?>