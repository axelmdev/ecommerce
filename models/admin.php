<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");

class Model_Admin {
	private $db;
	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
}
?>