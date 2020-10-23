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
        $this->table->addColumn($column, 'integer', array_merge([
            'limit'    => MysqlAdapter::INT_REGULAR,
            'identity' => false,
            'null'     => false,
            'signed'   => false,
            'comment'  => '时间',
            'default'  => 0,
        ], $options));

        return $this;
    }

    /**
     * 创建时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addCreatedAtColumn(string $column = 'created_at', array $options = []) : Migration
    {
        return $this->addDateTimeColumn($column, array_merge([
            'comment' => '创建时间',
        ], $options));
    }

    /**
     * 最近更新时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addUpdatedAtColumn(string $column = 'updated_at', array $options = []) : Migration
    {
        return $this->addDateTimeColumn($column, array_merge([
            'comment' => '更新时间',
        ], $options));
    }

    /**
     * 删除时间字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addDeletedAtColumn(string $column = 'deleted_at', array $options = []) : Migration
    {
        return $this->addDateTimeColumn($column, array_merge([
            'comment' => '删除时间',
        ], $options));
    }
}
