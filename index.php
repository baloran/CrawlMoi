<meta charset="utf-8"/>
<?php require_once 'core/db.php'; require 'simple_html_dom.php';?>

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


if (!empty($_POST)){
	extract($_POST);
	if (!empty($url)){
		$url_sans_http = "#^http://#";
		preg_match($pattern, $subject)
	}
if ($valid == true){
	$html = new simple_html_dom();
	$html->load_file($url);
	$ip_url = gethostbyname($url);
	foreach ($html->find('html')as $desc){
		$title = $html->find('title', 0);
		foreach ($html->find('a') as $href){
			
		$req = $db->prepare("INSERT INTO url (url, title,ip) VALUES (:url,:title, :ip)"); //préparation de la requète
		$req->execute(array(
					'url' => $href->href,
					'title'=> $title->plaintext,
					'ip' =>$ip_url,
		)); //execution de la requète */
		
		}	
	}
}
else {
	echo 'mauvaise requete';
}
}
else
{
	echo 'Veuillez entrer une url';
	
}