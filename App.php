<?php
namespace Marijus\VaxReg;

Use Marijus\VaxReg\Models\Appointment;
Use Marijus\VaxReg\Controllers\AppointmentController;
Use Marijus\VaxReg\Controllers\DatabaseController;
Use Marijus\VaxReg\Controllers\MessageController;

class App {

    public static function start() {
        echo 'app test ok' . "\r\n";
        Appointment::test();
        AppointmentController::test();
        DatabaseController::test();
        MessageController::test();
    }
}