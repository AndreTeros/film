<?php
namespace App\Model;

class FilmAdd extends AbsModel{
	public function getData() {
		$sql = "
			INSERT INTO `films`(`NAME`,`YEAR`,`FORMAT`)
			VALUES
			(?,?,?)
		";
		$this->query($sql);
		return $this->lastInsertId();
	}

}