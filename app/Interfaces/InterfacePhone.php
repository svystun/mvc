<?php namespace App\Interfaces;

/**
 * Interface InterfacePhone
 * @package App\Interfaces
 */
interface InterfacePhone {
    const phone = 'phone';

    /**
     * @param int $phoneNumber
     * @return mixed
     */
    public function call(int $phoneNumber);

    /**
     * @param int $phoneNumber
     * @param string $message
     * @return mixed
     */
    public function sendSMS(int $phoneNumber, string $message = '');
}