<?php
include ("base/build-map.php");
include ("base/generator.php");

function main ($permise, $koncepti, $relacije) {
	$g_koncepti = generateConceptArray ($koncepti, 5);
	$questions = array ();
	foreach ($g_koncepti as $key => $koncept) {
		$g_premise = array ();
		generateRelatedPremisesSub($permise, $koncept, $g_premise, 2);
		if (count ($g_premise) == 0) 
			generateRelatedPremisesSup($permise, $koncept, $g_premise, 2);
		$questions [] = generateQuestion($g_premise);
	}
	
	foreach ($questions as $question) {
		echo "<p>".$question['question']."</p>";
		if ($question['answers'] == "relations") {
			$question['answers'] = array ();
			$question['answers'][] = $question['answer'];
			$counter = 3;
			do {
				$rnd_num = rand (0, count ($relacije)-1);
				if (in_array ($relacije[$rnd_num]->Naziv(), $question['answers'])) {
					continue;	
				} else {
					$question['answers'][] =  $relacije[$rnd_num];
					$counter--;	
				}
			} while ($counter > 0);
		}
		
		foreach ($question['answers'] as $answer) {
			if ($answer == $question['answer']) {
				echo "<p><label><input type='checkbox' value='".$answer."'><b>$answer</b></label></p>";	
			} else {
				echo "<p><label><input type='checkbox' value='".$answer."'>$answer</label></p>";	
			}
		}
	}
}

main($permise, $koncepti, $relacije);
?>