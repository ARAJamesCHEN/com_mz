<?php
/*
   MySQL Database Connection Class
*/
namespace comphp\db;

use mysqli;

use comphp\log\MyLog;

include_once(APP_PATH. 'comphp/log/' .'Logger.php');


class MySQL 
{

  protected  $myLog;
  protected  $host;
  protected  $dbUser;
  protected  $dbPass;
  protected  $dbName;
  protected  $dbConn;

  protected  $dbConnectError;
  protected  $result;

  protected  $dbConnForStmt;
  protected  $dbconnectForStmtError;
  

  public function __construct($host, $dbUser, $dbPass, $dbName )
	{
		$this->myLog = new MyLog('MySQL', 'MySQLDB.php');
		$this->host   = $host;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
		$this->dbName = $dbName;
		$this->connectToServerOOP();
	}


    /**
     * @return mixed
     */
    public function getDbConnForStmt()
    {
        return $this->dbConnForStmt;
    }

    /**
     * @param mixed $dbConnForStmt
     */
    public function setDbConnForStmt($dbConnForStmt): void
    {
        $this->dbConnForStmt = $dbConnForStmt;
    }

    /**
     * OOP style
     */
  public function connectToServerOOP(){

		$this->dbConnForStmt = new MySQLi( $this->host, $this->dbUser, $this->dbPass, $this->dbName);

		if($this->dbConnForStmt->connect_error){
			trigger_error('could not connect to server oop' );
		}else
		{
			$this->dbConnForStmt->set_charset('utf8');
            $this->myLog->log_msg(MyLog::TYPE_NOTICE,'connected to server');
			//echo ('connected to server for oop');
		}
		
	}

    function dropDatabase()
    {
		$sql = "drop database $this->dbName";
        echo "<br> $sql  <br>";
		if ( $this->query($sql) )
		{
			echo "<br> the $this->dbName database was dropped<br>";
		}
		else
		{
			echo "the $this->dbName database was not dropped<br>";
		}
    }


    function createDatabase()
    {
		$sql = "create database if not exists $this->dbName ";
		echo "<br> $sql  <br>";
		if ( $this->query($sql) )
		   {
				echo "the $this->dbName database was created<br>";
		   }
			else
		   {
				echo "the $this->dbName database was not created<br>";
		   }
    }


   function isError()
   {
      if  ( $this->dbConnectError )
      {
         return true;
      }
      $error = mysqli_error( $this->dbConn );
      if (empty ($error))
      {
           return false;
      }
      else
      {
           return true;   
      }
   }

   
   	function createTable($table, $sql )
	{
		$result = $db->query($sql);
		if ( $result == True )
		{
			echo "$table was added<br>";
		}
		else
		{
			echo "$table was not added<br>";
		}
   }

    /**
     * defense SQL injection
     * @param $sql
     * @return mixed
     */
   public function prepare($sql){

       //echo $sql.'<br>';

       $stmt = false;

       try {
           $stmt = $this->dbConnForStmt->prepare($sql);
       } catch (\Exception $e) {
           echo $e->getMessage();
       }

       if ($stmt === FALSE) {
           die($this->dbConnForStmt->error);
       }

       return $stmt;
   }

    /**
     * defense SQL injection
     * @param $stmt
     * @param array $paras
     * @return mixed
     */
   public function bindParams ($stmt, array $paras){

       //var_dump($paras);

       $params = array_merge(array(str_repeat('s', count($paras))), $paras);

       $paramsRef = array();

       foreach($params as $k => $v){
           $paramsRef[$k] = &$params[$k];
       }

       //var_dump($paramsRef);

       call_user_func_array(array($stmt, 'bind_param'), $paramsRef);

       return $stmt;

   }

    /**
     * @param $stmt
     * @return MySQLResult
     */
   public function queryStmt($stmt){
       $stmt->execute();

       $result = $stmt->get_result();

       $stmt->close();
       return new MySQLResult($this, $result);
   }

    /**
     * http://php.net/manual/zh/mysqli-stmt.get-result.php
     * OOP
     * @param $sql
     * @param array $paras
     * @return mixed
     */
   public function prepareBindQuery($sql, array $paras){

	    //echo $sql;

	    //var_dump($paras);

        $stmt = $this->prepare($sql);

        $stmt = $this->bindParams($stmt, $paras);

        return $this->queryStmt($stmt);

   }
   

   
}


class MySQLResult 
{
   protected $mysql;
   protected $result;

   function __construct( &$mysql, $result )
   {
     $this->mysql = &$mysql;
     $this->result = $result;
   }

    function size()
    {
        return $this->result->num_rows;
    }

    /**
     * OOP
     * http://php.net/manual/zh/mysqli-stmt.get-result.php
     * @return bool
     */
    function fetch()
    {
		if ( $row = $this->result->fetch_array(MYSQLI_ASSOC))
		{
		   return $row;
		}
       else
       {
           return false;
       }         
    }

    /**
     * OOP
     * http://php.net/manual/zh/mysqli-stmt.get-result.php
     * @return bool
     */
    function fetchAll()
    {
        if ( $row = $this->result->fetch_all(MYSQLI_ASSOC))
        {
            return $row;
        }
        else
        {
            return false;
        }
    }

    function insertID()
    {
            /**
            * returns the ID of the last row inserted
            * @return  int
            * @access  public
            */
          return mysqli_insert_id($this->mysql->dbConn);
    }


   function isError()
   {
        return $this->mysql->isError();
   }
}