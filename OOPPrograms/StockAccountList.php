<?php

require_once "Util.php";
require_once "Stack.php";
require_once "Queue1.php";
require_once "StockData.php";
/**
 * stockAcount class for perfoming operation on queue and stack
 */
class StockAccount
{
    public $account;
    public $stack;
    public $queue;
    /**
     * initialization of constructor
     */
    public function __construct($account = [],$stack = [], $queue =[])
    {
        $this->account = $account;
        $this->stack = $stack;
        $this->queue = $queue;
    }
    /**
     * function to get account details
     */
    function getAccount()
    {
        return $this->account;
    }
    /**
     * function for stack which returns the current elements 
     */
    function getStack()
    {
        return $this->stack;
    }
    /**
     * function for queue which returns the current elements 
     */
    function getQueue()
    {
        return $this->queue;
    }
    /**
     * function for stack which pass the one arguments to a stack
     */
    function setStack($stack)
    {
        $this->stack = $stack;
    }
    /**
     * function for queue which pass the one arguments to a queue
     */
    function setQueue($queue)
    {
        $this->queue = $queue;
    }
    /**
     * this function is having one argument which holds account number
     */
    function setAcc($account)
    {
        $this->account = $account;
    }
}
/**
 * funtion to buy stocks from the list and add it to the account
 */
function buy($stockacc)
{
    $account = $stockacc->account;
    $stack = $stockacc->stack;
    $queue = $stockacc->queue;
    //var_dump($account);
    //list var to store the list the stock to purachase from
    $list = printStockList();
    //askins use rfor input
    echo "Enter No of StockName To Buy : ";
    //var ch to store stock to buy
    $ch = Util::validateAmount(Util::user_integerInput(), 1, 8);
    echo $list[$ch - 1]->stockName . " selected!\nEnter No Of Shares To Buy of " . $list[$ch - 1]->stockName . " : ";
    //amnt to store the no of shares to buy
    $amnt = Util::validateAmount(Util::user_integerInput(), 0, 90000);
    //getting the stock from the list
    $stock = $list[$ch - 1];
    //creating new stock
    $stock = new StockData($stock->stockName, $stock->Price, $amnt);
    //adding the stock to the account if already in the list and return
    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]['stockName'] == $stock->stockName) {
            $account[$i]['noofShares'] += $stock->noofShares;
            echo "Bought $stock->noofShares " . "$stock->stockName shares successfully";
            $stack[]= ($account[$ch - 1]->stockName . " bought");
            $queue[]=("$amnt " . $account[$ch - 1]->stockName . "shares bought at " . date("h:i:s D d/m/y"));
            $stockacc->account = $account;
            $stockacc->stack = $stack;
            $stockacc->queue = $queue;
            return $stockacc;
        }
    }
    //or else adds the new stack the end of the list
    $account[] = $stock;
    echo "Bought $stock->noofShares " . "$stock->stockName shares successfully";
    $stack[]=(" bought");
    $queue[]=($amnt . " " . $stock->stockName . " shares bought at " . date("h:i:s D d/m/y"));
    //waiting for user to see the result
    fscanf(STDIN, "%s\n");
    $stockacc->account = $account;
    $stockacc->stack = $stack;
    $stockacc->queue = $queue;
    return $stockacc;
}
/**
 * function to sell the stock from the list
 */
function sell($stockacc)
{
    $account = $stockacc->account;
    $stack = $stockacc->stack;
    $queue = $stockacc->queue;
    //show the stock from the list to the user
    printAccount($account);
    //taking the user input
    echo "Enter No of StockName To Sell : ";
    //validating the input
    $ch = Util::validateAmount(Util::user_integerInput(), 1, count($account));
    echo $account[$ch - 1]->stockName . " selected!\nEnter No Of Shares To Sell of " . $account[$ch - 1]->stockName . " : ";
    $qt = Util::validateAmount(Util::user_integerInput(), 1, $account[$ch - 1]->noofShares);
    //removing the stock
    $account[$ch - 1]->noofShares -= $qt;
    $stack[]=($account[$ch - 1]->stockName . " sold");
    $queue[]=($account[$ch - 1]->stockName . " shares sold at " . date("h:i:s D d/m/y"));
    print_r($stack);
    print_r($queue);
    echo "sold $qt shares successfully";
    //check if the shares are empty to delete the entry completely
    if ($account[$ch - 1]->noofShares == 0) 
    {
        array_splice($account, ($ch - 1), 1);
    }
    fscanf(STDIN, "%s\n");
    $stockacc->account = $account;
    $stockacc->stack = $stack;
    $stockacc->queue = $queue;
    return $stockacc;
}
/**
 *  function to save the stocks to the file
 */
function save($stockacc)
{
    file_put_contents("StockAccountlist.json", json_encode($stockacc));
}
//function to display the menu and run the program
function menu($stockacc)
{
    $choice =0;
    while($choice!=4){
    echo ".........Menu...........\n";
    echo "1. Buy New Stock \n2. Sell Stocks\n";
    echo "3. Print Stock Report\n4. see Transaction History\n5. Save Transaction\nEnter your choice: ";
    $choice = Util::user_integerInput();
    //switch case to run according to condition
    switch ($choice) 
    {
        case '1':
            $stockacc = buy($stockacc);
            echo "\n\n";
            menu($stockacc);
            break;
        case '2':
            $stockacc = sell($stockacc);
            echo "\n\n";
            menu($stockacc);
            break;
        case '3':
            report($stockacc);
            menu($stockacc);
            break;
        case '4':
            transactions($stockacc->queue);
            menu($stockacc);
            break;
        case 5: 
                save($stockacc);
                echo "Transaction saved\n";
            break;
        default:
            echo "valid Choice!\n";
            break;
    }
}
}
/**
 * function to display the report of the stocks
 */
function report($stockacc)
{
    $account = $stockacc->account;
        // /    var_dump($portfolio);
    $total = 0;
    echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
    foreach ($account as $key) {
        echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->stockName, $key->Price, $key->noofShares, ($key->noofShares * $key->Price)) . "\n";
        $total += ($key->noofShares * $key->Price);
    }
    echo "Total Value Of Stocks is : " . $total . " rs\n";
    echo "enter to menu ";
    fscanf(STDIN, "%s\n");
}
function transactions($queue)
{
    echo "Transaction History :\n";
    foreach ($queue as $key) {
        echo $key."\n";
    }
    echo"\n enter to Menu\n";
    fscanf(STDIN, "%s\n");
}
//function to print the stock currently in the stock
function printAccount($stockacc)
{
    $account = $stockacc;
    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
    $i = 0;
    foreach ($account as $key) {
        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", ++$i, $key->stockName, $key->Price, $key->noofShares, ($key->noofShares * $key->Price)) . "\n";
    }
}
/**
 * function to print the list the stocks available to buy
 */
function printStockList()
{
    $list = json_decode(file_get_contents("StockList.json"));
    echo "No | Stock Name | Share Price | Available\n";
    $i = 0;
    foreach ($list as $key) 
    {
        echo sprintf("%-1u. | %-10s | Rs %-12u | %-9u", ++$i, $key->stockName, $key->Price, $key->noofShares) . "\n";
    }
    return $list;
}

$stockacc = (array) json_decode(file_get_contents("StockAccountlist.json"));
if($stockacc==null)
{
    $stockacc = new StockAccount();
}
else
{
    $stockacc = new StockAccount($stockacc["account"] ,$stockacc["stack"],$stockacc["queue"]);
}

menu($stockacc);
?>
