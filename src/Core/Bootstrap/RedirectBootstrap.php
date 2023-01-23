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
     * @var BootstrapGenerateList
     */
    private BootstrapGenerateList $bootstrapGenerateList;
    /**
     * @var BootstrapGenerateNew
     */
    private BootstrapGenerateNew $bootstrapGenerateNew;
    /**
     * @var BootstrapGenerateEdit
     */
    private BootstrapGenerateEdit $bootstrapGenerateEdit;
    /**
     * @var BootstrapGenerateDelete
     */
    private BootstrapGenerateDelete $bootstrapGenerateDelete;

    public function __construct()
    {
        $this->bootstrapGenerateCrud = new BootstrapGenerateCrud();
        $this->bootstrapGenerateList = new BootstrapGenerateList();
        $this->bootstrapGenerateNew = new BootstrapGenerateNew();
        $this->bootstrapGenerateEdit = new BootstrapGenerateEdit();
        $this->bootstrapGenerateDelete = new BootstrapGenerateDelete();
    }

    public function getTypeGenerate(string $typeAction, array $commands)
    {
        switch ($typeAction) {
            case $typeAction === 'crud':
                $this->bootstrapGenerateCrud->generate($commands);
                break;
            case $typeAction === 'list':
                $this->bootstrapGenerateList->generate($commands);
                break;
            case $typeAction === 'new':
                $this->bootstrapGenerateNew->generate($commands);
                break;
            case $typeAction === 'edit':
                $this->bootstrapGenerateEdit->generate($commands);
                break;
            case $typeAction === 'delete':
                $this->bootstrapGenerateDelete->generate($commands);
                break;
            default:
                sprintf('Command  %s not found', $typeAction);
        }
    }
}