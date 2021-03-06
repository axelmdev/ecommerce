<?php
/**
* Page
*
* Model Users
* 
* @package          Ecommerce
* @subpackage       Models
* @category          Users
* @author              Axel Mainguy
*/
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");
/**
 * Class Model_Users
 */
class Model_Users {
	/**
	 * DB
	 * @var instance
	 */
	private $db;
	/**
	 * Constructeur
	 */
	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	/**
	 * Fonction permettant de s'inscrire un utilisateur
	 * @param  Varchar $username    Username 
	 * @param  Varchar $password    Mot de passe
	 * @param  Varchar $email       Email
	 * @param  Varchar $nom         Nom
	 * @param  Varchar $prenom      Prenom
	 * @param  Varchar $adresse     Adresse
	 * @param  Int $code_postal Code postal
	 * @param  array $errors      Tableau d'erreurs
	 */
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
	/**
	 * Fonction permettant de se connecter au site
	 * @param  Varchar $pseudo   Username
	 * @param  Varchar $password Mot de passe
	 * @return array Création de $_SESSION
	 */
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
	/**
	 * Fonction permettant de lister les utilisateurs
	 * @return array Renvoie la liste
	 */
	public function listUsers() {
		$query = "SELECT * FROM users";
		$resultatlist = $this->db->getAll($query);
		return $resultatlist;
	}
	/**
	 * Fonction permettant de savoir si le pseudo exite deja
	 * @param  Varchar $username Username
	 * @return Boolean Oui ou Non
	 */
	public function userExist($username) {
		$query = 'SELECT id_users FROM users WHERE username = "'.$username.'"';
		$resultat_user = $this->db->get($query);
		if(empty($resultat_user)) {
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Fonction permettant de savoir si l'email existe deja
	 * @param  Varchar $email Email
	 * @return Boolean Oui ou Non
	 */
	public function emailExist($email) {
		$query = 'SELECT id_users FROM users WHERE email = "'.$email.'"';
		$resultat_email = $this->db->get($query);
		if(empty($resultat_email)) {
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Fonction permettant de selectionner tous d'un user
	 * @param  Int $id_users Id de l'user
	 * @return array Renvoie le profil
	 */
	public function profilUsers($id_users) {
		$query = 'SELECT * FROM users WHERE id_users = "'.$id_users.'"';
		$profilUsers = $this->db->get($query);
		return $profilUsers;
	}
	/**
	 * Fonction permettant de lister toutes les commandes d'un utilisateur
	 * @param  Int $id_users Id de l'user
	 * @return array Renvoie toutes les commandes d'un utilisateur
	 */
	public function commandeUsers($id_users) {
		$query = 'SELECT * FROM commandes WHERE id_users = "'.$id_users.'"';
		$commandeUsers = $this->db->get($query);
		return $commandeUsers;
	}
	/**
	 * Fonction permettant de mettre a jour un utilisateur
	 * @param  Varchar $pseudo_new      Nouveau pseudo
	 * @param  Varchar $nom_new         Nouveau nom
	 * @param  Varchar $prenom_new      Nouveau prenom
	 * @param  Varchar $adresse_new     Nouvelle adresse
	 * @param  Int $code_postal_new Nouveau code postal
	 * @param  Int $id_users        Id de l'user
	 */
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
	/**
	 * Fonction permettant de supprimer un utilisateur
	 * @param  Int $id_users Id de l'user
	 */
	public function deleteUser($id_users) {
		$query = 'DELETE FROM users WHERE id_users = :id';
		$tab = array(
			'id' => $id_users
		);
		$resultat = $this->db->execute($query, $tab);
	}
}
 ?>