<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");

class Model_Users {
	private $db;

	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	public function newUsers($username, $password, $email, $nom, $prenom, $adresse, $code_postal, $errors) {
			if(empty($errors)) {
				$query = 'INSERT INTO users (username, password, email, nom, prenom, adresse, code_postal) VALUES (:username, :password, :email, :nom, :prenom, :adresse, :code_postal)';
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
			}	
	}
	public function connectUsers($pseudo, $password) {
		$pseudo_secu = htmlspecialchars($pseudo);
		$password_secu = sha1($password);
		$query = 'SELECT * FROM users WHERE username = "'.$pseudo_secu.'" AND password = "'.$password_secu.'"';
		$result = $this->db->get($query);
		if(!empty($result)) {
			$_SESSION['id_users'] = $result['id_users'];
			$_SESSION['username'] = $result['username'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['adresse'] = $result['adresse'];
			$_SESSION['code_postal'] = $result['code_postal'];
			header('Location: index.php');
		} else {
			return false;
		}
	}
	public function listUsers() {
		$query = "SELECT * FROM users";
		$resultatlist = $this->db->getAll($query);
		return $resultatlist;
	}
	public function userExist($username) {
		$query = 'SELECT id_users FROM users WHERE username = "'.$username.'"';
		$resultat_user = $this->db->get($query);
		if(empty($resultat_user)) {
			return false;
		} else {
			return true;
		}
	}
	public function emailExist($email) {
		$query = 'SELECT id_users FROM users WHERE email = "'.$email.'"';
		$resultat_email = $this->db->get($query);
		if(empty($resultat_email)) {
			return false;
		} else {
			return true;
		}
	}
	public function profilUsers($id_users) {
		$query = 'SELECT * FROM users WHERE id_users = "'.$id_users.'"';
		$profilUsers = $this->db->get($query);
		return $profilUsers;
	}
	public function commandeUsers($id_users) {
		$query = 'SELECT * FROM commandes WHERE id_users = "'.$id_users.'"';
		$commandeUsers = $this->db->get($query);
		return $commandeUsers;
	}
	public function updateUser($pseudo_new, $nom_new, $prenom_new, $adresse_new, $code_postal_new, $id_users) {
		$query = 'UPDATE users SET username = :username, nom= :nom, prenom= :prenom, adresse = :adresse, code_postal = :code_postal WHERE id_users = :id_users';
		$tab = array(
			'id_users' => $id_users,
			'username' => $pseudo_new,
			'nom' => $nom_new,
			'prenom' => $prenom_new,
			'adresse' => $adresse_new,
			'code_postal' => $code_postal_new
		);
		$this->db->execute($query, $tab);
	}
	public function deleteUser($id_users) {
		$query = 'DELETE FROM users WHERE id_users = :id';
		$tab = array(
			'id' => $id_users
		);
		$resultat = $this->db->execute($query, $tab);
	}
}
 ?>