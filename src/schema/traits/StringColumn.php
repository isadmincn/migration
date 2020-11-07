<?php
namespace isadmin\migration\schema\traits;

use isadmin\migration\schema\Migration;
use Ramsey\Uuid\Uuid;

trait StringColumn
{
    /**
     * 添加字符串字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addStringColumn(string $column, array $options = []) : Migration
    {
        $this->table->addColumn($column, 'string', array_merge([
            'limit' => 255,
            'null'  => false,
            'default' => '',
            'comment' => '',
        ], $options));

        return $this;
    }

    /**
     * 添加一个密码字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addPasswordColumn(string $column = 'password', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '密码',
            'limit'   => 32,
        ], $options));
    }

    /**
     * 用户名
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addUsernameColumn(string $column = 'username', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '用户名',
            'limit'   => 100,
        ], $options));
    }

    /**
     * 昵称
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addNicknameColumn(string $column = 'nickname', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '昵称',
            'limit'   => 100,
        ], $options));
    }

    /**
     * 添加一个链接字段
     * 可以存储：网址，文件路径，图片路径等
     *
     * @param string $column
     * @param string $comment
     * @param array $options
     * @return Migration
     */
    public function addUrlColumn(string $column, array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '链接',
            'limit'   => 255,
        ], $options));
    }

    /**
     * 添加一个链接字段
     *
     * @param array $options
     * @return Migration
     */
    public function addLinkColumn(string $column = 'link', array $options = []) : Migration
    {
        return $this->addUrlColumn($column, array_merge([
            'comment' => '链接',
        ], $options));
    }

    /**
     * 添加一个站点（域名）字段
     *
     * @param array $options
     * @return Migration
     */
    public function addSiteColumn(string $column = 'site', array $options = []) : Migration
    {
        return $this->addUrlColumn($column, array_merge([
            'comment' => '站点',
        ], $options));
    }

    /**
     * 添加域名字段
     *
     * @param array $options
     * @return Migration
     */
    public function addHostColumn(string $column = 'domain', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '域名',
            'limit'   => 100,
        ], $options));
    }

    /**
     * 添加域名字段
     *
     * @param array $options
     * @return Migration
     */
    public function addDomainColumn(string $column = 'domain', array $options = []) : Migration
    {
        return $this->addHostColumn($column, $options);
    }

    /**
     * 添加手机号码字段
     *
     * @param array $options
     * @return Migration
     */
    public function addPhoneColumn(string $column = 'phone', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '手机号码',
            'limit'   => 11,
        ], $options));
    }

    /**
     * 添加手机号码字段
     *
     * @param array $options
     * @return Migration
     */
    public function addMobileColumn(string $column = 'phone', array $options = []) : Migration
    {
        return $this->addPhoneColumn($column, $options);
    }

    /**
     * 添加邮箱字段
     *
     * @param array $options
     * @return Migration
     */
    public function addEmailColumn(string $column = 'email', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '邮箱',
        ], $options));
    }

    /**
     * 添加邮箱字段
     *
     * @param array $options
     * @return Migration
     */
    public function addMailColumn(string $column = 'email', array $options = []) : Migration
    {
        return $this->addEmailColumn($column, $options);
    }

    /**
     * 身份证号码
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addIdcardColumn(string $column = 'idcard', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '身份证号码',
            'limit'   => 18,
        ], $options));
    }

    /**
     * 添加头像字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addAvatarColumn(string $column = 'avatar', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '头像',
        ], $options));
    }

    /**
     * 添加图标字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addIconColumn(string $column = 'icon', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '图标',
        ], $options));
    }

    /**
     * 添加logo字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addLogoColumn(string $column = 'logo', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => 'Logo地址',
        ], $options));
    }

    /**
     * 添加标题字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addTitleColumn(string $column = 'title', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '文章标题',
            'limit'   => 100,
        ], $options));
    }

    /**
     * 添加摘要字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addAbstractColumn(string $column = 'abstract', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '文章摘要',
        ], $options));
    }

    /**
     * 添加备注字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addRemarkColumn(string $column = 'remark', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '备注',
        ], $options));
    }

    /**
     * 添加作者字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addAuthorColumn(string $column = 'author', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '作者',
            'limit'   => 50,
        ], $options));
    }

    /**
     * 添加标签字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addTagColumn(string $column = 'tag', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '标签',
            'limit'   => 30,
        ], $options));
    }

    /**
     * 添加ip字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addIpColumn(string $column = 'ip', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => 'ip地址',
            'limit'   => 15,
        ], $options));
    }

    /**
     * 添加描述字段
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addDescColumn(string $column = 'desc', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '描述',
        ], $options));
    }

    /**
     * UUID
     *
     * @param string $column
     * @param array $options
     * @return Migration
     */
    public function addUuidColumn(string $column = 'uuid', array $options = []) : Migration
    {
        return $this->addStringColumn($column, array_merge([
            'comment' => '唯一id',
        ], $options));
    }
}
