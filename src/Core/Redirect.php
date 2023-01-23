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

    public function __construct()
    {
        $this->redirectBootstrap = new RedirectBootstrap();
    }

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

    public function actionVerify(string $command)
    {
        return substr($command, 16, 10);
    }
}