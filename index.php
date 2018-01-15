<?php
spl_autoload_register();
use App\Main\Application;

try {
	$app = new Application();
	$app->start();

	$o = new App\Model\FilmList(1);


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
