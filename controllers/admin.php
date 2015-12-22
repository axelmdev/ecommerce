<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/admin.php");
class Controller_Admin {
	/**
	 * Fonction permettant de se connecter au panel admin
	 */
	public function connectAdmin() {
		if(!empty($_POST)) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$resultadmin = $this->db->getAll('SELECT * FROM admin WHERE email = "'.$email.'" AND password = "'.$password.';"');
			return $resultadmin;
		}
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/login.php");
	}
	public function deconnectAdmin() {
		session_start();
		session_destroy();
	}




}
?>