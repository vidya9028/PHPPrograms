<?php
require_once "Observer.php";
require_once "PatternSubject.php";
//class to implement inteface Observer
class PatternObserver implements Observer{
    public function __construct()
    {
        
    }
    public Function update(Subject $subject){
        //$subject = new PatternSubject();
        echo "\nIn Pattern Observer New Pattern Gossip Alert!\n";
        echo "New Favourites Patterns: ".$subject->getFavorites()."\n";
        echo "In Pattern Observer New Pattern Gossip Alert Ends!\n";
    }

}
?>