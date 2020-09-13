<?php
declare(strict_types=1);

namespace isadmin\migration;

use Phinx\Config\Config;
use think\App;

/**
 * Trait PhinxConfig
 * @package isadmin\migration
 */
trait PhinxConfigBridge
{
    protected $adapters = ['mysql', 'pgsql', 'sqlite', 'sqlsrv'];

    /**
     * Parse the config file and load it into the config object
     *
     * @param App $app
     * @return Config
     */
    protected function loadConfig(App $app)
    {
        $migration = $app->config->get('migration', []);
        $config = new Config($migration, $app->getConfigPath() . 'migration.php');

        $db           = app()->db;
        $name         = $db->getConfig('default', 'mysql');
        $environments = $config['environments'];
        if (!isset($environments['default_database'])) {
            $environments['default_database'] = $name;
        }
        foreach ($db->getConfig('connections', []) as $name => $connection) {
            if (isset($environments[$name])) {
                continue;
            }
            if (in_array($connection['type'], $this->adapters)) {
                $adapter = $connection['type'];
            } elseif (isset($migration['adapter_mapping'])
                && is_array($migration['adapter_mapping'])
                && isset($migration['adapter_mapping'][$connection['type']])
            ) {
                $adapter = $migration['adapter_mapping'][$connection['type']];
            }
            if (isset($adapter)) {
                $environments[$name] = [
                    'adapter'      => $adapter,
                    'host'         => $connection['hostname'],
                    'name'         => $connection['database'],
                    'user'         => $connection['username'],
                    'pass'         => $connection['password'],
                    'port'         => $connection['hostport'],
                    'charset'      => $connection['charset'],
                    // 'collation'    => 'utf8_unicode_ci',
                    'table_prefix' => $connection['prefix'],
                ];
            } else {
                $environments[$name] = [
                    'connection' => $db->connect($name)->getConnection()->connect(),
                    'name' => $connection['database'],
                    'table_prefix' => $connection['prefix'],
                ];
            }
        }
        $config['environments'] = $environments;
        return $config;
    }
}
