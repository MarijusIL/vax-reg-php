<?php
namespace Marijus\VaxReg\Controllers;

use Marijus\VaxReg\App;

class MessageController {
    private static $divider = '___________________________' . "\r\n";
    private static $greeting = 'Welcome to VaxReg' . "\r\n";
    private static $menu = 'Input command or type !help for list of commands' . "\r\n";
    
    public static function greet() {
        echo self::$divider;
        echo self::$greeting;
        echo self::$menu;
    }
    public static function printMenu($routeArr) {
        echo 'available commands are:' . "\r\n";
        foreach ($routeArr as $route) {
            echo $route . "\r\n";
        }
    }

}