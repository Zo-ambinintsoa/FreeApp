<?php

class Singleton {
    private static $instance = [];

    protected function __construct() { }

    protected function __clone(){ }

    public function __wakeup() {
        throw new \Exception("cannot unserialize singleton");
    }
    public static function getInstance(){
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instance[$subclass] = new static();
        }
        return self::$instance[$subclass];
    }
}

class Session extends Singleton {
    private array $sessionvar = array();
    public function getSessionVar()
    {
        return $this->sessionvar;
    }

    public function setSessionVar($sessionvar)
    {
        $this->sessionvar = $sessionvar;
        return $this;
    }
}
