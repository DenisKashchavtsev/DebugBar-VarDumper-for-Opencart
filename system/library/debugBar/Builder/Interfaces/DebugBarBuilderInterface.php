<?php

namespace debugBar\Interfaces;

interface DebugBarBuilderInterface
{
    public function startQueryMicroTime();

    public function addQuery($query);
}