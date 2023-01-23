<?php

namespace WBGenerateForm\Source\Core;

use WBGenerateForm\Source\Core\Bootstrap\RedirectBootstrap;

class Redirect
{
    private const COMMAND_OPTIONS = [
        'create-template-crud' => 'create-template-crud',
        'create-template-new' => 'create-template-new',
        'create-template-edit' => 'create-template-edit',
        'create-template-delete' => 'create-template-delete',
        'create-template-list' => 'create-template-list',
        'update-template-add' => 'create-template-add',
    ];

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
            case self::COMMAND_OPTIONS[$commandFirst] && (empty($options['type']) || $options['type'] === 'bootstrap'):
                $action = $this->actionVerify($commandFirst);
                $this->redirectBootstrap->getTypeGenerate($action, $options);

            case self::COMMAND_OPTIONS[$commandFirst]:
                print_r('teste');
                exit();
            default:
                print_r('Command not found');
        }
    }

    public function actionVerify(string $command)
    {
        return substr($command, 16, 10);
    }
}