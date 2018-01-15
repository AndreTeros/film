<?php
spl_autoload_register();
use Config\DB,
	App\Main\Application;


try {


	$app = new Application();
	$app->start();

	$o = new App\Model\FilmList(1);

//	$app->pdo()->query("
//		DROP TABLE IF EXISTS `films`;
//		CREATE TABLE `films` (
//			`ID` int(11) NOT NULL AUTO_INCREMENT,
//			`NAME` varchar(255) COLLATE utf8_unicode_ci,
//			`YEAR` int(4) COLLATE utf8_unicode_ci,
//			`FORMAT` varchar(10) COLLATE utf8_unicode_ci,
//			PRIMARY KEY (`ID`)
//			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
//	");
//
//	$app->pdo()->query("
//		DROP TABLE IF EXISTS `actors`;
//		CREATE TABLE `actors` (
//			`ID` int(11) NOT NULL AUTO_INCREMENT,
//			`FILM` int(11) NOT NULL,
//			`NAME` varchar(255) COLLATE utf8_unicode_ci,
//			`SURNAME` varchar(255) COLLATE utf8_unicode_ci,
//			PRIMARY KEY (`ID`)
//			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
//	");
//
//	$app->pdo()->query("
//		INSERT INTO `films`(`NAME`,`YEAR`)
//		VALUES
//		(\"Криминальное чтиво\",1994)
//	");
//
//	var_dump($app->pdo()->lastInsertId());
//
//	$app->pdo()->query("
//		INSERT INTO `films`(`NAME`,`YEAR`)
//		VALUES
//		(\"Отступники\",2006)
//	");
//
//	var_dump($app->pdo()->lastInsertId());
//
//	$app->pdo()->query("
//		INSERT INTO `actors`(`FILM`,`NAME`,`SURNAME`)
//		VALUES
//		(2,\"Леонардо\",\"ДиКаприо\"),
//		(2,\"Марк\",\"Уолберг\"),
//		(2,\"Мартин\",\"Шин\");
//	");

//	$sth = $app->pdo()->prepare("
//		SELECT `f`.`NAME` AS `FilmName`, `f`.`YEAR`, `a`.`NAME`, `a`.`SURNAME`
//		FROM `films` `f`
//		INNER JOIN `actors` `a`
//		ON `f`.`id` = `a`.`FILM`
//		WHERE `f`.`id` = 2
//
//	");
//
//	$sth->execute();
//	$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
//
//	var_dump($rs);


//	$sth = $app->pdo()->prepare('
//			SELECT `ID`,`NAME`
//			FROM `films`
//			WHERE `ID` = :field
//		',array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
//	$ff = "NAME";
//	$sth->bindValue(':field', 1);
//	$sth->execute();
//	var_dump($sth->errorInfo());
//
//	$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
//
//	var_dump($rs);




} catch (PDOException $e) {
	echo 'PDOException: ' . $e->getMessage() . "\n";
	echo $e->getFile() . ":" . $e->getLine() . "\n";
} catch(Exception $e) {
	$i = 1;
	do {
		echo $i++ . ": " . $e->getMessage() . "\n";
		echo $e->getFile() . ":" . $e->getLine() . "\n\n";
		$e = $e->getPrevious();
	} while($e);
}
