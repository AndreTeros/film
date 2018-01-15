<?php
namespace App\Model;

class ActorsDel extends AbsModel {
	public function exec() {
		$sql = "
			DELETE FROM `actors`
			WHERE `FILM` = ?
		";
		$this->query($sql);
		return $this->lastInsertId();
	}
}