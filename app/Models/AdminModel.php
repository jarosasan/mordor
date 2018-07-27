<?php
	/**
	 * Created by PhpStorm.
	 * User: jaroslavlomecki
	 * Date: 11/23/17
	 * Time: 8:46 AM
	 */
	class AdminModel
	{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
 
	public function getCount($table){
		return $this->db->select("SELECT COUNT(*) as count FROM ".$table."");
	}
		
	public function getPosts($table, $startPost, $perPages): array
	{
		return $this->db->select("SELECT * FROM ".$table." LIMIT :start, :coun", [':start'=>$startPost, ':coun'=>$perPages]);
	}
	
	public function getColName($table){
		return $this->db->select("SHOW COLUMNS FROM ".$table."");
	}
	
	public function removeCont($table, $id){
		return $this->db->remove("DELETE FROM ".$table." WHERE id = ".$id."");
	}
	
		
	}