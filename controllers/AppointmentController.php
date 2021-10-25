<?php
namespace Marijus\VaxReg\Controllers;

Use Marijus\VaxReg\Controllers\DatabaseController;
Use Marijus\VaxReg\Controllers\MessageController;
Use Marijus\VaxReg\Models\Appointment;
use Marijus\VaxReg\App;

class AppointmentController {
    public static function test() {
        echo 'appointment ctrler test ok' . "\r\n";
    }

    public static function create() {
        $DB = DatabaseController::get();
        $inputChecked = false;
        MessageController::appointmentAddInfo('welcome');
        MessageController::appointmentAddInfo('name');
        while (!$inputChecked) {
            $inputChecked = true;
            $name = readline('Input full name: ');
            if ('' == $name) {
                $inputChecked = false;
                MessageController::error('empty-field');
            }
        }
        $inputChecked = false;
        MessageController::appointmentAddInfo('email');
        while (!$inputChecked) {
            $inputChecked = true;
            $email = readline('Input email adress: ');
            if ('' == $email) {
                $inputChecked = false;
                MessageController::error('empty-field');
            }
        }
        $inputChecked = false;
        MessageController::appointmentAddInfo('phone');
        while (!$inputChecked) {
            $inputChecked = true;
            $phone = readline('Input phone number: ');
            if ('' == $phone) {
                $inputChecked = false;
                MessageController::error('empty-field');
            }
        }
        $inputChecked = false;
        MessageController::appointmentAddInfo('natID');
        while (!$inputChecked) {
            $inputChecked = true;
            $natID = readline('Input ID number: ');
            if ('' == $natID) {
                $inputChecked = false;
                MessageController::error('empty-field');
            }
            $natID = (int) $natID;
        }
        $inputChecked = false;
        MessageController::appointmentAddInfo('date');
        while (!$inputChecked) {
            $inputChecked = true;
            $date = readline('Input date (YYYY-MM-DD): ');
            if ('' == $date) {
                $inputChecked = false;
                MessageController::error('empty-field');
            }
        }
        $inputChecked = false;
        MessageController::appointmentAddInfo('time');
        while (!$inputChecked) {
            $inputChecked = true;
            $time = readline('Input time (23:59 format): ');
            if ('' == $time) {
                $inputChecked = false;
                MessageController::error('empty-field');
            }
        }
        // $newAppointment = new Appointment($name, $email, $phone, $natID, $date, $time);
        $nextID = DatabaseController::get()->getNextId();
        $newAppointment = [
            "id" => $nextID,
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "natID" => $natID,
            "date" => $date,
            "time" => $time,
        ];
        $DB->add($newAppointment);
        unset($DB);
        App::keepRunning();
    }

    public static function update() {
        $DB = DatabaseController::get();
        
    }

    public static function delete() {
        $DB = DatabaseController::get();
    }

    public static function show() {
        $DB = DatabaseController::get();
    }



}