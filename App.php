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
    public static function keepRunning() {
        MessageController::enquire();
        $line = readline('Enter command: ');
        self::router($line);
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function router(string $route) {
        if ('!help' === $route) {
            MessageController::printMenu(self::$routes);
            self::keepRunning();
        } elseif ('!add' === $route) {
            AppointmentController::create();
        } elseif ('!edit' === $route) {
            AppointmentController::update();
        } elseif ('!delete' === $route) {
            AppointmentController::delete();
        } elseif ('!print' === $route) {
            AppointmentController::show();
        } elseif ('!quit' === $route) {
            MessageController::bye();
        } else {
            MessageController::error('invalid-route');
            self::keepRunning();
        }
    }
}