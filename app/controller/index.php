<?php
namespace App\Controller;

class Index extends AbsController {
	public function index() {
		$this->loadTemplate("t1");
		$this->loadTemplate("t1","footer");
	}
}