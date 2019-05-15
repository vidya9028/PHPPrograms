<?php
//interface implemented by patternSubject
//to communicate with observer

interface Subject{
    public function attachObserver(Observer $observer);
    public function detachObserver(Observer $observer);
    public function notifyObservers();
}
?>