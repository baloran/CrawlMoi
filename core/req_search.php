<?php 
require_once '../load.php';
if (!empty($_POST)){
	extract($_POST);
	$search = strip_tags($search);
	$req = $db->query("SELECT url,title FROM url WHERE url LIKE '%$search%' OR title LIKE '%$search%' ORDER BY id");
	if ($req->rowCount()>0){
		while($data = $req->fetch(PDO::FETCH_OBJ)){
			echo '<h2>'.$data->url.'</h2>';
			echo '<p>'.$data->title.'</p>';
			echo '<hr />';
		}
	}
	else {
		echo '<h2>aucun resultat</h2>';
	}
}
else{
	echo '<h2>aucun resultat</h2>';	
}