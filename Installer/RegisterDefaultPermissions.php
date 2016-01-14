<?php

namespace Modules\Page\Installer;

class RegisterDefaultPermissions
{

    public $defaultPermissions = [

        'manage-page' => [
            'display_name' => 'Manage all Pages',
            'description' => 'Users with this Permission can create, edit and delete all Pages.'
        ],

    ];
}