<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/users.php");

class Controller_Users {
	/**
	 * Fonction permettant de s'inscrire au site
	 */
	public function newUser() {
		if(isset($_POST['button_inscription'])){
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
				$utilisateurDetails = $users->newUsers($username, $password, $email, $nom, $prenom, $adresse, $code_postal);

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
						$errors['email'] = "Cet email est déjà utilisé";
					}
				}

				if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
					$errors['password'] = "Vous devez rentrer un mot de passe valide";
				}
				if(empty($_POST['code_postal']) || !preg_match('[0-9a-bA-B]',$_POST['code_postal'])) {
					$errors['code_postal'] = "Vous devez entrer un code postal valide";
				}
			}
		}
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/inscription.php");
}
	/**
	 * Fonction permettant de se connecter au site
	 */
	public function connectUser() {
			$errors = array();
			if(!empty($_POST)) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				$users = new Model_Users();
				$connect_user = $users->connectUser($_POST['email'], $_POST['password']);
				if(!empty($connect_user)) {
					$_SESSION['id_users'] = $connect_user['id_users'];
					$_SESSION['email'] = $connect_user['email'];
					header("Location: ".$_SERVER['DOCUMENT_ROOT']."/ecommerce/index.php?c=page&a=profil");
					
				} else {
					echo "Vous n'existez pas ";
				}
			}
			require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/connexion.php");	
	}
	/**
	 * Fonction permettant de modifier le compte
	 */
	public function updateUser() {
		
	}
	/**
	 * Fonction permettant de se deconnecter 
	 */	
	public function disconnetUser() {
		session_start();
		session_destroy();
		header('Location: index.php');
	}
	/**
	 * Fonction permettant de supprimer le compte d'un membre
	 */
	public function deleteUser() {

	}
	/**
	 * Fonction permettant de voir la liste des membres
	 */
	public function listUser() {
		$users = new Model_Users();
		$listeUsers = $users->listUsers();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/admin/users/listusers.php");
	}
}
?>