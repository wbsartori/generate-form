<?php

namespace WBGenerateForm\Source\Core\Bootstrap\Generates;

use Exception;
use WBGenerateForm\Source\Core\IGenerateForms;

class BootstrapGenerateCrud implements IGenerateForms
{

    private const INPUT_TYPES = [
        'text',
        'password',
        'email',
        'number',
        'tel',
        'url',
        'search',
        'date',
        'time',
        'datetime-local',
        'month',
        'week',
        'checkbox',
        'radio',
        'range',
        'color',
        'file',
        'hidden',
        'submit',
        'reset',
        'button',
        'image',
    ];

    public function generateAll(array $commands): string
    {
        $response = '';
        try {
            $response .= $this->generateList($commands);
            $response .= $this->generateNew($commands);
            $response .= $this->generateEdit($commands);
            $response .= $this->generateForm($commands);
            $response .= $this->generateFields($commands);

            if (!strlen($response) > 0) {
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
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Bootstrap/Generates/Stubs' . DIRECTORY_SEPARATOR . 'index.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "index.blade.php";
            if (file_exists($pathTemplate)) {
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
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Bootstrap/Generates/Stubs' . DIRECTORY_SEPARATOR . 'new.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "new.blade.php";
            if (!file_exists($pathTemplate)) {
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
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Bootstrap/Generates/Stubs' . DIRECTORY_SEPARATOR . 'edit.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "edit.blade.php";
            if (!file_exists($pathTemplate)) {
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
            $template = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Bootstrap/Generates/Stubs' . DIRECTORY_SEPARATOR . '_form.stub';
            $file = file_get_contents($template);
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "_form.blade.php";
            if (!file_exists($pathTemplate)) {
                $fileData = fopen($pathTemplate, "w") or die("Unable to open file!");
                fwrite($fileData, $file);
                fclose($fileData);
                if(isset($commands['fields'])) {
                    $this->addFields($commands['fields'], $folder);
                }
                sleep(2);
                return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template form with success!\e[0m\n";
            } else if(file_exists($pathTemplate) && isset($commands['fields'])) {
                $this->addFields($commands['fields'], $folder);
                return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template form with success!\e[0m\n";
            }
            throw new Exception("\e[1;33;41mERROR: \e[1m file already exists \e[0m\n");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template form with success!\e[0m\n";
    }

    public function generateFields(array $commands): string
    {
        try {
            $folder = $this->verifyExistsDirectoryOrCreate($commands['name']);
            $this->addFields($commands['fields'], $folder);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        sleep(2);
        return "\e[1;30;42mSUCCESS:\e[1m" . ' ' . "\e[1;30;30mGenerating template form with success!\e[0m\n";
    }

    public function addFields(string $fields, string $folder): string
    {
        try {
            $pathTemplate = $folder . DIRECTORY_SEPARATOR . "_form.blade.php";
            $arrayFields = explode(',', $fields);
            foreach ($arrayFields as $field) {
                $name = explode(':', $field)[0];
                $type = explode(':', $field)[1];
                if(in_array($type, self::INPUT_TYPES)) {
                    file_put_contents($pathTemplate, "<input type='".$type."' id='".$name."' name='".$name."'>" . PHP_EOL, FILE_APPEND);
                }
            }
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
     * @param string $templateName
     * @return string
     */
    public function verifyExistsDirectoryOrCreate(string $templateName = ''): string
    {
        try {
            $directoryViewsName = $_ENV['DIRECTORY_VIEWS_NAME'];
            if ($templateName !== '') {
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
