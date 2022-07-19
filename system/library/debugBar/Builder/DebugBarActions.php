<?php

namespace debugBar\Builder;

trait DebugBarActions
{
    /**
     * @var
     */
    public $actions;

    /**
     * @param $patch
     * @return void
     */
    public function addController($patch)
    {
        $this->actions[] = [
            'controller' => $patch,
            'method' => $patch
        ];
    }

    /**
     * @return array
     */
    public function getControllers()
    {
        return $this->actions;
    }
}