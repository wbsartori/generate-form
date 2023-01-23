<?php

namespace WBGenerateForm\Source\Core\Bootstrap\Generates;

use WBGenerateForm\Source\Config\Config;

class BootstrapGenerateCrud
{
    public function generate(array $commands) {
        $this->generateList($commands);
        $this->generateNew($commands);
        $this->generateEdit($commands);
        $this->generateDelete($commands);
    }

    public function generateList(array $commands)
    {
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\index.php';
        $file =file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_list.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }
    public function generateNew(array $commands){
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\new.php';
        $file =file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_new.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }
    public function generateEdit(array $commands){
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\edit.php';
        $file =file_get_contents($template);
        $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_edit.php", "w") or die("Unable to open file!");
        fwrite($fileData, $file);
        fclose($fileData);
    }
    public function generateDelete(array $commands){
        $folder = $this->verifyExistsDirectoryOrCreate($commands['path']);
        $template = Config::BASE_ROOT . 'src\Core\Forms\Bootstrap\delete.php';
        $file =file_get_contents($template);
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
        $folders = [];
        $newFolders = [];
        $directory = '';
        $pathAbsolute = Config::BASE_ROOT . str_replace('/', '\\', $path);

        if(strpos( $path, '/'))
        {
            $folders = explode('/',$path);
        }
        else {
            $folders = Config::BASE_ROOT . str_replace('/', '\\', $path);
        }

        foreach ($folders as $key => $folder)
        {
            if($key > 0 && $key < count($folders))
            {
                $newFolders[] = Config::BASE_ROOT . $folders[0] . DIRECTORY_SEPARATOR . $folders[$key];
            }
            else {
                $newFolders[] = Config::BASE_ROOT . $folder;
            }
        }

        foreach ($newFolders as $nFolder)
        {
            if(!is_dir($nFolder)){
                mkdir($nFolder);
                return $directory;
            }
        }
    }
}