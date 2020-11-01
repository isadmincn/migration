# isadmin/migration
安装
```
composer require isadmin/migration
```

安装完毕之后，在项目config目录中会出现一个migration.php，该文件为该扩展的配置文件   

## 配置
默认配置文件
```php
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
        'limit' => Phinx\Db\Adapter\MysqlAdapter::INT_REGULAR,
    ],
    // 时间字段配置
    'datetime' => [
        'type' => 'datetime',
        'create_time' => 'created_at',
        'update_time' => 'updated_at',
        'delete_time' => 'deleted_at',
    ],
];
```
其中connection需要设置为具体用于数据迁移的数据库配置的名称

## 注意事项
该库依赖于phinx库，而phinx依赖于cakephp框架内核。但是cakephp和thinkphp v6在部分全局函数存在冲突。为了避免冲突，需要在thinkphp v6的应用框架的入口文件中，在加载vendor/autoload.php之前就加载thinkphp v6的全局方法定义文件。
### public/index.php
```php
<?php
namespace think;

// 提前加载该文件是为避免thinkphp和cakephp全局函数冲突
require __DIR__ . '/../vendor/topthink/framework/src/helper.php';

require __DIR__ . '/../vendor/autoload.php';
$http = (new App())->http;
$response = $http->run();
$response->send();
$http->end($response);
```
### think命令入口
```php
#!/usr/bin/env php
<?php
namespace think;

// 提前加载该文件是为避免thinkphp和cakephp全局函数冲突
require __DIR__ . '/vendor/topthink/framework/src/helper.php';

require __DIR__ . '/vendor/autoload.php';

(new App())->console->run();
```
