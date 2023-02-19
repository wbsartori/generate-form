<?php

namespace WBGenerateForm\Source\Core\Laravel;

use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateCrud;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateEdit;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateList;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateNew;

class RedirectLaravel
{
    /**
     * @var LaravelGenerateCrud
     */
    private LaravelGenerateCrud $laravelGenerateCrud;
    /**
     * @var LaravelGenerateList
     */
    private LaravelGenerateList $laravelGenerateList;
    /**
     * @var LaravelGenerateNew
     */
    private LaravelGenerateNew $laravelGenerateNew;
    /**
     * @var LaravelGenerateEdit
     */
    private LaravelGenerateEdit $laravelGenerateEdit;

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
                $this->laravelGenerateCrud->generate($commands);
                break;
            case $typeAction === 'list':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates list wait!\e[0m\n";
                $this->laravelGenerateList->generate($commands);
                break;
            case $typeAction === 'new':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates new wait!\e[0m\n";
                $this->laravelGenerateNew->generate($commands);
                break;
            case $typeAction === 'edit':
                echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mGenerating templates edit wait!\e[0m\n";
                $this->laravelGenerateEdit->generate($commands);
                break;
            default:
                echo "\e[1;31;41mERROR: Command \e[1m" . $typeAction . "\e[1;31;41m not found in commands list!\e[0m\n";
                break;
        }
    }

    /**
     * @param LaravelGenerateCrud $laravelGenerateCrud
     */
    public function setLaravelGenerateCrud(LaravelGenerateCrud $laravelGenerateCrud): void
    {
        $this->laravelGenerateCrud = $laravelGenerateCrud;
    }

    /**
     * @param LaravelGenerateList $laravelGenerateList
     */
    public function setLaravelGenerateList(LaravelGenerateList $laravelGenerateList): void
    {
        $this->laravelGenerateList = $laravelGenerateList;
    }

    /**
     * @param LaravelGenerateNew $laravelGenerateNew
     */
    public function setLaravelGenerateNew(LaravelGenerateNew $laravelGenerateNew): void
    {
        $this->laravelGenerateNew = $laravelGenerateNew;
    }

    /**
     * @param LaravelGenerateEdit $laravelGenerateEdit
     */
    public function setLaravelGenerateEdit(LaravelGenerateEdit $laravelGenerateEdit): void
    {
        $this->laravelGenerateEdit = $laravelGenerateEdit;
    }
}