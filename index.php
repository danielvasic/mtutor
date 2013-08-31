<?php
include ("base/build-map.php");
include ("base/generator.php");

function main ($permise, $koncepti, $relacije) {
	$g_koncepti = generateConceptArray ($koncepti, 30);
	$questions = array ();
	foreach ($g_koncepti as $key => $koncept) {
		$g_premise = array ();
		generateRelatedPremises($permise, $koncept, $g_premise, 2);
		$questions [] = generateQuestion($g_premise);
	}
	
	echo "<ol>";
	foreach ($questions as $question) {
		echo "<li>";
		if (gettype ($question) != 'object') continue;
		echo "<p>".$question->Pitanje()."</p>";
		if ($question->Odgovori() == "relations") {
			$answers = array ();
			$answers[] = $question->Odgovor();
			$counter = 3;
			do {
				$rnd_num = rand (0, count ($relacije)-1);
				if (in_array ($relacije[$rnd_num]->Naziv(), $answers)) {
					continue;	
				} else {
					$answers[] =  $relacije[$rnd_num];
					$counter--;	
				}
			} while ($counter > 0);
			$question->Odgovori($answers);
		} else {
			$answers = array ();
			$answers[] = $question->Odgovor();
			$c_answers = $question->Odgovori();
			$counter = rand(4,7);
			do {
				$rnd_num = rand (0, count ($c_answers)-1);
				if (in_array ($c_answers[$rnd_num]->Naziv(), $answers)) {
					continue;	
				} else {
					$answers[] =  $c_answers[$rnd_num];
					$counter--;	
				}
			} while ($counter > 0);
			$question->Odgovori($answers);
		}
		$answers = $question->Odgovori(); 
		shuffle ($answers);

		foreach ($answers as $answer) {
			if ($answer == $question->Odgovor()) {
				echo "<p><label><input type='checkbox' value='".$answer."'><b>$answer</b></label></p>";	
			} else {
				echo "<p><label><input type='checkbox' value='".$answer."'>$answer</label></p>";	
			}
		}
		echo "</li>";
	}
	echo "</ol>";
}

main($permise, $koncepti, $relacije);
?>