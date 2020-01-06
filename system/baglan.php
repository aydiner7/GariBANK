<?php
try {
     //$db = new PDO("mysql:host=localhost;dbname=garibank", "root", "");
     $db = new PDO("mysql:host=localhost;dbname=garibank_2019;charset=utf8", "garibank_team", "garibank32sdü");

} catch ( PDOException $e ){
     print $e->getMessage();
}

?>

