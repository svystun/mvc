<?php

/**
 * Class Settings
 */
class Settings {

    private $settings = array();

    private static $_instance = null;

    private function __construct() {
    // приватный конструктор ограничивает реализацию getInstance () через команду new
    }

    protected function __clone() {
    // ограничивает клонирование объекта
    }

    public static function getInstance() {
        if (is_null(self::$_instance))
        {
            self::$_instance = new Settings();
        }
        return self::$_instance;
    }

    public function import() {
        $this->settings = [1,2,3];
        return $this;
    }

    public function get() {
        return $this->settings;
    }
}

$settings = Settings::getInstance()->import()->get();
print_r($settings);