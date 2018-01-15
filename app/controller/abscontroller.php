<?php
namespace App\Controller;
use Config\Files;
abstract class AbsController {

	const MNAMESPACE = "App\\Model\\";

	protected $data;
	protected $viewPath = Files::PATH."app/view/pages/";
	protected $tempPath = Files::PATH."app/view/templates/";

	public $oModel;

	public function loadView($name) {
		if(file_exists($this->viewPath.$name."/index.php")) {
			$data = $this->data;
			include $this->viewPath.$name."/index.php";
		} else {
			throw new \Exception("Cannot load view file ".$this->viewPath.$name."/index.php");
		}
	}

	public function loadTemplate($name,$part = "header") {
		if(file_exists($this->tempPath.$name."/".$part.".php")) {
			include $this->tempPath.$name."/".$part.".php";
		} else {
			throw new \Exception("Cannot load template file ".$this->tempPath.$name."/".$part.".php");
		}
	}

	public function loadModel($name, array $fields = array()) {
		$modelClass = self::MNAMESPACE.$name;
		$this->oModel = new $modelClass($fields);
	}

}