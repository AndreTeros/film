<?php
namespace App\Model;
use App\Main\DB;
abstract class AbsModel {
	protected $fields;
	protected $sth;

	public function __construct($fields) {
		$this->fields = $fields;
	}

	protected function query($sql) {
		$this->sth = DB::getInstance()->prepare($sql);
		$r = $this->sth->execute($this->fields);
		if(!$r) {
			throw new \Exception("SQL Error: " . array_pop($this->sth->errorInfo()));
		}
	}

	protected function lastInsertId() {
		return DB::getInstance()->lastInsertId();
	}

	protected function fetch() {
		return $this->sth->fetchAll(\PDO::FETCH_ASSOC);
	}
}
