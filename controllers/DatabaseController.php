<?php
namespace Marijus\VaxReg\Controllers;

Use Marijus\VaxReg\Models\Appointment;

class DatabaseController {

    private static $obj;
    private $data;

    public static function get() {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct() {
        if (!file_exists(DIR . '\data\appointments.json')) {
            file_put_contents(DIR . '\data\appointments.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR . '\data\appointments.json'), 1);
    }

    public function __destruct() {
        file_put_contents(DIR . '\data\appointments.json', json_encode($this->data));
    }

    public function add($appNew) {
        $this->data[] = $appNew;
        file_put_contents(DIR . '\data\appointments.json', json_encode($this->data));
    }

    public function edit($appUpd) {
        foreach ($this->data as $key => $entry) {
            if ($entry['id'] == $appUpd['id']) {
                $this->data[$key] = $appUpd;
                break;
            }
        }
        file_put_contents(DIR . '\data\appointments.json', json_encode($this->data));
    }

    public function delete($appID) {
        foreach ($this->data as $key => $entry) {
            if ($entry['id'] == $appID) {
                unset($this->data[$key]);
                break;
            }
        }
        file_put_contents(DIR . '\data\appointments.json', json_encode($this->data));
    }

    public function print($date) {
        $list = [];
        foreach ($this->data as $key => $entry) {
            if ($entry['date'] == $date) {
                $list[] = $entry;
            }
        }
        foreach (range(0, count($list) - 2) as $i) {
            foreach (range(($i + 1), count($list) - 1) as $j) {
                $iTime = $list[$i]['time'];
                $iTime = explode(':', $iTime);
                $iTime = (int) ($iTime[0] . $iTime[1]);
                $jTime = $list[$j]['time'];
                $jTime = explode(':', $jTime);
                $jTime = (int) ($jTime[0] . $jTime[1]);
                if ($iTime > $jTime) {
                    $temp = $list[$i];
                    $list[$i] = $list[$j];
                    $list[$j] = $temp;
                }
            }
        }
        return $list;
    }

    public function getNextId() {
        return count($this->data) + 1;
    }

    public function getAppByID($appID) {
        foreach ($this->data as $entry) {
            if ($entry['id'] == $appID) {
                return $entry;
            }
        }
    }
}