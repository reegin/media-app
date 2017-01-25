<?php
class DB extends Base{
	static private $_connection = 0;
	public function __construct(){
		$this->_error = '';
		$this->_total = 0;
		if (!self::$_connection){
			$this->connect();
		}
	}
	public function connect(){
		$this->log("connect->start");
		if (!self::$_connection){
			$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if (mysqli_connect_errno()){
				$err = sprintf("Connect failed: %s\n", mysqli_connect_error());
				$this->throwException($err);
				return 0;
			}
			$this->log("connect->update charset");
			$connection->query("SET NAMES 'utf8'");
			self::$_connection = $connection;
		}
		$this->log("connect->end");
		return self::$_connection;
	}
	public function _selectOne($sql){
		$this->log("_selectOne->sql=[$sql]");
		$ret = $this->_selectOpen($sql);
		if ($ret) return $ret[0];
		return 0;
	}
	public function _selectList($sql){
		$this->log("_selectList->sql=[$sql]");
		return $this->_selectOpen($sql);
	}
	public function _selectOpen($sql){
		$ret = $this->_select($sql);
		return $ret;
	}
	public function _select($sql){
		if(!$sql) return null;
		if (!self::$_connection){
			$err = "Don't have connection";
			//$this->errLog($err);
			$this->throwException($err);
			return null;
		}
		$this->log("SQL=[" . $sql . "]");
		$result = self::$_connection->query($sql);
		if (self::$_connection->error){
			//$this->errLog("Can't select,ERROR=[" . self::$_connection->error . "]");
			$this->log("COUNT=[0]");
			return null;
		}
		if (!$result){
			//$this->errLog("Result empty");
			$this->log("COUNT=[0]");
			return null;
		}
		$ret = array();
		while ($row = $result->fetch_assoc()) {
			$ret[] = $this->toLower($row);
		}
		$result->close();
		
		$this->log("COUNT=[" . count($ret) . "]");
		return $ret ;
	}
	public function _update($sql){
		if(!$sql) {
			$this->_error = "SQL is empty";
			return -1;
		}
		if (!self::$_connection){
			$err = "Don't have connection";
			$this->errLog($err);
			$this->throwException($err);
			$this->_error = "Can't update db";
			return -1;
		}
		$this->log("SQL=[" . $sql . "]");
		$result = self::$_connection->query($sql);
		if (self::$_connection->error){
			$err = "Can't update,ERROR=[" . self::$_connection->error . "]";
			$this->errLog($err);
			$this->throwException($err);
			$this->_error = "Can't update db";
			return -1;
		}
		$ret = self::$_connection->affected_rows;
		$this->log( "updated row=[$ret]" );
		
		return $ret;
	}
	public function _insert($sql){
		if(!$sql) {
			$this->_error = "SQL is empty";
			return -1;
		}
		if (!self::$_connection){
			$this->_error = "Can't insert into db";
			return -1;
		}
		$this->log("SQL=[" . $sql . "]");
		$result = self::$_connection->query($sql);
		if (self::$_connection->error){
			$err = "Can't insert,ERROR=[" . self::$_connection->error . "]";
			$this->errLog($err);
			$this->throwException($err);
			$this->_error = "Can't insert into db";
			return -1;
		}
		$ret = self::$_connection->insert_id;
		$this->log( "ret=[$ret]" );
		
		return $ret;
	}
	public function _delete($sql){
		if(!$sql) {
			$this->_error = "SQL is empty";
			return -1;
		}
		if (!self::$_connection){
			$err = "Don't have connection";
			$this->errLog($err);
			$this->throwException($err);
			$this->_error = "Can't delete from db";
			return -1;
		}
		//$this->log("SQL=[" . $sql . "]");
		$result = self::$_connection->query($sql);
		if (self::$_connection->error){
			$err = "Can't delete,ERROR=[" . self::$_connection->error . "]";
			$this->errLog($err);
			$this->throwException($err);
			$this->_error = "Can't delete from db";
			return -1;
		}
		$ret = self::$_connection->affected_rows;
		$this->log( "deleted row=[$ret]" );
		return $ret;
	}
	public function data2usql($tbl,$data,$cond){
		if($cond !== null || $cond !== "")
		{
			$cond = " WHERE " . $cond;
		}
		$vals = '';
		$comma = '';
		
		foreach($data as $f=>$v) {
			$vals .= $comma . "`{$f}` = " . $this->f2val($v);
			$comma = ",";
		}
		$ret = "UPDATE  {$tbl} SET {$vals} {$cond} ";
		return $ret;
	}
	public function data2isql($tbl,$data){
		$comma = "";
		$vals = '';
		$fields = '';
		foreach($data as $f=>$v) {
			$fields .= $comma . "`{$f}`";
			$vals .= $comma . $this->f2val($v);
			$comma = ",";
		}
		return "INSERT INTO {$tbl} ( {$fields} ) VALUES ( {$vals} )" ;
	}
	public function f2val($v){
		return $this->string2Sql($v);
	}
	public function string2Sql($val){
		if($val === 0)  return '0' ;
		if($val === null) {
			return 'NULL';
		}
		if (get_magic_quotes_gpc()) $val = stripslashes($val);
        return "n'" . self::$_connection->escape_string($val)  . "'" ;
	}
	public function throwException($err){
		echo $err;exit();
	}
	public function toLower($data){
		$ret = array();
		foreach($data as $key=>$val) {
			$ret[strtolower($key)] = $val;
		}
		return $ret;
	}
}