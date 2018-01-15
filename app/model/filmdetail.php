<?php
namespace App\Model;

class FilmDetail extends AbsModel{
	public function getData() {
		$sql = "
			SELECT `f`.`NAME` AS `FilmName`, `f`.`YEAR`, `f`.`FORMAT`,
			GROUP_CONCAT(
				CONCAT(
					`a`.`NAME`,
					' ',
					`a`.`SURNAME`
				)
				SEPARATOR '|'
			) AS `ACTORS`
			FROM `films` `f`
			INNER JOIN `actors` `a`
			ON `f`.`id` = `a`.`FILM`
			WHERE `f`.`id` = ?
		";
		$this->query($sql);
		return $this->fetch();
	}

}