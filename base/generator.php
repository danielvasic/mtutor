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


function generateRelatedPremises ($premises, $concept, &$related_premises = array (), $depth = 3, $seed = 2) {
	if ($depth == 0) return;
	foreach ($premises as $key => $premise) {
		$related_premises[] = $premise;
		$podkoncept = $premise->PostojiSub ($concept);
		$nadkoncept = $premise->PostojiSup ($concept);
		if ($podkoncept) {
			generateRelatedPremisesSub ($premises, $podkoncept, $related_premises, $depth);	
			//generateRelatedPremisesSup ($premises, $podkoncept, $related_premises, $depth);
		}
		if ($nadkoncept) {
			//generateRelatedPremisesSub ($premises, $nadkoncept, $related_premises, $depth);
			generateRelatedPremisesSup ($premises, $nadkoncept, $related_premises, $depth);
		}	
	}
}

function generateRelatedPremisesSub (&$premises, $concept, &$related_premises = array (), $depth = 3) {
	if ($depth == 0) return;
	foreach ($premises as $key => $premise) {
		$podkoncept = $premise->PostojiSub ($concept);
		if ($podkoncept) {
			$related_premises[] = $premise;
			unset ($premises[$key]);
			generateRelatedPremisesSub ($premises, $podkoncept, $related_premises, $depth-1);	
		}
	}
}

function generateRelatedPremisesSup (&$premises, $concept, &$related_premises = array (), $depth = 3) {
	if ($depth == 0) return;
	foreach ($premises as $key => $premise) {
		$nadkoncept = $premise->PostojiSup ($concept);
		
		if ($nadkoncept) {
			$related_premises[] = $premise;
			unset ($premises[$key]);
			generateRelatedPremisesSup ($premises, $nadkoncept, $related_premises, $depth-1);	
		}
	}
}

function generateQuestion ($premises, $case = "simple") {
	if (count ($premises) == 0) return;
	switch ($case) {
		case 'simple':
			$type = array ('relation', 'concept');
			$rnd_type = $type[rand(0,1)];
			switch ($rnd_type) {
				case 'relation':
					$rnd_premise = $premises[rand (0, count ($premises)-1)];
					$question = $rnd_premise->Nadkoncept() . " __________ " . $rnd_premise->Podkoncept();
					$answer = $rnd_premise->Relacija();
					$answers = 'relations';
				break;
				case 'concept':
					$rnd_premise = $premises[rand (0, count ($premises)-1)];
					$r_type = array ('sub', 'sup');
					switch ($r_type[rand(0,1)]){
						case 'sub':
							$question = "__________ " . $rnd_premise->Relacija() . " " . $rnd_premise->Podkoncept();
							$answer = $rnd_premise->Nadkoncept();
							$answers = array ();
							foreach ($premises as $premise) {
								if (!in_array ($premise->Nadkoncept()->Naziv(), $answers) ) {
									$answers[] = $premise->Nadkoncept();	
								}
							}
							break;
						case 'sup':
							$question = $rnd_premise->Nadkoncept() ." " . $rnd_premise->Relacija() . " __________.";
							$answer = $rnd_premise->Podkoncept();
							$answers = array ();
							foreach ($premises as $premise) {
								if (!in_array ($premise->Podkoncept()->Naziv(), $answers) ) {
									$answers[] = $premise->Podkoncept();	
								}
							}
							break;	
					}
					break;
			}
			return new pitanje ($question, $answer, $answers);
		case 'complex':
		case 'brutal':
			break;
	}
}
?>