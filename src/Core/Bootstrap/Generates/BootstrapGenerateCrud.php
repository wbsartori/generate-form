<?php

namespace WBGenerateForm\Source\Core\Bootstrap\Generates;

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
        $this->generateForm($commands);
        sleep(2);
        echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mSuccessfully generated templates crud!\e[0m\n";
    }

    public function generateList(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Bootstrap\index.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "index.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateNew(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Bootstrap\new.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_new.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateEdit(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Bootstrap\edit.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_edit.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateDelete(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Bootstrap\delete.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_delete.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateForm(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Bootstrap\_form.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_form.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    /**
     * @param string $path
     * @return string
     */
    public function verifyExistsDirectoryOrCreate(string $path): string
    {
        $pathAbsolute = BASE_ROOT . 'templates' . DIRECTORY_SEPARATOR . str_replace('/', '\\', $path);

        if (!is_dir($pathAbsolute)) {
            mkdir($pathAbsolute);
            return $pathAbsolute;
        }

        return $pathAbsolute;
    }
}
