<?php
require_once "Subject.php";
//class to implement interface Subject
//to communicate with observer
class PatternSubject implements Subject{
    private $favorites;
    private $observers = array();

    public function __construct()
    {
        $this->favorites = null;
    }
    public function attachObserver(Observer $observer){
        $this->observers[] = $observer;
    }

    public function detachObserver(Observer $observer){
        foreach($this->observers as $okey=>$ovalue){
            if ($ovalue == $observer) { 
                unset($this->observers[$okey]);
            }
        }
    }

    public function notifyObservers() {
        foreach($this->observers as $obs) {
          $obs->update($this);
        }
    }

    public function updateFavorites($newFavorites) {
        $this->favorites = $newFavorites;
        $this->notifyObservers();
    }

    public function getFavorites() {
        return $this->favorites;
    }
  
}
?>