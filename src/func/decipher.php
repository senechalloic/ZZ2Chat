<?php

#REGLES DU CODAGE
#
# 1. Tous les 2 caractères, on rajoute un chiffre aléatoire entre 0 et 9. Avec ce chiffre on fais une permutation positive de ce chiffre sur les deux caractères le précédent.
# 2. On prend le troisième caractère. Un chiffre aléatoire n. Qui donne la n-ième lettre min associée à 0, la n+1 ème associé à 1, etc... jusqu'à 9. On remplace les chiffres et lettres associés.
#    On ne touche pas au troisième caractère.

#RULES OF THE CODE
#
# 1. Every 2 caracters, we add a random number between 0 and 9. With this number we perfom a positive permutation of this number, on the 2 previous characters.
# 2. We take the third characteur. A random number n. That gives the n-th lower-case letter associated to 0, the n+1-th associated to 1, etc... until 9. We remplace numbers and letters associated.
#    We don't modify the third character.


function decipher($str)
{
	$strfin = $str;
	$strret = '';
	
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
	$j = 0;
	$k = 2;

	for ($i = 0; $i < floor(strlen($strfin)/3); $i++) {
		
		$perm = $strfin[$k];
		$k += 3;
		
		$c = ord($strfin[$j]);
		if(( $c > 96 && $c < 123) || ( $c > 64 && $c < 91))
		{
			if($c > 93){
				$strret .= chr(($c - 71 - $perm)%26 + 97); }
			else{
				$strret .= chr(($c - 39 - $perm)%26 + 65); }
		}
		else{
			$strret .= chr($c); }
		$j += 1;
		$c = ord($strfin[$j]);
		if(( $c > 96 && $c < 123) || ( $c > 64 && $c < 91))
		{
			if($c > 93){
				$strret .= chr(($c - 71 - $perm)%26 + 97); }
			else{
				$strret .= chr(($c - 39 - $perm)%26 + 65); }
		}
		else{
			$strret .= chr($c); }

		$j += 2;
	}
	if(floor(strlen($strfin)/3) != strlen($strfin)/3)
	{
		$strret .= $strfin[$j];
	}
	return $strret;
}
?>