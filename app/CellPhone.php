<?php namespace App;

use App\AbstractClasses\AbstractPhone;
use App\Interfaces\InterfacePhone;

/**
 * Class CellPhone
 * @package App
 */
class CellPhone extends AbstractPhone implements InterfacePhone {

    /**
     * Phone constructor.
     *
     * @param array $simCards
     * @param int $battery
     */
    public function __construct(array $simCards, int $battery = 0, string $model)
    {
        $this->simCards = $simCards;
        $this->battery = $battery;
        $this->model = $model;
    }

    /**
     * Call to some number
     *
     * @param int $phoneNumber
     * @return $this
     */
    public function call(int $phoneNumber)
    {
        if ($this->battery > 0 && count($this->simCards) > 0 && $this->checkMoney()) {
            $this->dialNumbers($phoneNumber);
            echo 'CAll to ' . $phoneNumber . PHP_EOL;
        }
        return $this;
    }

    /**
     * Send SMS
     *
     * @param int $phoneNumber
     * @param string $message
     * @return void
     */
    public function sendSMS(int $phoneNumber, string $message = '')
    {
        if ($this->battery > 0 && count($this->simCards) > 0 && $this->checkMoney() && ! empty($message)) {
            echo 'Sent sms message: '. $message . ' to number: ' . $phoneNumber . PHP_EOL;
        }
    }

    /**
     * Dial numbers
     *
     * @param int $phoneNumber
     */
    protected function dialNumbers(int $phoneNumber)
    {
        $arrNumbers =  str_split((string) $phoneNumber);
        foreach ($arrNumbers as $number) {
            $this->pressNumber($number);
        }
    }

    /**
     * Press Number
     *
     * @param int $number
     */
    protected function pressNumber(int $number)
    {
        echo 'Press number: ' . $number . PHP_EOL;
    }

    /**
     * Check Money
     *
     * @return bool
     */
    protected function checkMoney() : bool
    {
        if ($this->getMoney() > 0) {
            return true;
        }
        return false;
    }
}

