<?php

return [
    // 自定义的Migration类
    'migration_base_class' => isadmin\migration\schema\Migration::class,
    // 自定义的seed类
    'seed_base_class' => isadmin\migration\schema\Seed::class,
    // 适配器映射
    'adapter_mapping' => [],
    // 生成路径
    'paths' => [
        'migrations' => [
            'database/migrations',
        ],
        'seeds' => [
            'database/seeds',
        ],
    ],
    // migration环境配置
    // 该处只定义日志表，环境配置复用thinkphp的数据库配置
    'environments' => [
        'default_migration_table' => 'migration_log',
    ],
    'version_order' => 'creation'
];
