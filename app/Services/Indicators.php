<?php


namespace App\Services;

use App\Indicators as Indicators_DB;


class Indicators
{

    private $error = [];
    private $param = [];

    /**
     * Indicators constructor.
     */
    public function __construct($type, $length)
    {
        if (empty($type)) {
            $this->setError("type", "the filter can not be empty");
        } elseif ($type != "guid" && !is_numeric($length)) {
            $this->setError("length", "must be digital");
        } else {
            $indicator = $this->{$type}($length);
            $id = Indicators_DB::query()->insertGetId(["metod" => $type, "indicator" => $indicator]);
            if (!$id) {
                $this->setError("0", "incorrect operation of the service, please contact the administrator");
            }
            $this->param = [
                'id' => $id,
                $type => $indicator];
        }
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return empty(count($this->error)) ? $this->param : $this->error;
    }

    /**
     * @param $name
     * @param $text_error
     * @return int
     */
    private function setError($name, $text_error)
    {
        isset($this->error['error']) ? "" : $this->error['error'] = [];
        return array_push($this->error['error'], [$name, $text_error]);
    }

    /**
     * @param $number
     * @return string
     */
        protected function number($length)
    {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /**
     * @param $number
     * @return string
     */
    protected function string($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /**
     * @param $number
     * @return string
     */
    protected function stringnumber($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    protected function guid()
    {
        //https://ru.wikipedia.org/wiki/GUID
        mt_srand((double)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return $uuid;

    }
}
