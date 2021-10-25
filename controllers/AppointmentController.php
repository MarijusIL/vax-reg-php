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
        MessageController::appointmentEditInfo('welcome');
        MessageController::appointmentEditInfo('id');
        $wantedID = readline('Input id: ');
        $entry = $DB->getAppByID($wantedID);
        MessageController::appointmentEditInfo('name');
        $name = readline('Input new name: ');
        if ('' != $name) {
            $entry['name'] = $name;
        }
        MessageController::appointmentEditInfo('email');
        $email = readline('Input new email: ');
        if ('' != $email) {
            $entry['email'] = $email;
        }
        MessageController::appointmentEditInfo('phone');
        $phone = readline('Input new phone number: ');
        if ('' != $phone) {
            $entry['phone'] = $phone;
        }
        MessageController::appointmentEditInfo('natID');
        $natID = readline('Input new ID number: ');
        if ('' != $natID) {
            $entry['natID'] = $natID;
        }
        MessageController::appointmentEditInfo('date');
        $date = readline('Input new date (YYYY-MM-DD): ');
        if ('' != $date) {
            $entry['date'] = $date;
        }
        MessageController::appointmentEditInfo('time');
        $time = readline('Input new time (23:59 format): ');
        if ('' != $time) {
            $entry['time'] = $time;
        }
        $DB->edit($entry);
        unset($DB);
        App::keepRunning();
    }

    public static function delete() {
        $DB = DatabaseController::get();
        MessageController::appointmentDeleteInfo();
        $wantedID = readline('Input ID: ');
        $DB->delete($wantedID);
        unset($DB);
        App::keepRunning();
    }

    public static function show() {
        $DB = DatabaseController::get();
        MessageController::appointmentPrint();
        $date = readline('Input date: ');
        $list = $DB->print($date);
        foreach ($list as $entry) {
            MessageController::printDiv();
            foreach ($entry as $key => $value) {
                MessageController::appointmentPrintInfo($key, $value);
            }
        }
        unset($DB);
        App::keepRunning();
    }



}