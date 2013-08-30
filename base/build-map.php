<?php
require_once ("model/permisa.class.php");
/**
* Skup svih relacija
*
* 1 - ima primjerak
* 2 - ima podvrstu
* 3 - se sastoji od
* 4 - služi za
* 5 - vrši
**/
$relacije[] = new Relacija ("ima primjerak"); 
$relacije[] = new Relacija ("ima podvrstu"); 
$relacije[] = new Relacija ("se sastoji od"); 
$relacije[] = new Relacija ("služi za"); 
$relacije[] = new Relacija ("vrši"); 
/**
* Skup svih relacija
**/

$koncepti[] = new Koncept ("Računalni sustav");
$koncepti[] = new Koncept ("Temeljna funkcija računala");
$koncepti[] = new Koncept ("Obrada podataka");
$koncepti[] = new Koncept ("Prikaz podataka");
$koncepti[] = new Koncept ("Upravljanje podataka");
$koncepti[] = new Koncept ("Pohrana podataka");
$koncepti[] = new Koncept ("Unos podataka");