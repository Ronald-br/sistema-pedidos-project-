<?php

class Database {
    private static $instancia = null;

    private function __construct() {}

    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }
}