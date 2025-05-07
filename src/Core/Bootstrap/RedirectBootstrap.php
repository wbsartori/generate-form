<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core\Bootstrap;

use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateCrud;

class RedirectBootstrap
{
    /**
     * @var BootstrapGenerateCrud
     */
    private BootstrapGenerateCrud $bootstrapGenerateCrud;

    /**
     * @param string $typeAction
     * @param array $commands
     * @return void
     * @throws \Exception
     *
     */
    public function getTypeGenerate(string $typeAction, array $commands)
    {
        switch ($typeAction) {
            case $typeAction === 'crud' && isset($commands['name']) && isset($commands['fields']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates crud wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateAll($commands);
                break;
            case $typeAction === 'list' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates list wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateList($commands);
                break;
            case $typeAction === 'new' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates new wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateNew($commands);
                break;
            case $typeAction === 'edit' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates edit wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateEdit($commands);
                break;
            case $typeAction === 'delete' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates delete wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateDelete($commands);
            case $typeAction === 'form' && isset($commands['name']) && isset($commands['fields']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates form wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateForm($commands);
                break;
            case $typeAction === 'add-fields' && isset($commands['name']) && isset($commands['fields']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating fields to form wait!\e[0m\n";
                echo $this->bootstrapGenerateCrud->generateFields($commands);
                break;
            default:
                echo "\e[1;31;41mERROR: Command \e[1m" . $typeAction . "\e[1;31;41m not found in commands list or a parameter is missing\e[0m\n";
                echo "\e[1;31;41mERROR: Use --help to view all parameters\e[0m\n";
                break;
        }
    }

    /**
     * @param BootstrapGenerateCrud $bootstrapGenerateCrud
     */
    public function setBootstrapGenerateCrud(BootstrapGenerateCrud $bootstrapGenerateCrud): void
    {
        $this->bootstrapGenerateCrud = $bootstrapGenerateCrud;
    }
}
