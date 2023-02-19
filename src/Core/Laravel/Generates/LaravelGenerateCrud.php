<?php

namespace WBGenerateForm\Source\Core\Laravel\Generates;

class LaravelGenerateCrud
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
        $this->generateForm($commands);
        sleep(2);
        echo "\e[1;37;42mSUCCESS:\e[1m" . ' ' . "\e[1;37;37mSuccessfully generated templates crud!\e[0m\n";
    }

    public function generateList(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Laravel\index.blade.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "index.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateNew(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Laravel\new.blade.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_new.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateEdit(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Laravel\edit.blade.php';
        $file = file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_edit.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }

    public function generateForm(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = BASE_ROOT . 'src\Core\Forms\Laravel\_form.blade.php';
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
