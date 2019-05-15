<?php
//abstract class
abstract class Visitee{
    abstract function accept(Visitor $visitor);
}
?>