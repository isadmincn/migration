<?php
namespace isadmin\migration\schema\traits;

use Phinx\Db\Adapter\MysqlAdapter;
use isadmin\migration\schema\Migration;

trait IntegerColumn
{
    /**
     * 增加一个整型字段
     *
     * @param string $column  字段名
     * @param array $options  选项
     * @return Migration
     */
    public function addIntegerColumn(string $column, array $options = []) : Migration
    {
        $this->table->addColumn($column, 'integer', array_merge([
            'limit'    => MysqlAdapter::INT_REGULAR,
            'identity' => false,
            'null'     => false,
            'signed'   => false,
            'comment'  => '',
            'default'  => isset($options['default']) ? intval($options['default']) : null,
        ], $options));

        return $this;
    }

    /**
     * 增加一个主键字段
     *
     * @param string $column  字段名
     * @param array $options  选项
     * @return Migration
     */
    public function addPrimaryIdColumn(string $column, array $options = []) : Migration
    {
        return $this->addIntegerColumn($column, array_merge([
            'default'  => null,
            'signed'   => false,
            'identity' => true,
        ], $options));
    }

    /**
     * 添加一个外键字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addForeignIdColumn(string $column, array $options = []) : Migration
    {
        return $this->addIntegerColumn($column, array_merge([
            'comment' => '父id',
            'default' => 0,
        ], $options));
    }

    /**
     * 添加排序字段
     *
     * @param array $options
     * @return Migration
     */
    public function addSortColumn(string $column = 'sort', array $options = []) : Migration
    {
        return $this->addIntegerColumn($column, array_merge([
            'comment' => '排序，越大优先级越高',
            'default' => 0,
        ], $options));
    }

    /**
     * 添加排序字段
     *
     * @param array $options
     * @return Migration
     */
    public function addRankColumn(string $column = 'sort', array $options = []) : Migration
    {
        return $this->addSortColumn($column, $options);
    }

    /**
     * 增加一个使用整数表达的枚举类型字段
     * 例如：表达状态、类型等字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addEnumTypeColumn(string $column, array $options = []) : Migration
    {
        return $this->addIntegerColumn($column, array_merge([
            'limit'   => MysqlAdapter::INT_TINY,
            'default' => 0,
        ], $options));
    }

    /**
     * 添加状态字段
     *
     * @param array $options
     * @return Migration
     */
    public function addStateColumn(string $column = 'state', array $options = []) : Migration
    {
        return $this->addEnumTypeColumn($column, array_merge([
            'comment' => '状态，0不可用 1可用',
            'default' => 1,
        ], $options));
    }

    /**
     * 添加状态字段
     *
     * @param array $options
     * @return Migration
     */
    public function addStatusColumn(string $column = 'state', array $options = []) : Migration
    {
        return $this->addStateColumn($column, $options);
    }

    /**
     * 添加性别字段
     *
     * @param array $options
     * @return Migration
     */
    public function addGenderColumn(string $column = 'gender', array $options = []) : Migration
    {
        return $this->addEnumTypeColumn($column, array_merge([
            'comment' => '性别，0男 1女',
        ], $options));
    }

    /**
     * 添加性别字段
     *
     * @param array $options
     * @return Migration
     */
    public function addSexColumn(string $column = 'gender', array $options = []) : Migration
    {
        return $this->addGenderColumn($column, $options);
    }

    /**
     * 添加层级字段
     *
     * @param array $options
     * @return Migration
     */
    public function addLevelColumn(string $column = 'level', array $options = []) : Migration
    {
        return $this->addEnumTypeColumn($column, array_merge([
            'comment' => '层级',
        ], $options));
    }

    /**
     * 表达行可删除的字段
     *
     * @param array $options
     * @return Migration
     */
    public function addDeletableColumn(string $column = 'deletable', array $options = []) : Migration
    {
        return $this->addEnumTypeColumn($column, array_merge([
            'comment' => '是否可删除，0不可删除，1可删除',
            'default' => 1,
        ], $options));
    }

    /**
     * 表达行可编辑的字段
     *
     * @param array $options
     * @return Migration
     */
    public function addEditableColumn(string $column = 'editable', array $options = []) : Migration
    {
        return $this->addEnumTypeColumn($column, array_merge([
            'comment' => '是否可编辑，0不可编辑，1可编辑',
            'default' => 1,
        ], $options));
    }
}
