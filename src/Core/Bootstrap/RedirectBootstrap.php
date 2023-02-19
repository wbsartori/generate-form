<?php

namespace WBGenerateForm\Source\Core\Bootstrap;

use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateCrud;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateDelete;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateEdit;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateList;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateNew;

class RedirectBootstrap
{
    /**
     * @var BootstrapGenerateCrud
     */
    private BootstrapGenerateCrud $bootstrapGenerateCrud;
    /**
     * @var LaravelGenerateList
     */
    private LaravelGenerateList $bootstrapGenerateList;
    /**
     * @var LaravelGenerateNew
     */
    private LaravelGenerateNew $bootstrapGenerateNew;
    /**
     * @var LaravelGenerateEdit
     */
    private LaravelGenerateEdit $bootstrapGenerateEdit;
    /**
     * @var LaravelGenerateDelete
     */
    private LaravelGenerateDelete $bootstrapGenerateDelete;

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
                $this->bootstrapGenerateCrud->generate($commands);
                break;
            case $typeAction === 'list':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates list wait!\e[0m\n";
                $this->bootstrapGenerateList->generate($commands);
                break;
            case $typeAction === 'new':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates new wait!\e[0m\n";
                $this->bootstrapGenerateNew->generate($commands);
                break;
            case $typeAction === 'edit':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates edit wait!\e[0m\n";
                $this->bootstrapGenerateEdit->generate($commands);
                break;
            case $typeAction === 'delete':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates delete wait!\e[0m\n";
                $this->bootstrapGenerateDelete->generate($commands);
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

    /**
     * @param LaravelGenerateList $bootstrapGenerateList
     */
    public function setBootstrapGenerateList(LaravelGenerateList $bootstrapGenerateList): void
    {
        $this->bootstrapGenerateList = $bootstrapGenerateList;
    }

    /**
     * @param LaravelGenerateNew $bootstrapGenerateNew
     */
    public function setBootstrapGenerateNew(LaravelGenerateNew $bootstrapGenerateNew): void
    {
        $this->bootstrapGenerateNew = $bootstrapGenerateNew;
    }

    /**
     * @param LaravelGenerateEdit $bootstrapGenerateEdit
     */
    public function setBootstrapGenerateEdit(LaravelGenerateEdit $bootstrapGenerateEdit): void
    {
        $this->bootstrapGenerateEdit = $bootstrapGenerateEdit;
    }

    /**
     * @param LaravelGenerateDelete $bootstrapGenerateDelete
     */
    public function setBootstrapGenerateDelete(LaravelGenerateDelete $bootstrapGenerateDelete): void
    {
        $this->bootstrapGenerateDelete = $bootstrapGenerateDelete;
    }
}