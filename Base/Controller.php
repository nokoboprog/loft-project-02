<?php

namespace Base;

class Controller
{
    public $view;

    protected $render = true;

    public function isRender()
    {
        return $this->render;
    }
}
