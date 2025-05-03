<?php

namespace WBGenerateForm\Source\Core\Bootstrap;

use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateCrud;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateDelete;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateEdit;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateList;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateNew;

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
     */
    public function getTypeGenerate(string $typeAction, array $commands)
    {
        switch ($typeAction) {
            case $typeAction === 'crud':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates crud wait!\e[0m\n";
                $this->bootstrapGenerateCrud->generateAll($commands);
                break;
            case $typeAction === 'list':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates list wait!\e[0m\n";
                $this->bootstrapGenerateCrud->generateList($commands);
                break;
            case $typeAction === 'new':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates new wait!\e[0m\n";
                $this->bootstrapGenerateCrud->generateNew($commands);
                break;
            case $typeAction === 'edit':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates edit wait!\e[0m\n";
                $this->bootstrapGenerateCrud->generateEdit($commands);
                break;
            case $typeAction === 'delete':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates delete wait!\e[0m\n";
                $this->bootstrapGenerateCrud->generateDelete($commands);
                break;
            default:
                echo "\e[1;31;41mERROR: Command \e[1m" . $typeAction . "\e[1;31;41m not found in commands list!\e[0m\n";
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