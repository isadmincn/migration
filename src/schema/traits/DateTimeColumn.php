<?php
namespace isadmin\migration\schema\traits;

use Phinx\Db\Adapter\MysqlAdapter;
use isadmin\migration\schema\Migration;

trait DateTimeColumn
{
    /**
     * 添加时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addDateTimeColumn(string $column, array $options = []) : Migration
    {
        $type = config('migration.datetime.type') ?? 'datetime';
        switch ($type) {
            case 'integer':
            case 'int':
                $this->table->addColumn($column, 'integer', array_merge([
                    'limit'    => MysqlAdapter::INT_REGULAR,
                    'identity' => false,
                    'null'     => false,
                    'signed'   => false,
                    'comment'  => '时间',
                    'default'  => 0,
                ], $options));
                break;
            case 'datetime':
            case 'date':
            case 'timestamp':
                $this->table->addColumn($column, $type, array_merge([
                    'null' => false,
                ]));
                break;
            default:
                throw new \isadmin\base\BaseException('时间字段类型错误', 0);
        }

        return $this;
    }

    /**
     * 创建时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addCreatedAtColumn(string $column = '', array $options = []) : Migration
    {
        $type = config('migration.datetime.type') ?? 'datetime';
        $column = $column ?? (config('migration.datetime.create_time') ?? 'created_at');
        switch ($type) {
            case 'integer':
            case 'int':
                return $this->addDateTimeColumn($column, array_merge([
                    'comment' => '创建时间',
                ], $options));
                break;
            case 'datetime':
            case 'date':
            case 'timestamp':
                return $this->addDateTimeColumn($column, array_merge([
                    'default' => 'CURRENT_TIMESTAMP',
                    'comment' => '创建时间',
                ], $options));
            default:
                throw new \isadmin\base\BaseException('时间字段类型错误', 0);
        }
    }

    /**
     * 最近更新时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addUpdatedAtColumn(string $column = '', array $options = []) : Migration
    {
        $type = config('migration.datetime.type') ?? 'datetime';
        $column = $column ?? (config('migration.datetime.update_time') ?? 'updated_at');
        switch ($type) {
            case 'integer':
            case 'int':
                return $this->addDateTimeColumn($column, array_merge([
                    'comment' => '更新时间',
                ], $options));
                break;
            case 'datetime':
            case 'date':
            case 'timestamp':
                return $this->addDateTimeColumn($column, array_merge([
                    'default' => 'CURRENT_TIMESTAMP',
                    'update'  => 'CURRENT_TIMESTAMP',
                    'comment' => '创建时间',
                ], $options));
            default:
                throw new \isadmin\base\BaseException('时间字段类型错误', 0);
        }
    }

    /**
     * 删除时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addDeletedAtColumn(string $column = '', array $options = []) : Migration
    {
        $type = config('migration.datetime.type') ?? 'datetime';
        $column = $column ?? (config('migration.datetime.delete_time') ?? 'deleted_at');
        switch ($type) {
            case 'integer':
            case 'int':
                return $this->addDateTimeColumn($column, array_merge([
                    'comment' => '删除时间',
                ], $options));
                break;
            case 'datetime':
            case 'date':
            case 'timestamp':
                return $this->addDateTimeColumn($column, array_merge([
                    'default' => null,
                    'null'    => true,
                    'comment' => '删除时间',
                ], $options));
            default:
                throw new \isadmin\base\BaseException('时间字段类型错误', 0);
        }
    }
}
