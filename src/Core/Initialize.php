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
     * @return void
     */
    public function run(array $argv)
    {
        $this->setShort( Commanders::SHORT);
        $this->setLongOptions(Commanders::LONG_OPTIONS);
        $this->setOptions();

        if(!in_array(str_replace('--', '', $argv[1]),  Commanders::COMMAND_OPTIONS)){
            echo "\e[1;30;42mERROR: Command \e[1m" . $argv[1] . "\e[1;30;42m not found in commands list!\e[0m\n";
            echo "\e[1;30;42mWARNING: to know the possible commands type 'php generate --help'!\e[0m\n";
            exit;
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
