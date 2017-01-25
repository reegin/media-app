<?php
class Logic extends Db {
	public function selectOne($id){
		$sql = 'select * from product where id=' . $id;
		return $this->_selectOne($sql);
	}
	public function selectList($id){
		$sql = 'select * from product';
		if($id) $sql .= ' where cid=' . $id;
		return $this->_selectList($sql);
	}

	public function selectListArt($id) {
		$sql = 'select * from product';
		if($id) $sql .= ' where aid=' . $id;
		return $this->_selectList($sql);
	}

	public function getCategory()
	{
		$sql = 'select * from category';
		return $this->_selectList($sql);
	}

	public function getArtist() {
		$sql = 'select * from artist';
		return $this->_selectList($sql);
	}

	public function getSong() {
		$sql = 'select * from product';
		return $this->_selectList($sql);
	}
	// public function saveProduct($data){
	// 	$id = isset($data['id']) ? $data['id'] : 0;
	// 	unset($data['id']);
	// 	if (!$data) return 0;
	// 	if ($id){
	// 		$sql = $this->data2usql('product',$data,"id={$id}");
	// 		return $this->_update($sql);
	// 	}else{
	// 		$sql = $this->data2isql('product',$data);
	// 		return $this->_insert($sql);
	// 	}
	// }
}