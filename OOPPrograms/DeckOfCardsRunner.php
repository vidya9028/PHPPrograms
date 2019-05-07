<?php
require_once "Util.php";
require_once "DeckOfCards.php";

    $cards = new DeckOfCards();

    $card = $cards->initializeCards();

    echo "Enter Number of times to shuffle: ";
    $number = Util::user_integerInput();

    while($number>0){
        $card = $cards->shuffleCards();
        $number--;
    }

    echo "\nDistributing cards to Four People:\n\n";
    $card = $cards->distributeCards($card,4,9);

    $cards->displayCards($card);

?>