<?php
include ("base/build-map.php");
include ("base/generator.php");

function main ($permise, $koncepti) {
	$g_koncepti = generateConceptArray ($koncepti);
	foreach ($g_koncepti as $key => $koncept) {
		$g_premise = array ();
		generateRelatedPremisesSub($permise, $koncept, $g_premise, 2);
		if (count ($g_premise) == 0) 
			generateRelatedPremisesSup($permise, $koncept, $g_premise, 2);
		echo "<b>$koncept</b>";
		foreach ($g_premise as $premisa) echo "<p>$premisa</p>";
	}
}

main($permise, $koncepti);
?>