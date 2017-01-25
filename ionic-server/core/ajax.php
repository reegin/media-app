<?php
class Ajax extends Base {
	public function returnOne($data){
		$ret['data'] = $data;
		return $this->returnJson($ret);
	}
	public function returnList($datas){
		$ret['datas'] = $datas;
		return $this->returnJson($ret);
	}
	public function returnError($err){
		$ret = array("error"=>$err);
		return $this->returnJson($ret);
	}
	public function returnOk($msg){
		$ret = array("msg"=>$msg);
		return $this->returnJson($ret);
	}
	
	public function returnJson($data){
		$ret = $data;
		$ret['ret'] = 1;
		$this->log($_SERVER['REQUEST_URI']);
		$this->log($data);
		$callback = $this->getParam('callback');
		
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Credentials: true');
		if ($callback){
			echo "{$callback}(";
			echo json_encode($ret);
			echo ");";
			exit();
		}else{
			echo json_encode($ret);exit();
		}
	}
}