<?php
namespace isadmin\migration\schema\traits;

use Phinx\Db\Adapter\MysqlAdapter;
use isadmin\migration\schema\Migration;

trait TextColumn
{
    /**
     * 添加文章内容字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addTextColumn(string $column, array $options = []) : Migration
    {
        $this->table->addColumn($column, 'text', array_merge([
            'limit'   => MysqlAdapter::TEXT_REGULAR,
        ], $options));
        
        return $this;
    }

    /**
     * 添加文本内容字段
     *
     * @param array $options
     * @return Migration
     */
    public function addContentColumn(string $column = 'content', array $options = []) : Migration
    {
        return $this->addTextColumn($column, array_merge([
            'comment' => '文章内容',
        ], $options));
    }

    /**
     * 添加文本内容字段
     *
     * @param array $options
     * @return Migration
     */
    public function addArticleColumn(string $column = 'content', array $options = []) : Migration
    {
        return $this->addContentColumn($column, $options);
    }

    /**
     * 添加文本内容字段
     *
     * @param array $options
     * @return Migration
     */
    public function addNewsColumn(string $column = 'content', array $options = []) : Migration
    {
        return $this->addContentColumn($column, $options);
    }

    /**
     * 添加简介字段
     *
     * @param array $options
     * @return Migration
     */
    public function addBriefColumn(string $column = 'brief', array $options = []) : Migration
    {
        return $this->addTextColumn($column, array_merge([
            'comment' => '简介',
        ], $options));
    }

    /**
     * 添加公告字段
     *
     * @param array $options
     * @return Migration
     */
    public function addNoticeColumn(string $column = 'notice', array $options = []) : Migration
    {
        return $this->addTextColumn($column, array_merge([
            'comment' => '公告',
        ], $options));
    }

    /**
     * 添加公告字段
     *
     * @param array $options
     * @return Migration
     */
    public function addAnnounceColumn(string $column = 'notice', array $options = []) : Migration
    {
        return $this->addNoticeColumn($column, $options);
    }
}
