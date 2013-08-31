<?php
function generateConceptArray ($concepts, $seed = 3) {
	$random_concepts = array ();
	do{
		$rnd_num = rand(0, count ($concepts)-1);
		if (in_array($concepts[$rnd_num], $random_concepts)) {
			continue;	
		} else {
			$random_concepts [] = $concepts[$rnd_num];
			$seed--;	
		}
	} while ($seed > 0);
	return $random_concepts;
}


function generateRelatedPremisesSub ($premises, $concept, &$related_premises = array (), $depth = 3) {
	if ($depth == 0) return;
	$depth-=1;
	foreach ($premises as $premise) {
		$podkoncept = $premise->PostojiSub ($concept);
		if ($podkoncept) {
			$related_premises[] = $premise;
			generateRelatedPremisesSub ($premises, $podkoncept, $related_premises, $depth);	
		}
	}
}

function generateRelatedPremisesSup ($premises, $concept, &$related_premises = array (), $depth = 3) {
	if ($depth == 0) return;
	$depth-=1;
	foreach ($premises as $premise) {
		$nadkoncept = $premise->PostojiSup ($concept);
		if ($nadkoncept) {
			$related_premises[] = $premise;
			generateRelatedPremisesSup ($premises, $nadkoncept, $related_premises, $depth);	
		}
	}
}

function generateQuestion ($premises) {
	
}
?>