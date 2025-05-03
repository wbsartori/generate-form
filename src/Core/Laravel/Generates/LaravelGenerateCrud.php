<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core\Laravel\Generates;

use Exception;
use WBGenerateForm\Source\Core\IGenerateForms;

class LaravelGenerateCrud implements IGenerateForms
{

    public function generateAll(array $commands)
    {
        try {
            $this->generateList($commands);
            $this->generateNew($commands);
            $this->generateEdit($commands);
            $this->generateForm($commands);
            sleep(2);
            echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mSuccessfully generated templates crud!\e[0m\n";
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function generateList(array $commands)
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . 'index.stub';
            $file = file_get_contents($template);
            $fileData = fopen($folder . DIRECTORY_SEPARATOR . "index.blade.php", "w") or die("Unable to open file!");
            fwrite($fileData, $file);
            fclose($fileData);
            echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template index with success!\e[0m\n";
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function generateNew(array $commands)
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . 'new.stub';
            $file = file_get_contents($template);
            $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_new.blade.php", "w") or die("Unable to open file!");
            fwrite($fileData, $file);
            fclose($fileData);
            echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template new with success!\e[0m\n";
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function generateEdit(array $commands)
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . 'edit.stub';
            $file = file_get_contents($template);
            $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_edit.blade.php", "w") or die("Unable to open file!");
            fwrite($fileData, $file);
            fclose($fileData);
            echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template edit with success!\e[0m\n";
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }
    }

    public function generateForm(array $commands)
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Laravel/Generates/Stubs' . DIRECTORY_SEPARATOR . '_form.stub';
            $file = file_get_contents($template);
            $fileData = fopen($folder . DIRECTORY_SEPARATOR . "_form.blade.php", "w") or die("Unable to open file!");
            fwrite($fileData, $file);
            fclose($fileData);
            echo "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template form with success!\e[0m\n";
        } catch (Exception $exception) {
            echo "\e[1;31;41mERROR: LaravelGenerateCurd \e[1m" . $exception->getMessage() . "\e[0m\n";
        }
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
    }
}
