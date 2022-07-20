<?php

namespace debugBar\Builder;

trait DebugBarActions
{
    /**
     * @var
     */
    public $actions;

    /**
     * @param $view
     * @return void
     */
    public function addAction($view)
    {
        $trace = debug_backtrace();

        $this->actions[] = [
            'controller' => $trace[3]['file'],
            'class' => $trace[4]['class'],
            'view' => $view
        ];
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }
}