<?php
class PrototypePatternExample{
    private $fizzy;
    private $healthy;
    private $tasty;

    /**
     * init cocacola drink
     */
    public function __construct(){
        $this->fizzy = true;
        $this->healthy = false;
        $this->tasty = true;
    }

    /**
     * This magic method is required, even if empty as
     * part of prototype design pattern
     */
    public function __clone(){

    }
}

$cola = new PrototypePatternExample();
echo var_dump($cola);

$cocaCola = clone $cola;
echo var_dump($cocaCola);

?>