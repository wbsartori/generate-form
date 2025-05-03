<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core\Laravel;

use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateCrud;

class RedirectLaravel
{
    /**
     * @var LaravelGenerateCrud
     */
    private LaravelGenerateCrud $laravelGenerateCrud;

    /**
     * @param string $typeAction
     * @param array $commands
     * @return void
     */
    public function getTypeGenerate(string $typeAction, array $commands)
    {
        switch ($typeAction) {
            case $typeAction === 'crud':
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates crud wait!\e[0m\n";
                $this->laravelGenerateCrud->generateAll($commands);
                break;
            case $typeAction === 'list':
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates list wait!\e[0m\n";
                $this->laravelGenerateCrud->generateList($commands);
                break;
            case $typeAction === 'new':
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates new wait!\e[0m\n";
                $this->laravelGenerateCrud->generateNew($commands);
                break;
            case $typeAction === 'edit':
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates edit wait!\e[0m\n";
                $this->laravelGenerateCrud->generateEdit($commands);
                break;
            case $typeAction === 'delete':
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates delete wait!\e[0m\n";
                $this->laravelGenerateCrud->generateDelete($commands);
                break;
            case $typeAction === 'form':
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates form wait!\e[0m\n";
                $this->laravelGenerateCrud->generateForm($commands);
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
}