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
                return $this->bootstrapGenerateCrud->generate($commands);
            case $typeAction === 'list':
                return $this->bootstrapGenerateList->generate();
            case $typeAction === 'new':
                return $this->bootstrapGenerateNew->generate();
            case $typeAction === 'edit':
                return $this->bootstrapGenerateEdit->generate();
            case $typeAction === 'delete':
                return $this->bootstrapGenerateDelete->generate();

            default:
                print_r('Command not found');
        }
    }
}