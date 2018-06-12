<?php

namespace comphp\log;

class MyLog
{
	
  	private $log_name;
	
	private $app_id;
	
	private $page_name;
	
	private $log_file;
	
	private $myLog;
	
	private $path = __FILE__;
	
	const TYPE_ERROR = 'error';
	
    const TYPE_WARNING = 'warning';
	
    const TYPE_NOTICE = 'notice';
	
    public function __construct($logName,$page_name){
		
		$this->initLogger($logName,$page_name);
		
    }
	
	public function initLogger($logName,$page_name)
	{
		if(empty($logName)){
			$log_name = 'a_default_log.log'; 
		}
		
        $this->log_name =$logName.'.log';
        
        $this->app_id = uniqid();//give each process a unique ID for differentiation
		
        $this->page_name = $page_name;
        
        $this->log_file = $this->path.$this->log_name;
		
		if(!file_exists($this->path)) {
            mkdir($this->path, 0777, true);
        }
		
		if(!is_file($this->log_file)){
			file_put_contents($this->log_file, '');
		}
		
        $this->myLog=fopen($this->log_file,'a');
	}
	  
    public function log_msg($type, $msg)
    {//the action
        $log_line=join(' : ', array( date(DATE_RFC822), $this->page_name, $this->app_id,$type, $msg ) );
        fwrite($this->myLog, $log_line."\n");
    }
	
    function __destruct()
    {//makes sure to close the file and write lines when the process ends.
        $this->log_msg(self::TYPE_NOTICE,"Closing log");
        fclose($this->myLog);
    }
}
