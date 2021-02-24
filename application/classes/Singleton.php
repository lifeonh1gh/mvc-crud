<?php

namespace application\classes;

class Singleton
{
    private static $instance;

    protected function __construct()
    {
    }

    /* При первом запуске, он создаёт экземпляр одиночки и помещает его в
       статическое поле. При последующих запусках, он возвращает объект,
       хранящийся в статическом поле.
    */
    public static function getInstance(): Singleton
    {
        $class = static::class;
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static();
        }

        return self::$instance[$class];
    }
}

//$instance = Singleton::getInstance();
//print_r($instance);