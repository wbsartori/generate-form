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
     * @throws \Exception
     */
    public function getTypeGenerate(string $typeAction, array $commands)
    {
        switch ($typeAction) {
            case $typeAction === 'crud' && isset($commands['name']) && isset($commands['fields']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates crud wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateAll($commands);
                break;
            case $typeAction === 'list' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates list wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateList($commands);
                break;
            case $typeAction === 'new' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates new wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateNew($commands);
                break;
            case $typeAction === 'edit' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates edit wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateEdit($commands);
                break;
            case $typeAction === 'delete' && isset($commands['name']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates delete wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateDelete($commands);
            case $typeAction === 'form' && isset($commands['name']) && isset($commands['fields']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating templates form wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateForm($commands);
                break;
            case $typeAction === 'add-fields' && isset($commands['name']) && isset($commands['fields']):
                echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating fields to form wait!\e[0m\n";
                echo $this->laravelGenerateCrud->generateFields($commands);
                break;
            default:
                echo "\e[1;31;41mERROR: Command not found in commands list or parameters not declared\e[0m\n";
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