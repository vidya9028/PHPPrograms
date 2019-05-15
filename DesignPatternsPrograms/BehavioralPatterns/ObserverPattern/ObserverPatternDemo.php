<?php
require_once "PatternSubject.php";
require_once "PatternObserver.php";

$patternGossiper = new PatternSubject();
$patternGossipFan = new PatternObserver();

$patternGossiper->attachObserver($patternGossipFan);
$patternGossiper->updateFavorites('abstract factory, decorator, visitor');

$patternGossiper->updateFavorites('abstract factory, observer, decorator');
$patternGossiper->detachObserver($patternGossipFan);
$patternGossiper->updateFavorites('abstract factory, observer, paisley');


?>