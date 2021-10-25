<?php
namespace Marijus\VaxReg\Models;

Use Marijus\VaxReg\Controllers\DatabaseController;

class Appointment {
    private static $nextID;
    private int $id;
    private string $name;
    private string $email;
    private string $phoneNumber;
    private int $nationalID;
    private string $date;
    private string $time;

    public function __construct(string $nameIn,
                                string $emailIn,
                                string $phoneNumberIn,
                                int $nationalIDIn,
                                string $dateIn,
                                string $timeIn) {
        if (!isset(self::$nextID)) {
            self::$nextID = 1;
        } else {
            self::$nextID = DatabaseController::get()->getNextId();
        }
        $this->id = self::$nextID;
        $this->name = $nameIn;
        $this->email = $emailIn;
        $this->phoneNumber = $phoneNumberIn;
        $this->nationalID = $nationalIDIn;
        $this->date = $dateIn;
        $this->time = $timeIn;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getNationalID() {
        return $this->nationalID;
    }

    public function setNationalID(int $id) {
        $this->nationalID = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTime(string $time) {
        $this->time = $time;
    }
}