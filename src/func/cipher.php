<?php

#REGLES DU CODAGE
#
# 1. Tous les 2 caractères, on rajoute un chiffre aléatoire entre 0 et 9. Avec ce chiffre on fais une permutation positive de ce chiffre sur les deux caractères le précédent.
# 2. On prend le troisième caractère. Un chiffre aléatoire n. Qui donne la n-ième lettre min associée à 0, la n+1 ème associé à 1, etc... jusqu'à 9. On remplace les chiffres et lettres associés.
#    On ne touche pas au troisième caractère.

function cipher($str)
{
	#$taille = strlen($str) + floor(strlen($str)/2) + (strlen($str) + floor(strlen($str)/2))/5;
	$strfin = '';
	$k = 0;
	for ($i = 0; $i < floor(strlen($str)/2); $i++) {
		$perm = rand(0,9);
		
		$c = ord($str[$k]);
		
		if(( $c > 96 && $c < 123) || ( $c > 64 && $c < 91))
		{
			if($c > 93){
				$strfin .= chr(($c - 97 + $perm)%26 + 97); }
			else{
				$strfin .= chr(($c - 65 + $perm)%26 + 65); }
		}
		else{
			$strfin .= chr($c); }
		
		$k += 1;
		$c = ord($str[$k]);
		if(( $c > 96 && $c < 123) || ( $c > 64 && $c < 91))
		{
			if($c > 93){
				$strfin .= chr(($c - 97 + $perm)%26 + 97); }
			else{
				$strfin .= chr(($c - 65 + $perm)%26 + 65); }
		}
		else{
			$strfin .= chr($c); }
		
		$k += 1;
		$strfin .= $perm;
	}
	if(strlen($str)%2 != 0){
		$strfin .= $str[$k]; }
	$perm = $strfin[2];
	
	for ($i = 0; $i < strlen($strfin); $i++) {
		$c = ord($strfin[$i]);
		
		if($i != 2  && (( $c > 96 + $perm && $c < 107 + $perm) || ( $c > 47 && $c < 58)))
		{
			if( $c > 69){
				$strfin[$i] = chr($c-($perm + 97) + 48); }
			else{
				$strfin[$i] = chr($c-48+($perm+97)); }
		}
	}
	return $strfin;
}
?>