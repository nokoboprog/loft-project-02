<?php

namespace Base;

class Request
{
    private $controllerName = '';
    private $actionName = '';
    private $requestParams = [];

    public function __construct()
    {
        $parts = explode('/', trim($_SERVER['REQUEST_URI']));
        $this->controllerName = $parts[1] ?? '';
        $this->actionName = $parts[2] ?? '';
        $this->setRequestParams();
    }

    private function setRequestParams()
    {
        foreach ($_REQUEST as $key => $value) {
            $this->requestParams[trim(htmlspecialchars($key))] = trim(htmlspecialchars($value));
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getRequestParams()
    {
        return $this->requestParams;
    }
}
