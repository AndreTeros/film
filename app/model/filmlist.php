<?php
namespace App\Model;

class FilmList extends AbsModel{
	public function getData() {
		$sql = "
			SELECT `ID`,`NAME`
			FROM `films`
			ORDER BY `NAME` ASC
		";
		$this->query($sql);
		return $this->fetch();
	}

}