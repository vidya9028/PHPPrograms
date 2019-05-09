<?php
include "Util.php";
require_once "StockData.php";
class StockAccount{

    public function account($stockAccount)
    {
        //$stockdata = new StockData();
        $choice = 0;
        while($choice!=5){
            echo "............Stock Account Menu........\n\n";
            echo "1.New Account\n2.Buy Stocks\n3.Sell Stocks\n4.Print Stock Report\n5.Save Stock Report\n\nEnter Your Choice: ";
            $choice = Util::user_integerInput();
            switch($choice){
                case 1:
                    $newAccount = $stockAccount;
                    echo "\nNew Account From List\n";
                    Util::printAccount($stockAccount);
                    echo "\n";
                    break;
                case 2:
                    $stockAccount = Util::buyStocks($stockAccount);
                    echo "\n\n";
                    break;
                case 3:
                    $stockAccount = Util::sellStocks($stockAccount);
                    echo "\n\n";
                    break;
                case 4:
                    $stockAccount = Util::printStockReport($stockAccount);
                    echo "\n";
                    break;
                case 5:
                    echo "\nAccount Saved Successfully!\n";
                    break;
                default:
                    echo "\nEnter Valid Input!\n";
                    break;
            }
            
        }
    }
}
$obj = new StockAccount();
$array = Util::read_jsonFile("StockAccount.json");
$obj->account($array);
?>