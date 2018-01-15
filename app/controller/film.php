<?php
namespace App\Controller;

class Film extends AbsController {
	public function index() {
		$this->loadModel('filmlist');
		$this->data = $this->oModel->getData();
		$this->loadTemplate("t1");
		$this->loadView("list");
		$this->loadTemplate("t1","footer");
	}

	public function detail() {
		$this->loadModel('filmdetail',array($_GET['id']));
		$this->data = $this->oModel->getData();
		$this->loadTemplate("t1");
		$this->loadView("detail");
		$this->loadTemplate("t1","footer");
	}

	public function add() {
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$this->loadTemplate("t1");
			$this->loadView("form");
			$this->loadTemplate("t1","footer");
		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
			$this->loadModel('filmadd',array(
				$_POST['FILMNAME'],
				$_POST['YEAR'],
				$_POST['FORMAT']
			));
			$filmId = $this->oModel->getData();


			foreach($_POST["NAME"] as $k => $actorName) {
				if($actorName && $_POST['SURNAME'][$k]) {
					$this->loadModel('actoradd', array(
						$filmId,
						$actorName,
						$_POST['SURNAME'][$k]
					));
					$this->oModel->exec();
				}
			}
			header("Location: /?c=film");
		}
	}

	public function delete() {
		$this->loadModel('filmdel',array(
			$_GET['id']
		));
		$this->oModel->exec();

		$this->loadModel('actorsdel',array(
			$_GET['id']
		));
		$this->oModel->exec();

		header("Location: /?c=film");
	}

	public function find() {
		if($_POST['word']) {
			$this->loadModel('filmfind',array(":word" => "%".$_POST['word']."%"));
			$this->data = $this->oModel->getData();
		}
		$this->loadTemplate("t1");
		$this->loadView("find");
		if($this->data) {
			$this->loadView("list");
		}
		$this->loadTemplate("t1","footer");

	}

	public function import() {
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$this->loadTemplate("t1");
			$this->loadView("import");
			$this->loadTemplate("t1","footer");
		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {

			$uploadfile = \Config\Files::PATH . "upload/" . basename($_FILES['file']['name']);

			if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
				$handle = fopen($uploadfile, "r");
				if ($handle) {
					while($s = fgets($handle)) {

						if(!empty($filmData) && explode(":",$s)[0] == "Stars") {
							$this->loadModel('filmadd',array(
								$filmData[0],
								$filmData[1],
								$filmData[2]
							));
							$filmId = $this->oModel->getData();

							foreach(explode(",",trim(explode(":",$s)[1])) as $k => $actor) {
								$this->loadModel('actoradd', array(
									$filmId,
									explode(" ",trim($actor))[0],
									explode(" ",trim($actor))[1]
								));
								$this->oModel->exec();
							}

							unset($filmData);
						}

						if(!isset($filmData)) {
							$filmData = array();
						}

						switch(explode(":",$s)[0]) {
							case "Title":
								$re = '/Title:(.+?)$/';
								preg_match_all($re, $s, $matches, PREG_SET_ORDER, 0);
								$filmName = trim(array_pop($matches[0]));
								$filmData[0] = $filmName;
								break;
							case "Release Year":
								$filmData[1] = trim(explode(":",$s)[1]);
								break;
							case "Format":
								$filmData[2] = trim(explode(":",$s)[1]);
								break;
						}

					}
				} else {
					throw new \Exception("error file open");
				}
			} else {
				throw new \Exception("error file upload");
			}

			header("Location: /?c=film");
		}
	}
}