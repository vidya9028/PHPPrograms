<?php
include "Util.php";
require_once "Person.php";
class AddressBook{
    public function menu($addressBook)
    {
        $choice = 0;
        while($choice!=7){
        echo "---------Address Book Menu---------\n\n";
        echo "1.Add Person\n2.Edit person's Data\n3.Delete a Person\n4.Sort AddressBook\n5.Search\n6.Save\n7.Exit";
        echo "\nEnter The Choice: ";
        $choice = Util::user_integerInput();

        switch($choice){
            case 1:
                Util::addPerson($addressBook);
                break;
            case 2:
                $flag = 2;
                while(($key = Util::searchPerson($addressBook))=== -1){
                    echo "Enteries for searched person not found!\nEnter 1 for exit to menu or else to search again:\n";
                    $flag = Util::user_integerInput();
                    if($flag == 1){
                        break;
                    }
                }

                if($flag == 1){
                    break;
                }
                else{
                    $addressBook[$key] = Util::editData($addressBook[$key]);
                }
                break;
            case 3:
                Util::deletePerson($addressBook);
                break;
            case 4:
                echo "\n1.Sort according to Name\n2.Sort according to ZipCode\nEnter Choice: ";
                $choice = Util::user_integerInput();
                switch($choice){
                    case 1:
                        Util::sortAddressBook($addressBook,"firstName");
                        Util::displayAddressBook($addressBook);
                        break;
                    case 2:
                        Util::sortAddressBook($addressBook,"zipCode");
                        Util::displayAddressBook($addressBook);
                        break;
                    default:
                        break;
                }
                break;
            case 5 :
                //case to search for a person's details
                //calling function to search
                $key = Util::searchPerson($addressBook);

                if($key>-1)
                {
                    $array1=[];
                        
                    //passing the index returned by the search function which gives the person object searched for
                    $array1[] = $addressBook[$key];
                    echo "\nsearch suceeded\n";
                    echo "person details are as follows\n\n";
                        
                    //printing the details of searched person
                    Util::displayAddressBook($array1);
                }
                else
                {
                //if search fails
                echo"person details not found\n";
                }
                break;
            case 6 :
                //case to save all the changes made in addressbook
                Util::save($addressBook);
                echo "\nsuccessfully saved\n";
                break;
            case 7 :
                //case to exit the main menu
                echo "\n*****Exiting*****\n\n";
                break;
            default : 
                break;
        }
        }
    }
}
$obj = new AddressBook();
$array = Util::read_jsonFile("AddressBooklist.json");
$obj->menu($array);
?>