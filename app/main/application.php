<?php
namespace App\Main;
class Application {

	const CNAMESPACE = "App\\Controller\\";

	private $oPdo,
		$CClass,
		$CMethod;

	private function dbConnect() {
		DB::getInstance();
	}

	private function callController(){
		$this->initController();

		$oController = new $this->CClass();

		if(method_exists($oController,$this->CMethod)) {
			call_user_func(array($oController,$this->CMethod));
		} else {
			throw new \Exception("Cannot call method " . $this->CClass . "::" . $this->CMethod);
		}
	}

	private function initController() {
		if($_GET['c']) {
			$this->CClass = self::CNAMESPACE.explode("\\",$_GET['c'])[0];
			$this->CMethod = (explode("\\",$_GET['c'])[1])?explode("\\",$_GET['c'])[1]:"index";
		} else {
			$this->CClass = self::CNAMESPACE."Index";
			$this->CMethod = "index";
		}
	}


	public function start(){
		$this->dbConnect();
		$this->callController();
	}

	public function pdo() {
		return DB::getInstance();
	}



}