<?php namespace App;

/**
 * Trait TraitPhone
 * @package App
 */
trait TraitPhone {

    /**
     * Gat current amount status
     *
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Add money to phone number
     *
     * @param int $amount
     * @return $this
     */
    public function setMoney(int $amount)
    {
        $this->money = $amount;
        return $this;
    }
}