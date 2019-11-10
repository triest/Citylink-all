<?php include("Dostavka.php"); ?>
<?php
/**
 * Created by PhpStorm.
 * User: DNS
 * Date: 01/06/2018
 * Time: 11:37
 */

$dostavka=new Dostavka();
$dostavka->setWeigToDiscont("DHL",1,100,null,"byWeight");
$dostavka->setWeigToDiscont("Posta",10,100,1000,"byFull");
//$dostavka->calculate("Posta",10);
//$dostavka->calculate("Posta",10);
$rez=$dostavka->calculate("DHL",1000);
echo PHP_EOL;
echo $rez;

