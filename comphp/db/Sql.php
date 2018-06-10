<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 6:08 PM
 */

namespace comphp\db;

class Sql
{
    protected $table;

    protected $primary = 'id';

    private $filter = '';

    private $param = array();

    /**
     *
     * $this->where(['id = 1','and title="Web"', ...])->fetch();
     * $this->where(['id = :id'], [':id' => $id])->fetch();
     *
     * @param array $where
     * @return $this
     */
    public function where($where = array(), $param = array())
    {
        $this->filter .= ' WHERE ';

        $sysFiller = empty($where) ? 'sys' : 'and sys';
        $sysFiller .= ' = ?';
        array_push($where, $sysFiller);
        array_push($param,DB_SYS );

        $this->filter .= implode(' ', $where);

        $this->param = $param;

        return $this;
    }

    /**
     * 拼装排序条件，使用方式：
     *
     * $this->order(['id DESC', 'title ASC', ...])->fetch();
     *
     * @param array $order 排序条件
     * @return $this
     */
    public function order($order = array())
    {
        if($order) {
            $this->filter .= ' ORDER BY ';
            $this->filter .= implode(',', $order);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function fetchAll()
    {
        $sql = sprintf("select * from `%s` %s", $this->table, $this->filter);
        $sth = Db::getDB()->prepareBindQuery($sql, $this->param);

        return $sth;
    }

    /**
     * @return mixed
     */
	public function fetchByStmt()
    {
        $sql = sprintf("select * from `%s` %s", $this->table, $this->filter);
        $sth = Db::getDB()->prepareBindQuery($sql, $this->param);
        return $sth;
    }

    public function update($data)
    {
        $sql = sprintf("update `%s` set %s %s", $this->table, $this->formatUpdate($data), $this->filter);

        $sth = Db::getDB()->prepare($sql);

        $paras = array_merge($data, $this->param);

        $sth = Db::getDB()->bindParams($sth, $paras);

        $sth->execute();

        $rowCount = $sth->affected_rows;

        $sth->close();

        return $rowCount;
    }

    // 将数组转换成插入格式的sql语句
    private function formatInsert($data)
    {
        $fields = array();
        $names = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $names[] = sprintf(":%s", $key);
        }

        $field = implode(',', $fields);
        $name = implode(',', $names);

        return sprintf("(%s) values (%s)", $field, $name);
    }

    /**
     * 将数组转换成更新格式的sql语句
     * array - > update sql
     * @param $data
     * @return string
     */
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = ?", $key);
        }

        return implode(',', $fields);
    }



}