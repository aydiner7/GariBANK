
<?php  

$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
    
$usd_buying = $connect_web->Currency[0]->BanknoteBuying;
$usd_selling = $connect_web->Currency[0]->BanknoteSelling;
 
$euro_buying = $connect_web->Currency[3]->BanknoteBuying;
$euro_selling = $connect_web->Currency[3]->BanknoteSelling;
 
$sterlin_buying = $connect_web->Currency[4]->BanknoteBuying;

$sterlin_selling = $connect_web->Currency[4]->BanknoteSelling;

$ruble_buying = $connect_web->Currency[14]->ForexBuying;
$ruble_selling = $connect_web->Currency[14]->ForexSelling;

?>


 