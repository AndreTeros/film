<?php
namespace App\Main;
class DB {
	private static $instance;
	private $oPdo;

	private function __construct($dsn) {
		$this->oPdo = new \PDO($dsn, \Config\DB::DBLOGIN, \Config\DB::DBPASSWORD);
		$this->oPdo->query("SET NAMES 'utf8'");
	}
	private function __clone() {}
	private function __wakeup() {}

	public static function getInstance() {
		if(empty(self::$instance)) {
			$dsn = "mysql:dbname=" . \Config\DB::DBNAME . ";host=" . \Config\DB::DBHOST;
			self::$instance = new self($dsn);
		}
		return self::$instance->oPdo;
	}
}