<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core\Laravel\Generates;

use Exception;
use WBGenerateForm\Source\Core\IGenerateForms;

class LaravelGenerateCrud implements IGenerateForms
{

    public function generateAll(array $commands): string
    {
        $response = '';
        try {
            $response .= $this->generateList($commands);
            $response .= $this->generateNew($commands);
            $response .= $this->generateEdit($commands);
            $response .= $this->generateForm($commands);
            if(!strlen($response) > 0) {
                throw new Exception("\e[1;33;41mERROR: \e[1m Ocorruded a error in created crud \e[0m\n");
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mSuccessfully generated templates crud!\e[0m\n";
    }

    public function generateList(array $commands)
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . 'index.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "index.blade.php";
            if(file_exists($pathTemplate)) {
                throw new Exception("\e[1;33;41mERROR: \e[1m file already exists \e[0m\n");
            }
            $fileData = fopen($folder . DIRECTORY_SEPARATOR . "index.blade.php", "w") or die("Unable to open file!");
            fwrite($fileData, $file);
            fclose($fileData);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template index with success!\e[0m\n";
    }

    public function generateNew(array $commands): string
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . 'new.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "new.blade.php";
            if(!file_exists($pathTemplate)) {
                $fileData = fopen($folder . DIRECTORY_SEPARATOR . "new.blade.php", "w") or die("Unable to open file!");
                fwrite($fileData, $file);
                fclose($fileData);
            }
            throw new Exception("\e[1;33;41mERROR: \e[1m file already exists \e[0m\n");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template new with success!\e[0m\n";
    }

    public function generateEdit(array $commands): string
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . 'edit.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "edit.blade.php";
            if(!file_exists($pathTemplate)) {
                $fileData = fopen($folder . DIRECTORY_SEPARATOR . "edit.blade.php", "w") or die("Unable to open file!");
                fwrite($fileData, $file);
                fclose($fileData);
            }
            throw new Exception("\e[1;33;41mERROR: \e[1m file already exists \e[0m\n");
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template edit with success!\e[0m\n";
    }

    public function generateForm(array $commands)
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . '_form.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "_form.blade.php";
            if(!file_exists($pathTemplate)) {
                $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_form.blade.php", "w") or die("Unable to open file!");
                fwrite($fileData, $file);
                fclose($fileData);
            }
            throw new Exception("\e[1;33;41mERROR: \e[1m file already exists \e[0m\n");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template form with success!\e[0m\n";
    }

    public function generateDelete(array $commands)
    {
        throw new Exception("\e[1;30;33mWARNING:\e[1m" . ' ' . "\e[1;30;33mthis command is not generate template DELETE!\e[0m\n");
    }

    /**
     * @param string$templateName
     * @return string
     */
    public function verifyExistsDirectoryOrCreate(string $templateName = ''): string
    {
        try {
            $directoryViewsName = $_ENV['DIRECTORY_VIEWS_NAME'];
            if($templateName !== '') {
                $directoryViewsName = $_ENV['DIRECTORY_VIEWS_NAME'] . DIRECTORY_SEPARATOR . $templateName;
            }
            $folder = dirname(__DIR__, 5)
                . DIRECTORY_SEPARATOR
                . $directoryViewsName;
            $pathAbsolute = realpath($folder);
            if (!$pathAbsolute) {
                mkdir($folder, 0775, true);
                return $folder;
            }
            return $pathAbsolute;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        return '';
    }
}
