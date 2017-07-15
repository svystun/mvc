<?php namespace App\Phones;

use App\CellPhone;
use App\Helpers\Validator;

/**
 * Class CellPhilips
 * @package App\Phones
 */
class CellPhilips extends CellPhone {

    /**
     * CellPhilips constructor.
     * @param array $simCards
     * @param int $battery
     * @param string $model
     */
    public function __construct(array $simCards, $battery = 0, $model)
    {
        parent::__construct($simCards, $battery, $model);
    }

    /**
     * Send SMS
     * @param int $phoneNumber
     * @param string $message
     */
    public function sendSMS(int $phoneNumber, string $message = '') : void
    {
        if (! Validator::isValidNumber($phoneNumber)) {
            echo "Your numbers is invalid" . PHP_EOL;
            return;
        }

        if ($this->battery > 0 && count($this->simCards) > 0 && $this->checkMoney() && !empty($message)) {
            echo 'Sent ' . $this->model . ' sms message: ' . $message . ' to number: ' . $phoneNumber . PHP_EOL;
        }
    }

}