<?php
namespace Marijus\VaxReg;

Use Marijus\VaxReg\Models\Appointment;
Use Marijus\VaxReg\Controllers\AppointmentController;
Use Marijus\VaxReg\Controllers\DatabaseController;
Use Marijus\VaxReg\Controllers\MessageController;

class App {
    private static $routes = ['!add', '!edit', '!delete', '!print', '!help', '!quit'];

    public static function start() {
        MessageController::greet();
        $line = readline('Enter command: ');
        self::router($line);
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function router(string $route) {
        if ($route === '!help') {
            MessageController::printMenu(self::$routes);
        } elseif ($route === '!add') {

        } elseif ($route === '!edit') {
            
        } elseif ($route === '!delete') {
            
        } elseif ($route === '!print') {
            
        } elseif ($route === '!quit') {

        } else {
            
        }
    }
}