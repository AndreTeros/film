<?php
namespace App\Model;

class FilmFind extends AbsModel{
	public function getData() {
		$sql = "
			SELECT DISTINCT `f`.`ID`,`f`.`NAME`
			FROM `films` `f`
			LEFT JOIN `actors` `a`
			ON `f`.`id` = `a`.`FILM`
			WHERE `f`.`NAME` LIKE :word
			OR `a`.`NAME` LIKE :word
			OR `a`.`SURNAME` LIKE :word
		";
		$this->query($sql);
		return $this->fetch();
	}

}