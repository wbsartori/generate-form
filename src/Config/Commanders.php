<?php
namespace WBGenerateForm\Source\Config;
class Commanders
{
    public const SHORT = '';

    public const LONG_OPTIONS = [
        'create-template-crud',
        'create-template-new',
        'create-template-edit',
        'create-template-delete',
        'create-template-list',
        'update-template-add',
        'name::',
        'path::',
        'type:',
        'extension:',
        'fields::',
        'fieldsAdd:'
    ];

    public const COMMAND_OPTIONS = [
        'create-template-crud' => 'create-template-crud',
        'create-template-new' => 'create-template-new',
        'create-template-edit' => 'create-template-edit',
        'create-template-delete' => 'create-template-delete',
        'create-template-list' => 'create-template-list',
        'update-template-add' => 'create-template-add',
    ];
}