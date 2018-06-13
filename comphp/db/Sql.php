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

    protected $selectedFields;

    protected $joinFields;

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
        $this->filter = ' WHERE ';

        $sysFiller = empty($where) ? 'sys' : 'and sys';
        $sysFiller .= ' = ?';
        array_push($where, $sysFiller);
        array_push($param,DB_SYS );

        $this->filter .= implode(' ', $where);

        $this->param = $param;

        return $this;
    }

    public function selectFields($fields = array(), $as = array()){

        if($as){
            $fields = $this->dealAs($fields, $as);
        }

        //var_dump($fields);

        if($fields){
            $this->selectedFields = implode(',', $fields);
        }

        //echo $this->selectedFields;

        return $this->selectedFields;

    }

    public function getSelectScript($selectFields){
        //echo $selectFields;
        //echo $this->table;
        $sql = sprintf("select %s from `%s`", $selectFields, $this->table);
        //echo $sql;
        return $sql;
    }


    /**
     *
     * $this->order(['id DESC', 'title ASC', ...])->fetch();
     *
     * @param array $order
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

    public function group($sql, $group = array()){

        if($group){
            $sql .= ' GROUP BY ';
            $sql .= implode(',', $group);
        }

        return $sql;

    }

    public function dealAs($join = array(), $as =array()){
        $joinAndas = array_combine($join,$as);

        $join = array();

        foreach ($joinAndas as $joinKey => $as){
            if(!empty($as)){
                array_push($join, '('.$joinKey.') AS  '. $as);
            }else{
                array_push($join, $joinKey);
            }
        }

        return $join;
    }

    /**
     * @param array $join = [table1, table2]
     * @param $as
     * @param array $on = [on1, on2]
     * table1 inner join table2 on on1 = on2
     */
    public function innerJoin ($join = array(), $as =array(), $on = array()){

        if($join){

            if($as){

                $join = $this->dealAs($join,$as);

            }

            $this->joinFields =  implode(' inner join ', $join);
            $this->joinFields .= ' on '.implode('= ', $on);

            return $this->joinFields;
        }

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

    public function fetchInnerJoinQuery($querySql){
        $sql = sprintf("$querySql %s", $this->filter);

        //echo $querySql;

        $sth = Db::getDB()->prepareBindQuery($sql, $this->param);
        return $sth;
    }

    public function fetchByQuery(){
        $sql = sprintf("select %s from `%s` %s",$this->selectedFields, $this->table, $this->filter);

        $sth = Db::getDB()->query($sql, $this->param);


    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        $sql = sprintf("update `%s` set %s %s", $this->table, $this->formatUpdate($data), $this->filter);

        //echo  $this->filter;

            // echo $sql;

        $sth = Db::getDB()->prepare($sql);

        if(!array_key_exists(0, $data)){
            $paras = array_merge($data, $this->param);
        }else{
            $paras = $this->param;
        }
        //var_dump($paras);

        $sth = Db::getDB()->bindParams($sth, $paras);

        //var_dump($sth);

        $sth->execute();

        $rowCount = $sth->affected_rows;

        $sth->close();

        return $rowCount;
    }

    /**
     * insert data
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        $sql = sprintf("insert into `%s` %s", $this->table, $this->formatInsert($data));

        //echo $sql;

        //var_dump($this->param);

        $sth = Db::getDB()->prepare($sql);

        //var_dump($sth);

        $sth = Db::getDB()->bindParams($sth, $this->param);

        $sth->execute();

        $insertID = $sth->insert_id;

        //echo $insertID;

        $sth->close();

        return $insertID;
    }

    /**
     * array to insert sql
     * @param $data
     * @return string
     */
    private function formatInsert($data)
    {
        $fields = array();
        $names = array();

        $this->param = array();

        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $names[] = sprintf("?", $key);

            array_push($this->param, $value);

        }

        $field = implode(',', $fields);
        $name = implode(',', $names);

        return sprintf("(%s) values (%s)", $field, $name);
    }

    /**
     * array - > update sql
     * @param $data
     * @return string
     */
    private function formatUpdate($data)
    {
        $fields = array();

        foreach ($data as $key => $value) {
            if (is_numeric($key)){
                $fields[] = sprintf("%s", $value);
            }else{
                $fields[] = sprintf("`%s` = ?", $key);
            }

        }

        //echo implode(',', $fields);

        return implode(',', $fields);
    }



}