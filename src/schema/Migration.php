<?php
namespace isadmin\migration\schema;

use Phinx\Migration\AbstractMigration;
use \Phinx\Db\Table;
use isadmin\migration\schema\traits\IntegerColumn;
use isadmin\migration\schema\traits\StringColumn;
use isadmin\migration\schema\traits\TextColumn;
use isadmin\migration\schema\traits\DateTimeColumn;

class Migration extends AbstractMigration
{
    use IntegerColumn;
    use StringColumn;
    use TextColumn;
    use DateTimeColumn;

    /**
     * @var Table
     */
    protected $table = null;
    
    /**
     * 初始化表
     *
     * @author xiaoqingping <xiaoqingping@qq.com>
     * @param string $name     表名
     * @param string $comment  表注释
     * @param array $options   选项，可以设置primary_key和collation
     * @return Migration
     */
    public function initTable(string $name, array $options = []) : Migration
    {
        $this->table = $this->table($name, array_merge([
            'id'          => false,
            'primary_key' => ['id'],
            'comment'     => '',
            'signed'      => false,
            'collation'   => 'utf8mb4_general_ci',
        ], $options));

        return $this;
    }

    /**
     * 创建数据表
     */
    public function create()
    {
        $this->table->create();
    }

    /**
     * 增加公共字段
     *
     * @param boolean $withState 表是否需要state状态
     * @param string $state_column
     * @param array $state_options
     * @return Migration
     */
    public function addPublicField(bool $withState = true, string $state_column = 'state', array $state_options = []) : Migration
    {
        if ($withState) {
            $this->addStateColumn($state_column, $state_options);
        }

        return $this->addCreatedAtColumn()
                    ->addUpdatedAtColumn()
                    ->addDeletedAtColumn();
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this->table, $name)) {
            call_user_func_array([$this->table, $name], $arguments);
            return $this;
        }

        throw new \isadmin\base\BaseException('找不到方法', 0);
    }
}
