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
        // 默认migration记录表
        'default_migration_table' => '_phinxlog',
    ],
    'version_order' => 'creation',
    // 默认使用的数据库连接配置
    // 具体参看config/database.php的connections配置信息的key
    'connection' => 'mysql',
    // 默认主键配置
    'primary_key' => [
        'limit' => Phinx\Db\Adapter\MysqlAdapter::INT_BIG,
    ],
];
