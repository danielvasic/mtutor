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
$koncepti[] = new Koncept ("Model računalnog sustava");
$koncepti[] = new Koncept ("Ulazna jedinica");
$koncepti[] = new Koncept ("Izlazna jedinica");
$koncepti[] = new Koncept ("Tipkovnica");
$koncepti[] = new Koncept ("Miš");
$koncepti[] = new Koncept ("Monitor");
$koncepti[] = new Koncept ("Štampač");
$koncepti[] = new Koncept ("Centralna jedinica");
$koncepti[] = new Koncept ("Računalo");
$koncepti[] = new Koncept ("Centralna procesorska jedinica");
$koncepti[] = new Koncept ("Upravljačka jedinica");
$koncepti[] = new Koncept ("Centralna procesorska jedinica");
$koncepti[] = new Koncept ("Instrukcija");
$koncepti[] = new Koncept ("Podatak");
$koncepti[] = new Koncept ("Operacija");
$koncepti[] = new Koncept ("Informacija");
$koncepti[] = new Koncept ("Značenje");
$koncepti[] = new Koncept ("Aritmetička operacija");
$koncepti[] = new Koncept ("Zbrajanje");
$koncepti[] = new Koncept ("Oduzimanje");
$koncepti[] = new Koncept ("Upravljačka jedinica");
$koncepti[] = new Koncept ("Logička operacija");
$koncepti[] = new Koncept ("Upravljačka jedinica");
$koncepti[] = new Koncept ("Disjunkcija");
$koncepti[] = new Koncept ("Konjukcija");
$koncepti[] = new Koncept ("Negacija");





/*Primjer pitanja : Koji Logički sklop izvršava Logička operacija Disjunkcija -> Ili sklop */