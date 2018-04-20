<?php


/**
 * Created by PhpStorm.
 * User: Van Duy
 * Date: 4/19/2018
 * Time: 3:55 PM
 */
//
//require __DIR__ . "/../vendor/autoload.php";
//
//use App\Exceptions\PathNotFoundException;
//
//var_dump(class_exists("App\Exceptions\PathNotFoundException"));
//$a = new PathNotFoundException();
//echo $a->test();
function checkNum($number) {
    if($number>1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

//trigger exception in a "try" block
try {
    checkNum(2);
    //If the exception is thrown, this text will not be shown
    echo 'If you see this, the number is 1 or below';
}

//catch exception
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}