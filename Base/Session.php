<?php

namespace Base;

class Session
{
    const FIELD_USER_ID = 'user_id';

    private static $instance;

    private function __construct()
    {
        session_start();
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

    private function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    private function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function destroy()
    {
        session_destroy();
    }

    public function save($userId)
    {
        if ($userId <= 0) {
            throw new Exception('Невозможно сохранить сессию пользователя id=' . $userId);
        }

        $this->set(self::FIELD_USER_ID, $userId);
    }

    public function getUserId()
    {
        return self::get(self::FIELD_USER_ID);
    }
}
