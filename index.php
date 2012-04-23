<meta charset="utf-8"/>
<a href="search.php">Recherche</a>
<form action="index.php"method="POST">
<input type="text" name="url"/>
<input type="submit" value="ITS OK"/>
</form>
<?php
/*
 * PREG
 */
$img_jpg = '#.jpg#';
$img_png = '#.png#';
/*
 * Fin des Preg
 */

/*
 * Base de donnée
 */

$database = 'mysql:host=localhost;dbname=crawler';
$user_db  = 'root';
$pass_db  = '';
$options  = '';

	$db = new PDO($database, $user_db, $pass_db) or die (print_r($db->errorInfo()));
	$db->exec('SET NAMES utf8');
/*
 * Fin Base de donnée
 */
if (!empty($_POST)){
	extract($_POST);


require 'simple_html_dom.php';
$html = new simple_html_dom();
$html->load_file($url);
foreach ($html->find('a')as $desc){
		$req = $db->prepare("INSERT INTO url (url) VALUES (:url)"); //préparation de la requète
		$req->execute(array(
			'url' => $desc->href,
		)); //execution de la requète
}
}
else
{
	echo 'Veuillez entrer une url';
}