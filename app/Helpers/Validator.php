<?php namespace App\Helpers;

/**
 * Class Validator
 * @package App\Helpers
 */
class Validator {

    /**
     * @param string $number
     * @return bool
     */
    public static function isValidNumber(string $number) : bool
    {
        // numbers quatity
        // Firsr symbol +
        // 2-4 = 380

        return self::checkLength($number);
    }

    /**
     * @param string $number
     * @return bool
     */
    protected static function checkLength(string $number) : bool
    {
        // + 380 [673424543]
        $length = strlen($number);
        if ($length < 9 || $length > 14) {
            return false;
        }
        return true;
    }

}