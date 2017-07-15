<?php namespace App\Phones;

use App\CellPhone;

/**
 * Class CellNokia
 * @package App\Phones
 */
class CellNokia extends CellPhone {

    /**
     * CellNokia constructor.
     * @param array $simCards
     * @param int $battery
     * @param string $model
     */
    public function __construct(array $simCards, $battery = 0, $model)
    {
        parent::__construct($simCards, $battery, $model);
    }

    /**
    * Call to some number
    *
    * @param int $phoneNumber
    * @return void
    */
    public function call(int $phoneNumber)
    {
         if ($this->battery > 0 && count($this->simCards) > 0 && $this->checkMoney()) {
             $this->dialNumbers($phoneNumber);
             echo 'CAll ' . $this->model . ' to ' . $phoneNumber . PHP_EOL;
         }
    }
}