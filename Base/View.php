<?php

namespace Base;

class View
{
    protected $data;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        $value = '';
        if (isset($this->data[$name])) {
            $value = $this->data[$name];
        }

        return $value;
    }

    public function render($template)
    {
        ob_start();
        include '../App/Views/Layouts/menu.phtml';
        include $template;
        return ob_get_clean();
    }
}
