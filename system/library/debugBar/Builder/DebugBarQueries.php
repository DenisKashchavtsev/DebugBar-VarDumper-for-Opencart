<?php

namespace debugBar\Builder;

trait DebugBarQueries
{
    /**
     * @var
     */
    public $queryMicroTime;

    /**
     * @var
     */
    public $queries;

    /**
     * @return void
     */
    public function startQueryMicroTime()
    {
        $this->queryMicroTime = microtime(true);
    }

    /**
     * @param $query
     * @return void
     */
    public function addQuery($query)
    {
        $time = microtime(true) - $this->queryMicroTime;
        $trace = debug_backtrace();
        $rootPatch = str_replace('system/', '', DIR_SYSTEM);
        $callerFile = isset($trace[2]['file']) ? str_replace($rootPatch, '', $trace[2]['file']) : '';
        $caller = $trace[3];

        $this->queries[] = array(
            'sql' => $query,
            'time' => $time,
            'long' => round($time) * 1000 > 50,
            'file' => $callerFile,
            'caller' => isset($caller['class'])
                ? $caller['class'].'::'.$caller['function']
                : $caller['function']
        );

        $this->queryMicroTime = null;
    }

    /**
     * @return mixed
     */
    public function getQueries()
    {
        usort($this->queries, function($a,$b){
            return strnatcmp($a['time'], $b['time']);
        });

        return array_reverse($this->queries);
    }
}