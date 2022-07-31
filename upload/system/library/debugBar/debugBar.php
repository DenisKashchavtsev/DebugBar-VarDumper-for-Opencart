<?php

namespace debugBar;

class DebugBar
{
    /**
     * @var
     */
    private $data;

    /**
     * @var
     */
    private $session;

    /**
     * @var
     */
    private $debugBar;

    /**
     * @param $registry
     * @throws \Exception
     */
    public function __construct($registry)
    {
        $this->session = $registry->get('session');
        $this->debugBar = $registry->get('debugBar');

        if (isset($this->session->data['user_token'])) {
            $this->getData()->output();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function output()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
            return;
        }

        echo $this->render(__DIR__ . '/debugBar');
    }

    /**
     * @return DebugBar
     */
    public function getData()
    {
        $this->data['user_token'] = $this->session->data['user_token'];
        $this->data['queries'] = $this->debugBar->getQueries();
        $this->data['messages'] = $this->debugBar->getMessages();
        $this->data['actions'] = $this->debugBar->getActions();

        return $this;
    }

    /**
     * @param $template
     * @return false|string
     * @throws \Exception
     */
    public function render($template)
    {
        $file = $template . '.tpl';

        if (is_file($file)) {
            extract($this->data);

            ob_start();

            require($file);

            return ob_get_clean();
        }

        throw new \Exception('Error: Could not load template ' . $file . '!');
        exit();
    }
}

