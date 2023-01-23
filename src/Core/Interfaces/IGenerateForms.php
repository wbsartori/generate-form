<?php

namespace WBGenerateForm\Source\Core\Interfaces;

interface IGenerateForms
{
    public function generateList(array $commands);
    public function generateNew(array $commands);
    public function generateEdit(array $commands);
    public function generateDelete(array $commands);
}