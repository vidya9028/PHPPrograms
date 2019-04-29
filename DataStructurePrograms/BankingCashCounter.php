<?php
/**
 * Problem Statement:
 * Create a Program which creates Banking Cash Counter where people
 * come in to deposit Cash and withdraw Cash. Have an input panel to add people
 * to Queue to either deposit or withdraw money and dequeue the people. Maintain
 * the Cash Balance.
 * 
 */
include "Util.php";
include "BankingQueue.php";
class BankingCashCounter{
   public static $balance=1000;

    public static function depositAmount($cash){
        self::$balance += $cash;
        echo "Deposited Amount: ".$cash;
        echo "\nAvailable Balance: ".self::$balance; 
    }
    
    public function withdrawAmount($cash)
    {
        self::$balance -= $cash;
        echo "Withdraw Amount: ".$cash;
        echo "\nAvailable Balance: ".self::$balance; 
    }
}
$obj = new BankingCashCounter();
$queue = new BankingQueue();
$choice=0;
$ch=0;
do{
    echo "1.Deposite Amount\n2.Withdraw Amount\nEnter Your Choice:";
    $choice = Util::user_integerInput();
    switch($choice){
        case 1:
            echo "Enter Person: ";
            $data = Util::user_integerInput();
            $queue->enqueue($data);
            echo "Enter the Deposit Amount: ";
            $cash = Util::user_integerInput();
            $obj->depositAmount($cash);
            echo "\nPerson Entered in Queue!";
            $queue->dequeue();
            echo "\n".$cash." Amount Deposited!\n";
            break;
        
        case 2:
            echo "Enter Person:";
            $data = Util::user_integerInput();
            $queue->enqueue($data);
            echo "\nEnter the Withdraw Amount: ";
            $cash = Util::user_integerInput();
            $obj->withdrawAmount($cash);
            echo "\nPerson Entered in Queue!";
            $queue->dequeue();
            echo "\n".$cash." Amount Withdraw!\n";
            break;

        default:
            echo "\nEntered Wrong choice!";
            break;
    }
    echo "Do you Want to Continue:(Y/N) ";
    $ch = Util::string_Input();
}while($ch=='Y'||$ch=='y');

?>