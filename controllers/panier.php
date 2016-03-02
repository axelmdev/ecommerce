<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/panier.php");

Class Controller_Panier {

	public function __construct() {
		if(!isset($_SESSION['panier'])) {
			$_SESSION['panier'] = array();
		}
		if(isset($_POST['panier']['quantity'])) {
			$this->recalc();
		}
		if(isset($_GET['delPanier'])) {
			$id_articles = $_GET['delPanier'];
			$this->del($id_articles);
		}
	}
	public function recalc() {
		foreach ($_SESSION['panier'] as $id_articles => $quantite) {
			if(isset($_SESSION['panier'][$id_articles])) {
				$_SESSION['panier'][$id_articles] = $_POST['panier']['quantity'][$id_articles];
			}
		}
	}
	public function count() {
		return array_sum($_SESSION['panier']);
	}
	public function total() {
		$total = 0;
	    $ids = array_keys($_SESSION['panier']);
	    if(empty($ids)) {
	    	$products = array();
	    } else {
	    	$products_model = new Model_Panier();
        	$products = $products_model->listPanier($ids);
	    }
		foreach ($products as $id_articles => $product) {
			$total += $product->prix * $_SESSION['panier'][$product->id_articles];
		}
		return $total;
	}

	public function addPanier($id_articles) {
		$json = array('error' => true);
		$id_articles = $_GET['id'];
		if (isset($id_articles)) {
			$products_model = new Model_Panier();
			$products = $products_model->addPanier($id_articles);
			if(empty($products)) {
				$json['message'] = "Ce produit n'existe pas";
			}
			$this->add($products[0]->id_articles);
			$json['error'] = false;
			$json['total'] = number_format($this->total(),2,',',' ');
			$json['count'] = $this->count();
			$json['message'] = "Le produit a bien été ajouté";

		} else {
				$json['message'] = "Vous n'avez pas sélectionné de produit a ajouter";
		}
		echo json_encode($json);
	}

	public function add($id_articles) {
		$id_articles = $_GET['id'];
		if (isset($_SESSION['panier'][$id_articles])) {
			$_SESSION['panier'][$id_articles]++;
		} else {
			$_SESSION['panier'][$id_articles] = 1;
		}	
		header('Location: Javascript:history.back()');

	}
	public function del($id_articles) {
		unset($_SESSION['panier'][$id_articles]);
	}

	public function viewPanier() {
		serialize($_SESSION['panier']);
		$ids = array_keys($_SESSION['panier']);
		if(empty($ids)) {
			$products = array();
		} else {
			$products_model = new Model_Panier();
			$products = $products_model->listPanier($ids);
		}
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/panier/panier.php"); 
	}

}




 ?>