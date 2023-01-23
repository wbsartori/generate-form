<?php

namespace WBGenerateForm\Source\Core\Bootstrap\Generates;

use WBGenerateForm\Source\Config\Config;

class BootstrapGenerateCrud
{
    /**
     * @param array $commands
     * @return void
     */
    public function generate(array $commands)
    {
        $this->generateList($commands);
        $this->generateNew($commands);
        $this->generateEdit($commands);
        $this->generateDelete($commands);
    }

    public function generateList(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\index.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_list.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateNew(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\new.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_new.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateEdit(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\edit.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_edit.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateDelete(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\delete.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_delete.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    /**
     * @param string $path
     * @return string
     */
    public function verifyExistsDirectoryOrCreate(string $path): string
    {
        $pathAbsolute = Config::BASE_ROOT . 'templates' . DIRECTORY_SEPARATOR . str_replace('/', '\\', $path);

        if (!is_dir($pathAbsolute)) {
            mkdir($pathAbsolute);
            return $pathAbsolute;
        }

        return $pathAbsolute;
    }
}
