<?php

return [
    'migration_base_class' => isadmin\migration\schema\Migration::class,
    'seed_base_class' => isadmin\migration\schema\Seed::class,
    'adapter_mapping' => [],
    'paths' => [
        'migrations' => [
            'database/migrations',
        ],
        'seeds' => [
            'database/seeds',
        ],
    ],
    'environments' => [
        'default_migration_table' => '_phinxlog',
    ],
    'version_order' => 'creation'
];
