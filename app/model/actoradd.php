<?php
namespace App\Model;

class ActorAdd extends AbsModel{
	public function exec() {
		$sql = "
			INSERT INTO `actors`(`FILM`,`NAME`,`SURNAME`)
			VALUES
			(?,?,?)
		";
		$this->query($sql);
	}

}