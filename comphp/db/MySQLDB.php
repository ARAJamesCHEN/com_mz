<?php
/*
   MySQL Database Connection Class
*/
namespace comphp\db;


use app\log\Logger;

include_once(APP_PATH. 'app/log/' .'Logger.php');


class MySQL 
{

  protected  $log;
  protected  $host;
  protected  $dbUser;
  protected  $dbPass;
  protected  $dbName;
  protected  $dbConn;
  protected  $dbconnectError;
  protected  $result;


	function __construct($host, $dbUser, $dbPass, $dbName )
	{
		$this->host   = $host;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
		$this->dbName = $dbName;
		$this->connectToServer();
	}


	function connectToServer()
	{
		$this->dbConn = mysqli_connect( $this->host, $this->dbUser, $this->dbPass );
		if ($this->dbConn->connect_error)
		{
		   trigger_error('could not connect to server' );
		   
		   $this->dbconnectError = true;
		}
		else
		{
			//$this->log->log_msg(Logger::TYPE_NOTICE,'connected to server');
            echo ('connected to server');
		}
	   
	}

    function selectDatabase()
    {
    if (! mysqli_select_db( $this->dbConn, $this->dbName ) )
           {
              trigger_error( 'could not select database' );  
              $this->dbconnectError = true;                     
           }
		   else
           {
			   //$this->log->log_msg(Logger::TYPE_NOTICE, " $this->dbName  database selected ");
               echo (" $this->dbName  database selected ");
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
      if  ( $this->dbconnectError )
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
   

	function query( $sql )
	{
		mysqli_query( $this->dbConn, "set character_set_results='utf8'"); 
		 if (!$queryResource = mysqli_query($this->dbConn, $sql ))
		 {
			trigger_error ( 'Query Failed: <br>' . mysqli_error($this->dbConn ) . '<br> SQL: ' . $sql );
			return false;
		 }
	 
		 return new MySQLResult( $this, $queryResource ); 
   }

    /**
     * http://php.net/manual/en/mysqli.prepare.php
     * @param $sql
     * @return bool|\mysqli_stmt
     */
   public function prepare($sql){

       $stmt = mysqli_prepare($this->dbConn, $sql);

       if(!$stmt){
           trigger_error ( 'prepare Failed: <br>' . mysqli_error($this->dbConn ) . '<br> SQL: ' . $sql );
       }else{
           return $stmt;
       }

   }

    function bind($stmt, $type, $value){

        if(!mysqli_stmt_bind_param($stmt, $type,$value)){
            var_dump($stmt);
            trigger_error ( 'bind Failed: <br>' . mysqli_error($this->dbConn )
                . '<br>para:'. $value);
        }else{
            return $stmt;
        }

    }

    public function executeStmt($stmt){

        if(mysqli_stmt_execute($stmt)){
            echo "mysqli_stmt_execute was executed<br>";
        }else{
            //var_dump($this->dbConn);
            var_dump($stmt);
            trigger_error ( 'executeStmt Failed: <br>' . mysqli_error($this->dbConn) );
        }

        return $stmt;
    }

    public function stmtBindRst($stmt){
        if(mysqli_stmt_bind_result($stmt,$this->result)){
            echo "mysqli_stmt_bind_result was executed<br>";

            mysqli_stmt_fetch($stmt);

            echo "The:".$this->result;

        }else{
            trigger_error ( 'stmtBindRst Failed: <br>' . mysqli_error($this->dbConn ) . '<br> statement: ' . $stmt );
        }

        return $stmt;
    }

    public function stmtFetch($stmt){

        while (mysqli_stmt_fetch($stmt)) {
            echo "mysqli_stmt_fetch was executed<br>";
             var_dump($this->result);
        }
    }
   
}


class MySQLResult 
{
   protected $mysql;
   protected $query;

   function __construct( &$mysql, $query )
   {
     $this->mysql = &$mysql;
     $this->query = $query;
   }

    function size()
    {
        return mysqli_num_rows($this->query);
    }

    function fetch()
    {
		if ( $row = mysqli_fetch_array( $this->query , MYSQLI_ASSOC ))
		{
		   return $row;
		}
			   else if ( $this->size() > 0 )
       {
           mysqli_data_seek ( $this->query , 0 );
           return false;
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