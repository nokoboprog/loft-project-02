<?php

namespace Base;

use App\Models\User;
use Base\Exceptions\Error404;

class Application
{
    private $context;

    private function init()
    {
        $this->context = Context::instance();

        $request = new Request();
        $dispatcher = new Dispatcher();
        $dbConnection = new DbConnection();
        $dbConnection->openConnection();

        $this->context->setRequest($request);
        $this->context->setDispatcher($dispatcher);
        $this->context->setDbConnection($dbConnection);
    }

    private function initUser()
    {
        $session = Session::instance();
        $userId = $session->getUserId();
        if ($userId) {
            $user = new User();
            $this->context->setUser($user);
        }
    }

    public function run()
    {
        try {
            self::init();
            self::initUser();

            $this->context->getDispatcher()->dispatch();
            $dispatcher = $this->context->getDispatcher();

            $controllerFileName = 'App\Controllers\\' . $dispatcher->getControllerName();
            if (!class_exists($controllerFileName)) {
                throw new Error404('Введённой Вами страницы не существует!');
            }

            $controllerObject = new $controllerFileName();

            $actionName = $dispatcher->getActionName();
            if (!method_exists($controllerObject, $actionName)) {
                throw new Error404('Введённой Вами страницы не существует!');
            }

            $templatePath = '../App/Views/' . $dispatcher->getControllerName() . '/' .
                $dispatcher->getActionToken() . '.phtml';

            $view = new View();
            $controllerObject->view = $view;
            $controllerObject->$actionName();

            if ($controllerObject->isRender()) {
                echo $view->render($templatePath);
            }
        } catch (Error404 $e) {
            echo '<h1>Ошибка 404:</h1>';
            echo $e->getMessage();
        }
    }
}
