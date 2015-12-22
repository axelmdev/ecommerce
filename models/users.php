<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");

class Model_Users {
	private $db;

	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	public function newUsers($username, $password, $email, $nom, $prenom, $adresse, $code_postal) {
			if(empty($errors)) {
				$query = 'INSERT INTO users (username, password, email, nom, prenom, adresse, code_postal) VALUES (:username, :password, :email, :nom, :prenom, :adresse, :code_postal);';
				$tab = array(
					'username' => $username,
					'password' => $password,
					'email' => $email,
					'nom' => $nom,
					'prenom' => $prenom,
					'adresse' => $adresse,
					'code_postal' => $code_postal
				);
				$this->db->execute($query, $tab);
			} else {
				die();
			}	
	}
	public function connectUser($email, $password) {
			if(!empty($_POST)) {
				$query = 'SELECT * FROM users WHERE email = :email AND password = :password';
				$tab = array(
					'email' => $email,
					'password' => $password
				);
				$this->db->execute($query, $tab);
			}
	}
	public function listUsers() {
		$query = "SELECT * FROM users;";
		$resultatlist = $this->db->get($query);
		return $resultatlist;
	}
	public function userExist($username) {
		$resultat_user = $this->db->get('SELECT id_users FROM users WHERE username = "'.$username.';"');
		if(empty($resultat_user)) {
			return false;
		} else {
			return true;
		}
	}
	public function emailExist($email) {
		$resultat_email = $this->db->get('SELECT id_users FROM users WHERE email = "'.$email.';"');
		if(empty($resultat_email)) {
			return false;
		} else {
			return true;
		}
	}
}
 ?>