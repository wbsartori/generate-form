<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core;

use WBGenerateForm\Source\Core\Bootstrap\RedirectBootstrap;
use WBGenerateForm\Source\Core\Laravel\RedirectLaravel;

class Redirect
{
    /**
     * @var RedirectBootstrap
     */
    private RedirectBootstrap $redirectBootstrap;

    /**
     * @var RedirectLaravel
     */
    private RedirectLaravel $redirectLaravel;

    /**
     * @param $options
     * @return void
     * @throws \Exception
     */
    public function validateOptions($options)
    {
        $commandFirst = array_key_first($options);
        switch ($commandFirst) {
            case Commanders::COMMAND_OPTIONS[$commandFirst] && $_ENV['GENERATE_FORM_TYPE'] === 'bootstrap':
                $action = $this->actionVerify($commandFirst);
                $this->redirectBootstrap->getTypeGenerate($action, $options);
                break;
            case Commanders::COMMAND_OPTIONS[$commandFirst]  && $_ENV['GENERATE_FORM_TYPE'] === 'laravel':
                $action = $this->actionVerify($commandFirst);
                if($action !== '') {
                    $this->redirectLaravel->getTypeGenerate($action, $options);
                }
                break;
            default:
                echo "\e[1;31;41mERROR: 'GENERATE_FORM_TYPE' not configured in file .env\e[0m\n";
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

    /**
     * @param RedirectLaravel $redirectLaravel
     */
    public function setRedirectLaravel(RedirectLaravel $redirectLaravel): void
    {
        $this->redirectLaravel = $redirectLaravel;
    }
}
