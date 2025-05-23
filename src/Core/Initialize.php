<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core;

class Initialize
{
    /** @var string */
    private string $short;
    /** @var array */
    private array $longOptions;
    /** @var array */
    private array $options;
    /**
     * @var Redirect
     */
    private Redirect $redirect;

    /**
     * @param array $argv
     * @return string|void
     * @throws \Exception
     */
    public function run(array $argv)
    {
        $this->setShort( Commanders::SHORT);
        $this->setLongOptions(Commanders::LONG_OPTIONS);
        $this->setOptions();

        $commandOptions = str_replace('--', '', $argv[1]);
        if($commandOptions === 'help') {
            echo PHP_EOL;
            echo "\e[1;30;43m\e[1m COMMANDERS \e[1;30;41m\e[0m" . PHP_EOL;
            foreach (Commanders::COMMAND_OPTIONS as $COMMAND_OPTION) {
                echo "\e[1;30;43m\e[1m" . $COMMAND_OPTION . "\e[1;30;41m\e[0m" . PHP_EOL;
            }
            echo PHP_EOL;
            echo "\e[1;30;43m\e[1m PARAMETERS \e[1;30;41m\e[0m" . PHP_EOL;
            foreach (Commanders::PARAMETERS_OPTIONS as $PARAMETERS_OPTION) {
                echo "\e[1;30;43m\e[1m --" . $PARAMETERS_OPTION . "\e[1;30;41m\e[0m" . PHP_EOL;
            }
            echo PHP_EOL;
            return '';
        }
        if(count($argv) <= 2){
            return "\e[1;30;41mERROR: Command \e[1m" . $argv[1] . "\e[1;30;41m not found parameters!\e[0m\n";
        }
        if(!array_key_exists($commandOptions,  Commanders::COMMAND_OPTIONS)){
            return "\e[1;30;41mERROR: Command \e[1m" . $argv[1] . "\e[1;30;41m not found in commands list!\e[0m\n";
        }

        $this->redirect->validateOptions($this->getOptions());
    }

    /**
     * @return string
     */
    public function getShort(): string
    {
        return $this->short;
    }

    /**
     * @param string $short
     */
    public function setShort(string $short): void
    {
        $this->short = $short;
    }

    /**
     * @return array
     */
    public function getLongOptions(): array
    {
        return $this->longOptions;
    }

    /**
     * @param array $longOptions
     */
    public function setLongOptions(array $longOptions): void
    {
        $this->longOptions = $longOptions;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return void
     */
    public function setOptions(): void
    {
        $this->options = getopt($this->getShort(), $this->getLongOptions());
    }

    /**
     * @param Redirect $redirect
     */
    public function setRedirect(Redirect $redirect): void
    {
        $this->redirect = $redirect;
    }
}
