<?php
namespace App\Model;

class FilmDel extends AbsModel{
	public function exec() {
		$sql = "
			DELETE FROM `films`
			WHERE `ID` = ?
		";
		$this->query($sql);
		return $this->lastInsertId();
	}

}