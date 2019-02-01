<?php

use Modules\Media\Controller\ApiController;
use Modules\Media\Models\PermissionState;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^.*/api/media/collection.*$' => [
        [
            'dest' => '\Modules\Media\Controller\ApiController:apiCollectionCreate',
            'verb' => RouteVerb::SET,
            'permission' => [
                'module' => ApiController::MODULE_NAME,
                'type'  => PermissionType::CREATE,
                'state' => PermissionState::COLLECTION,
            ],
        ],
    ],
    '^.*/api/media$' => [
        [
            'dest' => '\Modules\Media\Controller\ApiController:apiMediaUpload',
            'verb' => RouteVerb::SET,
            'permission' => [
                'module' => ApiController::MODULE_NAME,
                'type'  => PermissionType::CREATE,
                'state' => PermissionState::MEDIA,
            ],
        ],
    ],
    '^.*/api/media/create.*$' => [
        [
            'dest' => '\Modules\Media\Controller\ApiController:apiMediaCreate',
            'verb' => RouteVerb::SET,
            'permission' => [
                'module' => ApiController::MODULE_NAME,
                'type'  => PermissionType::CREATE,
                'state' => PermissionState::MEDIA,
            ],
        ],
    ],
    // todo: the order of find is bad but needed for now.
    '^.*/api/media/find.*$' => [
        [
            'dest' => '\Modules\Media\Controller\ApiController:apiMediaFind',
            'verb' => RouteVerb::GET,
            'permission' => [
                'module' => ApiController::MODULE_NAME,
                'type'  => PermissionType::READ,
                'state' => PermissionState::MEDIA,
            ],
        ],
    ],
];
