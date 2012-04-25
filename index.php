<meta charset="utf-8"/>
<?php require_once 'load.php'; ?>

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
	$url_sans_http = "#^http://#";
	$test_url = preg_match($url_sans_http, $url);
	if ($test_url == 0){
		$url_valid = "http://".$url;
		$valid = true;
	}
	if ($test_url == 1){
		$valid = true;
		$url_valid = $url;
	}
if ($valid == true){
	$html = new simple_html_dom();
	$html->load_file($url_valid);
	$ip_url = gethostbyname($url_valid);
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