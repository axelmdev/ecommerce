<?php
/**
* Page
*
* Controller Users
* 
* @package          Ecommerce
* @subpackage       Controllers
* @category          Users
* @author              Axel Mainguy
*/ 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/users.php");
/**
 * Class Controller_Users
 */
class Controller_Users {
	/**
	 * Fonction permettant de s'inscrire au site
	 */
	public function newUser() {
			if (!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['email']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['code_postal'])) {
				$errors = array();
				$username = htmlspecialchars($_POST['username']);
				$password = sha1($_POST['password']);
				$email = htmlspecialchars($_POST['email']);
				$nom = htmlspecialchars($_POST['nom']);
				$prenom = htmlspecialchars($_POST['prenom']);
				$adresse = htmlspecialchars($_POST['adresse']);
				$code_postal = htmlspecialchars($_POST['code_postal']);

				$users = new Model_Users();
				
				if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
					$errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)";
				} else {
					$userExist = $users->userExist($username);
					if($userExist == true) {
						$errors['username'] = "Ce pseudo est déjà pris";
					}
				}

				if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$errors['email'] = "Votre email n'est pas valide";
				} else {
					$emailExist = $users->emailExist($email);
					if($emailExist == true) {
						$errors['email'] = "Cet email est déjà utilisée";
					}
				}

				if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
					$errors['password'] = "Vous devez rentrer un mot de passe valide";
				}
				$utilisateurDetails = $users->newUsers($username, $password, $email, $nom, $prenom, $adresse, $code_postal, $errors);
			}
		
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/inscription.php");
}
	/**
	 * Fonction permettant de se connecter au site
	 */
	public function connectUser() {
			$errors = array();
			if(!empty($_POST)) {
				$pseudo = $_POST['pseudo'];
				$password = $_POST['password'];
				$users = new Model_Users();
				$connect_user = $users->connectUsers($pseudo, $password, $errors);
				if(empty($connect_user)) {
					$errors['dontexist'] = "Vous n'existez pas";
				}	
			}
			require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/connexion.php");	
	}
	/**
	 * Fonction permettant de se deconnecter 
	 */	
	public function disconnetUser() {
		session_start();
		unset($_SESSION['id_users']);
		unset($_SESSION['username']);
		header('Location: index.php');
	}
	/**
	 * Fonction permettant de supprimer le compte d'un membre
	 * @param  Int $id_users Id de l'user
	 */
	public function deleteUser($id_users) {
		$users = new Model_Users();
		$deleteArticle = $users->deleteUser($id_users);
		header('Location: /ecommerce/admin/users/list');
	}
	/**
	 * Fonction permettant de voir la liste des membres
	 */
	public function listUser() {
		$users = new Model_Users();
		$listeUsers = $users->listUsers();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/users/liste_users.php");
	}
	/**
	 * Fonction du profil du membre
	 * @param  Int $id_users Id de l'user
	 */
	public function profiluser($id_users) {
		$users = new Model_Users();
		if (!empty($_POST['id_users'])) {
			$id_users = $_POST['id_users'];
			$pseudo_new = $_POST['pseudo_new'];
			$nom_new = $_POST['nom_new'];
			$prenom_new = $_POST['prenom_new'];
			$adresse_new = $_POST['adresse_new'];
			$code_postal_new = $_POST['code_postal_new'];
			$users->updateUser($pseudo_new, $nom_new, $prenom_new, $adresse_new, $code_postal_new, $id_users);
		}
		$profilUser = $users->profilUsers($id_users);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/users/profil.php");
	}
	/**
	 * Fonction permettant a l'utilisateur de voir ses commandes
	 */
	public function commandeuser() {
		$users = new Model_Users();
		$id_users = '1';
		$commandeUser = $users->commandeUsers($id_users);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/users/commandeuser.php");
	}
	/**
	 * Fonction permettant d'ajouter un utilisateur
	 */
	public function addUser() {
		if (!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['email']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['code_postal'])) {
			$errors = array();
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$email = $_POST['email'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$adresse = $_POST['adresse'];
			$code_postal = $_POST['code_postal'];

			$users = new Model_Users();
			
			if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
				$errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)";
			} else {
				$userExist = $users->userExist($username);
				if($userExist == true) {
					$errors['username'] = "Ce pseudo est déjà pris";
				}
			}

			if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "Votre email n'est pas valide";
			} else {
				$emailExist = $users->emailExist($email);
				if($emailExist == true) {
					$errors['email'] = "Cet email est déjà utilisée";
				}
			}

			if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
				$errors['password'] = "Vous devez rentrer un mot de passe valide";
			}
			$utilisateurDetails = $users->newUsers($username, $password, $email, $nom, $prenom, $adresse, $code_postal, $errors);
			header('Location: /ecommerce/admin/users/list');
		}
		
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/users/create_users.php");
	}
}
?>