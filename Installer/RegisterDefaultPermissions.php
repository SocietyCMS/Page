<?php

namespace Modules\Page\Installer;

class RegisterDefaultPermissions
{

    public $defaultPermissions = [
        
        'manage-page' => [
            'display_name' => 'page::module-permissions.manage-page.display_name',
            'description'  => 'page::module-permissions.manage-page.description',
        ],

    ];
}