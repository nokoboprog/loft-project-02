<?php

namespace Base;

use App\Models\User;

class Context
{
    private static $instance;

    private $request;

    private $dispatcher;

    private $dbConnection;

    private $user;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    public function setDispatcher(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    public function setDbConnection(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }
}
