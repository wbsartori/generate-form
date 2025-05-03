<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core;
class Commanders
{
    public const SHORT = '';

    public const LONG_OPTIONS = [
        'create-template-crud',
        'create-template-new',
        'create-template-edit',
        'create-template-delete',
        'create-template-list',
        'create-template-form',
        'update-template-add',
        'name::',
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
        'create-template-form' => 'create-template-form',
        'update-template-add' => 'create-template-add',
    ];
}