<?php
/*
 * Fichier load.php inclue les fichier généraux qui peuvent être inclus de cette facon
 * Il contient les PATH aussi
 */

// Path de la racine du site
define("SITEPATH", 'http://localhost/lab/crawler/');

// Path du dossier core
define("CORE", SITEPATH."core/");

// Path pour le dossier webroot
define("WEBROOT", SITEPATH."webroot/");

require_once 'simple_html_dom.php';
require_once 'core/db.php';
?>
<link rel="stylesheet" href="styles.css" />
