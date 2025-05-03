<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core;

interface IGenerateForms
{
    public function generateList(array $commands);
    public function generateNew(array $commands);
    public function generateEdit(array $commands);
    public function generateDelete(array $commands);
    public function generateForm(array $commands);
}
