<?php
/**
 * Problem Statement:
 * Write a Program DeckOfCards.java , to initialize deck of cards having suit ("Clubs",
 * "Diamonds", "Hearts", "Spades") & Rank ("2", "3", "4", "5", "6", "7", "8", "9", "10",
 * "Jack", "Queen", "King", "Ace"). Shuffle the cards using Random method and then
 * distribute 9 Cards to 4 Players and Print the Cards the received by the 4 Players
 * using 2D Array.
 */


class DeckOfCards{
    public $suits = null;
    public $rank = null;
    public $deckofCards;

    //Constructor
    public function __construct()
    {
        $this->suits = array("Clubs","Diamonds","Hearts","Spades");
        $this->rank = array("2","3","4","5","6","7","8","9","10","Ace","King","Queen","Jack");
        $this->deckofCards = [];
    }

    /**
     * Method to intitialize cards and return cards
     */
    public function cardsInitialize()
    {
        $deck = [];
        $k=0;

        for($i=0;$i<count($this->suits);$i++){
            for($j=0;$j<count($this->rank);$j++){
                $deck[$k++] = $this->rank[$j].$this->suits[$i];
            }
        }
        return $deck;
    }

    /**
     * Method to shuffle the cards
     */
    public function shuffle($deck)
    {
        $totalCount = count($this->suits)*count($this->rank);
        for($i=0;$i<$totalCount;$i++){
            $randomNumber = mt_rand(0,$totalCount-1);

            $temp = $deck[$i];
            $deck[$i] = $deck[$randomNumber];
            $deck[$randomNumber] = $temp;
        }
        return $deck;
    }

    //intializing data in 2D array
    public function initializeCards()
    {

        for($i=0;$i<count($this->suits);$i++){
            for($j=0;$j<count($this->rank);$j++){
                    $this->deckofCards[$i][$j] = $this->rank[$j]." ".$this->suits[$i];
            }
        }
        return $this->deckofCards;
    }

    //function to shuffle the cards randomly
    public function shuffleCards()
    {
        for($i=0;$i<count($this->suits);$i++){
            for($j=0;$j<count($this->rank);$j++){
                $randomNumber1 = mt_rand(0,3);
                $randomNumber2 = mt_rand(0,12);

                $temp = $this->deckofCards[$randomNumber1][$randomNumber2];
                $this->deckofCards[$randomNumber1][$randomNumber2] = $this->deckofCards[$i][$j];
                $this->deckofCards[$i][$j] = $temp;
            }
        }
        return $this->deckofCards;
    }

    public function distributeCards($deckofCards,$noOfPlayers,$noOfCards)
    {
        $array = [];
        for($i=0;$i<$noOfPlayers;$i++){
            for($j=0;$j<$noOfCards;$j++){
                $array[$i][$j] = $deckofCards[$i][$j];
            }
        }
        return $array;
    }

    //displaying distributed cards in array
    public function displayCards($deckofCards)
    {
        for($i=0;$i<count($this->deckofCards);$i++){
            //displaying cards of each player
            echo "Player ".($i+1).": ";
            for($j=0;$j<count($this->deckofCards[$i]);$j++){
                echo "\"".$this->deckofCards[$i][$j]."\""." ";
            }
            echo "\n\n";
        }
        echo "\n";
    }
}

?>