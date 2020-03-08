<?php

namespace Base;

class Dispatcher
{
    const DEFAULT_CONTROLLER = 'User';
    const DEFAULT_ACTION = 'index';

    private $controllerName = '';
    private $actionToken = '';

    protected function getRoutes(): array
    {
        return [
            'Auth' => [
                'index' => 'User.index'
            ],
            'Register' => [
                'index' => 'User.register'
            ],
            'Users' => [
                'index' => 'User.list'
            ],
            'Files' => [
                'index' => 'File.list'
            ],
            'Logout' => [
               'index' => 'User.logout'
            ]
        ];
    }

    public function dispatch()
    {
        $request = Context::instance()->getRequest();

        $controllerName = $request->getControllerName();
        $actionName = $request->getActionName();

        if (!$controllerName || !$this->validate($controllerName)) {
            $this->controllerName = self::DEFAULT_CONTROLLER;
        } else {
            $this->controllerName = ucfirst(strtolower($controllerName));
        }

        if (!$actionName || !$this->validate($actionName)) {
            $this->actionToken = self::DEFAULT_ACTION;
        } else {
            $this->actionToken = strtolower($actionName);
        }

        $routes = $this->getRoutes();
        if (isset($routes[$this->controllerName]) && isset($routes[$this->controllerName][$this->actionToken])) {
            [$this->controllerName, $this->actionToken] = explode('.', $routes[$this->controllerName][$this->actionToken]);
        }
    }

    public function validate($key)
    {
        return preg_match('/[a-zA-Z0-9]+/', $key);
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionToken . 'Action';
    }

    public function getActionToken()
    {
        return $this->actionToken;
    }
}
