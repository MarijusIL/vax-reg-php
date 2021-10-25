<?php
namespace Marijus\VaxReg\Controllers;

use Marijus\VaxReg\App;

class MessageController {
    private static $divider = '___________________________' . "\r\n";
    private static $greeting = 'Welcome to VaxReg!' . "\r\n";
    private static $enquiry = 'Input command or type !help for list of commands.' . "\r\n";
    
    public static function greet() {
        echo self::$divider;
        echo self::$greeting;
        echo self::$enquiry;
    }

    public static function printMenu($routeArr) {
        echo 'Available commands are:' . "\r\n";
        foreach ($routeArr as $route) {
            echo $route . "\r\n";
        }
    }

    public static function enquire() {
        echo self::$divider;
        echo self::$enquiry;
    }

    public static function error(string $type, string $info = '') {
        if ('invalid-route' === $type) {
            echo 'The command you have entered, does not exist. Type !help for list of commands.' . "\r\n";
        } elseif ('empty-field' === $type) {
            echo 'This field must be filled.' . "\r\n";
        } elseif ('invalid-field' === $type) {
            echo "Invalid data entered, this field requires $info." . "\r\n";
        }
    }

    public static function bye() {
        echo 'Thank you for using VaxReg!' . "\r\n";
    }

    public static function appointmentAddInfo(string $step) {
        if ('welcome' === $step) {
            echo 'When prompted, please provide the information. All fields must be filled.' . "\r\n";
        } elseif ('name' === $step) {
            echo '1. Name and Surname' . "\r\n";
        } elseif ('email' === $step) {
            echo '2. Email adress' . "\r\n";
        } elseif ('phone' === $step) {
            echo '3. Phone number' . "\r\n";
        } elseif ('natID' === $step) {
            echo '4. National identification number' . "\r\n";
        } elseif ('date' === $step) {
            echo '5. Date of visit' . "\r\n";
        } elseif ('time' === $step) {
            echo '6. Time of visit' . "\r\n";
        }
    }
    public static function appointmentEditInfo(string $step) {
        if ('welcome' === $step) {
            echo 'When prompted, please provide the information only if you want to input new information, otherwise just click enter.' . "\r\n";
        } elseif ('name' === $step) {
            echo '1. Name and Surname' . "\r\n";
        } elseif ('email' === $step) {
            echo '2. Email adress' . "\r\n";
        } elseif ('phone' === $step) {
            echo '3. Phone number' . "\r\n";
        } elseif ('natID' === $step) {
            echo '4. National identification number' . "\r\n";
        } elseif ('date' === $step) {
            echo '5. Date of visit' . "\r\n";
        } elseif ('time' === $step) {
            echo '6. Time of visit' . "\r\n";
        }
    }
    public static function appointmentDeleteInfo() {

    }
    public static function appointmentPrintInfo($field, $value) {
        echo "$field: $value"  . "\r\n";
    }

    public static function printDiv() {
        echo self::$divider;
    }

}