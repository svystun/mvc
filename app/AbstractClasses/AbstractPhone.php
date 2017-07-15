<?php namespace App\AbstractClasses;

use App\TraitPhone;

/**
 * Class AbstractPhone
 * @package App\AbstractClasses
 */
abstract class AbstractPhone {

    use TraitPhone;

    public $color;
    public $length;
    public $width;

    /**
     * @var string
     */
    protected $model = '';

    /**
     * Кількість сім карт
     * @var array
     */
    protected $simCards = []; //

    /**
     * Ємність акумулятора
     * @var
     */
    protected $battery; // mA Example: 500 mA, 3000 mA

    /**
     * @var
     */
    protected $money; // Exmp: 20 UAH

    /**
     * @param int $phoneNumber
     * @return mixed
     */
    abstract function call(int $phoneNumber);

    /**
     * @param int $phoneNumber
     * @param string $message
     * @return mixed
     */
    abstract function sendSMS(int $phoneNumber, string $message = '');
}