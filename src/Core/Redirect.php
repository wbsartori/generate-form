<?php

namespace WBGenerateForm\Source\Core;

use WBGenerateForm\Source\Config\Commanders;
use WBGenerateForm\Source\Core\Bootstrap\RedirectBootstrap;

class Redirect
{
    /**
     * @var RedirectBootstrap
     */
    private RedirectBootstrap $redirectBootstrap;

    /**
     * @param $options
     * @return void
     */
    public function validateOptions($options)
    {
        $commandFirst = array_key_first($options);

        switch ($commandFirst) {
            case Commanders::COMMAND_OPTIONS[$commandFirst] && (empty($options['type']) || $options['type'] === 'bootstrap'):
                $action = $this->actionVerify($commandFirst);
                $this->redirectBootstrap->getTypeGenerate($action, $options);
                break;
            default:
                break;
        }
    }

    /**
     * @param string $command
     * @return false|string
     */
    public function actionVerify(string $command)
    {
        return substr($command, 16, 10);
    }

    /**
     * @param RedirectBootstrap $redirectBootstrap
     */
    public function setRedirectBootstrap(RedirectBootstrap $redirectBootstrap): void
    {
        $this->redirectBootstrap = $redirectBootstrap;
    }
}