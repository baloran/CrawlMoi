<?php require_once 'core/db.php';?>
<?php 
$req_liste = $db->query('SELECT * FROM url');
while($search = $req_liste->fetch()){
echo $search['url'].'<br />'; 
}

$req_liste->closeCursor();