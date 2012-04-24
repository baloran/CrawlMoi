<?php require_once 'core/db.php';?>
Entrez une requete : 
<form action="search.php" method="POST">
<input type="text" name="search"/>
<input type="submit" value="Rechercher"/>
</form>
<?php 
if (!empty($_POST)){
	extract($_POST);
	$search = 'voiture garage';
	$mots = explode(' ', $recherche); //séparation des mots de la recherche à chaque espace grâce à explode
	$nombre_mots = count ($mots); //comptage du nombre de mots
	
	$valeur_requete = '';
	for($nombre_mots_boucle = 0; $nombre_mots_boucle < $nombre_mots; $nombre_mots_boucle++) //tant que le nombre de mots de la recherche est supérieur à celui de la boucle, on continue en incrémentant à chaque fois la variable $nombre_mots_boucle
	{
		$valeur_requete .= 'AND monchamp LIKE \'%' . $mots[$nombre_mots_boucle] . '%\''; //modification de la variable $valeur_requete
	}
	$valeur_requete = ltrim($valeur_requete,'AND'); //suppression de AND au début de la boucle
}
else{
	$req_liste = $db->query('SELECT * FROM url');
	
	while ($h = $req_liste->fetch()){
		$rh = $h['url'];
		$delimiter = ".";
		explode($delimiter, $rh);
		$jpg_match = "#.jpg$#";
		$jpg_h = preg_match($jpg_match, $rh);
		foreach ($rh as $j){
			echo $j;
		}
		//print_r($jpg_h).'<br />';
	}
	//while($search = $req_liste->fetch()){
	//echo "<a href=".$search['url'].">".$search['url']."</a>".'<br />'; 
	//}
}
if (isset($req_list))$req_liste->closeCursor();