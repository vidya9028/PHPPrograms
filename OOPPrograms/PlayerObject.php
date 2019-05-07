<?php
require_once "Util.php";
include "Queue.php";
include "DeckOfCards.php";

class PlayerObject{
    private $playerNumber = 0;
    private $deckofCards =null;
    private $queue = null;

    public function setCards($deckofCards)
    {
        $this->deckofCards = $deckofCards;
    }

    public function getCards()
    {
       return $this->deckofCards;
    }

    public function setPlayer($number)
    {
       $this->playerNumber = $number;
    }

    public function getPlayer()
    {
       return $this->playerNumber;
    }

    public function sortCards($deckofCards)
    {
       $length = count($deckofCards);
       $deckofCards = Util::insertionSort($deckofCards,$length);
       return $deckofCards;
    }

    public function shuffelDeckCards($deck)
    {
       $cards = new DeckOfCards();
       $deck = $cards->shuffle($deck);
       return $deck;
    }
}

//creating player object for four player
$player1 = new Queue();
$player2 = new Queue();
$player3 = new Queue();
$player4 = new Queue();

$cards = new DeckOfCards();
$player = new PlayerObject();

$player->setCards($cards->cardsInitialize());
$cards = $player->getCards();

$cards = $player->shuffelDeckCards($cards);

for($i=0;$i<count($cards);$i++){
   if($i < 13){
      $player1->enqueue($cards[$i]);
   }
   else if($i < 26 && $i >= 13){
      $player2->enqueue($cards[$i]);
   }
   else if($i < 39 && $i >= 26){
      $player3->enqueue($cards[$i]);
   }
   else{
      $player4->enqueue($cards[$i]);
   }
}

$array1 = explode(" ",$player1->getData());
$array2 = explode(" ",$player2->getData());
$array3 = explode(" ",$player3->getData());
$array4 = explode(" ",$player4->getData());

$array1 = $player->sortCards($array1);
$array2 = $player->sortCards($array2);
$array3 = $player->sortCards($array3);
$array4 = $player->sortCards($array4);

$player1 = new Queue();
for($i=0;$i<count($array1);$i++){
   $player1->enqueue($array1[$i]);
}

$player2 = new Queue();
for($i=0;$i<count($array2);$i++){
   $player2->enqueue($array2[$i]);
}

$player3 = new Queue();
for($i=0;$i<count($array3);$i++){
   $player3->enqueue($array3[$i]);
}

$player4 = new Queue();
for($i=0;$i<count($array4);$i++){
   $player4->enqueue($array4[$i]);
}

$players = new Queue();

$players->enqueue($player1);
$players->enqueue($player2);
$players->enqueue($player3);
$players->enqueue($player4);

echo "All Players in the Queue with their Cards:\n\n";
echo "Player 1 with His Cards: ".$player1->getData()."\n\n";
echo "Player 2 with His Cards: ".$player2->getData()."\n\n";
echo "Player 3 with His Cards: ".$player3->getData()."\n\n";
echo "Player 4 with His Cards: ".$player4->getData()."\n";
?>