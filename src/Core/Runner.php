<?php

namespace WBGenerateForm\Source\Core;

use WBGenerateForm\Source\Config\Commanders;
use WBGenerateForm\Source\Config\Config;

class Runner
{
    /** @var string */
    private string $short;
    /** @var array */
    private array $longOptions;
    /** @var array */
    private array $options;
    /** @var Redirect */
    private Redirect $redirect;

    public function __construct()
    {
        $this->redirect = new Redirect();
    }

    /**
     * @return void
     */
    public function run(array $argv)
    {
        $this->setShort( Commanders::SHORT);
        $this->setLongOptions(Commanders::LONG_OPTIONS);
        $this->setOptions();

        if(!in_array(str_replace('--', '', $argv[1]),  Commanders::COMMAND_OPTIONS)){
            echo 'Command ' . $argv[1] . ' not found in commands list!';
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
}
