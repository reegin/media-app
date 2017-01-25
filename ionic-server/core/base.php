<?php
class Base {
	public function log($msg){
		error_log(date('[Y:m:d H:i:s] ') . print_r($msg,1) . "\n", 3, DIR_ROOT . DS ."log.log");
	}
	public function errLog($msg){
		return $this->log($msg);
	}
	public function getParam($name){
		return isset($_REQUEST[$name]) ? $_REQUEST[$name]: '';
	}
}